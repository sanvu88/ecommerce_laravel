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
        $cart = Cart::content();

        return view('frontend.cart')
            ->with('cart', $cart)
            ->with('categories', $categories);
    }

    public function add(Request $request, $id)
    {
        $productId = $request->get('product_id');
        $product = Product::find($id);
        Cart::add([
            'id' => $id,
            'name' => $product->name,
            'qty' => 1,
            'price' => $product->price,
            'weight' => 500,
            'options' => [
                'img' => asset($product->thumbnail)
            ]
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
