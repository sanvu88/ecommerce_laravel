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
        $categories = Category::with(['children', 'products'])->root()->get();

        return view('frontend.home')
            ->with('categories', $categories);
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
        $categories = Category::with(['children'])->root()->get();
        $category = Category::where('slug', '=', $slug)->first(['id', 'name']);
        $products = $category->products()->paginate(10);
        return view('frontend.category')
            ->with('categories', $categories)
            ->with('category', $category)
            ->with('products', $products);
    }
}
