<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $categories = Category::with(['children'])->root()->get();

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

    public function checkout()
    {
        $categories = Category::with(['children'])->root()->get();
        $cart = Cart::content();

        if ($cart->count() > 0) {
            return view('frontend.checkout')->with('categories', $categories);;
        }

        return redirect('home');
    }
}
