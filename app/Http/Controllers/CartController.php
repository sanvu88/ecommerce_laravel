<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Category;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

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

        return view('frontend.cart')
            ->with('categories', $categories);
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
            'weight' => 500,
            'options' => [
                'img' => asset($product->thumbnail)
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
        $categories = Category::root()->get();
        $cart = Cart::content();

        if ($cart->count() > 0) {
            return view('frontend.checkout')->with('categories', $categories);;
        }

        return redirect(route('home'));
    }

    public function postCheckout(CheckoutRequest $request)
    {
        $cartInfo = Cart::content();

        $customer = Customer::create($request->only(['fullname', 'email', 'address', 'phone_number']));

        $order = Order::create([
            'customer_id' => $customer->id,
            'date' => date('Y-m-d H:i:s'),
            'total' => str_replace(',', '', Cart::total()),
            'note' => $request->get('note'),
        ]);

        if (count($cartInfo) > 0) {
            foreach ($cartInfo as $key => $item) {
                $orderDetail = OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $item->id,
                    'quantity' => $item->qty,
                    'price' => $item->price
                ]);
            }
        }

        Cart::destroy();
    }
}
