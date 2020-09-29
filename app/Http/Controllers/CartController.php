<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Courier;
use App\Models\Customer;
use App\Models\District;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Province;
use App\Models\Ward;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Vanthao03596\HCVN\Models\City;

class CartController extends Controller
{
    /**
     * Show the cart
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::root()->get();
        $coupon = session()->get('coupon')['name'];
        $discount = number_format(session()->get('coupon')['discount'], 0) ?? 0;
        $newSubtotal = number_format(round((float) str_replace(',', '', Cart::subtotal()) - str_replace(',', '', $discount)), 0);

        return view('frontend.cart')
            ->with([
                'categories' => $categories,
                'coupon' => $coupon,
                'discount' => $discount,
                'newSubtotal' => $newSubtotal,
            ]);
    }

    /**
     * Add product to cart
     *
     * @param Request $request
     * @param $id
     */
    public function add(Request $request)
    {
        $id = $request->get('id');
        $qty = $request->get('qty') ?? 1;

        $product = Product::find($id);
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => $qty,
            'price' => $product->price,
            'weight' => 0,
            'options' => [
                'img' => asset($product->thumbnail),
                'sku' => $product->sku,
            ]
        ]);

        return response()->json([
            'status' => 200,
            'message' => 'Add success',
            'data' => [
                'count' => Cart::count(),
                'content' => Cart::content()->flatten(1)->all(),
                'total' => Cart::total(),
            ],
        ]);
    }

    public function getCheckout()
    {
        $cart = Cart::content();
        $discount = (float) session()->get('coupon')['discount'] ?? 0;
        $tax = 0;
        $subTotal = (float) str_replace(',', '', Cart::subtotal());
        $total = round($subTotal - $discount + $tax);
        $provinces = Province::orderBy('name')->get();
        $districts = District::where('parent_code', '01')->orderBy('name')->get();
        $wards = Ward::where('parent_code', '01')->orderBy('name')->get();

        if ($cart->count() > 0) {
            return view('frontend.checkout')
                ->with([
                    'discount' => $discount,
                    'tax' => $tax,
                    'subTotal' => $subTotal,
                    'total' => $total,
                    'provinces' => $provinces,
                    'districts' => $districts,
                    'wards' => $wards,
                ]);
        }

        return redirect(route('home'));
    }

    /**
     * @param CheckoutRequest $request
     */
    public function postCheckout(CheckoutRequest $request)
    {
        $cartInfo = Cart::content();

        $coupon = Coupon::where('code', session()->get('coupon')['name'])->first();
        $discount = isset($coupon) ? $coupon->discount(Cart::subtotal()) : 0;

        $courier = Courier::where('province_code', $request->province_code)->where('district_code', $request->district_code)->first();
        $shipping = $courier->amount ?? config('common.cart.shipping');

        $ward = Ward::where('code', $request->ward_code)->first()->name_with_type;
        $district = District::where('code', $request->district_code)->first()->name_with_type;
        $province = City::where('code', $request->province_code)->first()->name_with_type;
        $address = "{$request->house_number}, {$ward}, {$district}, {$province}";

        $order = Order::create([
            'fullname' => $request->get('fullname'),
            'address' => $address,
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'coupon_id' => $coupon->id ?? null,
            'discount' =>  $discount,
            'shipping' => $shipping,
            'subtotal' => str_replace(',', '', Cart::subtotal()),
            'total' => str_replace(',', '', Cart::total()),
            'balance' => str_replace(',', '', Cart::total()),
            'payment_method_id' => $request->payment,
            'status' => config('common.order.status.ordered'),
            'note' => $request->get('note'),
        ]);

        if (count($cartInfo) > 0) {
            foreach ($cartInfo as $key => $item) {
                $orderDetail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'name' => $item->name,
                    'quantity' => $item->qty,
                    'sku' => $item->options['sku'],
                    'price' => $item->price,
                    'total_price' => $item->price * $item->qty
                ]);
            }
        }

        Cart::destroy();
        session()->forget('coupon');

        return redirect()->route('home')->with('success', 'You have successfully ordered');
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', strtoupper($request->code))->first();

        if (!$coupon instanceof Coupon) {
            return redirect()->route('cart.index')->withErrors('Invalid coupon code. Please try again.');
        }

        session()->put('coupon', [
            'name' => $coupon->code,
            'discount' => $coupon->discount(Cart::subtotal())
        ]);

        return redirect()->route('cart.index')->with('success_message', 'Coupon has been applied!');
    }

    public function removeCoupon(Request $request)
    {
        session()->forget('coupon');
        return redirect()->route('cart.index')->with('success_message', 'Coupon has been removed!');
    }

    public function getListDistrict(Request $request)
    {
        $provinceCode = $request->get('provinceCode');

        $districts = District::where('parent_code', $provinceCode)->orderBy('name')->get();

        return response()->json(['data' => $districts]);
    }

    public function getListWard(Request $request)
    {
        $districtCode = $request->get('districtCode');

        $wards = Ward::where('parent_code', $districtCode)->orderBy('name')->get();

        return response()->json(['data' => $wards]);
    }

    public function updateTax(Request $request)
    {
        $provinceCode = $request->province_code;
        $dictrictCode = $request->district_code;

        $courier = Courier::where('province_code', $provinceCode)->where('district_code', $dictrictCode)->first();
        $discount = (float) session()->get('coupon')['discount'] ?? 0;
        $tax = $courier->amount ?? 20000;
        $subTotal = (float) str_replace(',', '', Cart::subtotal());
        $total = round($subTotal - $discount + $tax);

        return response()->json([
            'data' => [
                'tax' => number_format($tax, 0),
                'total' => number_format($total, 0),
            ],
        ]);
    }
}
