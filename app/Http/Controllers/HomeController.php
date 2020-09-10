<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::with(['products'])->root()->get();

        return view('frontend.home')->with('categories', $categories);
    }

    /**
     * Show the category page
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCategory(Request $request, $slug)
    {
        $category = Category::with('parent')->where('slug', '=', $slug)->first();
        $products = $category->products()->paginate(config('common.frontend.pagination'));
        return view('frontend.category')
            ->with('category', $category)
            ->with('products', $products);
    }

    /**
     * Show the product page
     *
     * @param Request $request
     * @param $slug
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showProduct(Request $request, $slug)
    {
        $product = Product::where('slug', '=', $slug)->first();

        return view('frontend.product')->with('product', $product);
    }

    /**
     * Search products
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        $keyword = $request->get('query');

        $products = Product::search($keyword)->paginate(config('common.frontend.pagination'));

        return view('frontend.search')->with('products', $products);
    }
}
