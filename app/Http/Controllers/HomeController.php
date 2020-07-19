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
        $categories = Category::with(['children', 'products', 'subProducts'])->root()->get();

        foreach ($categories as $index => $category) {
            $category->products = $category->products->merge($category->subProducts);
            $categories[$index] = $category;
        }

        return view('frontend.home')
            ->with('categories', $categories);
    }
}
