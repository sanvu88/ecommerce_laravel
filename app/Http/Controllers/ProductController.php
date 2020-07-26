<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Image;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $products = Product::paginate(10);
        return view('backend.product.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $allCategory = Category::root()->get();
        $allStatus = config('common.product.status');
        return view('backend.product.create')
            ->with('allCategory', $allCategory)
            ->with('allStatus', $allStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->except(['tags', 'thumbnail', 'images']));

        // Sync Categories
        $categories = $request->get('categories') ?? [];
        $product->categories()->sync($categories);

        // Sync tags
        $tags = (array) $request->get('tags') ?? [];
        foreach ($tags as $tag) {
            Tag::firstOrCreate(['name' => $tag]);
        }
        $tagIds = Tag::whereIn('name', $tags)->get(['id'])->pluck('id')->all();
        $product->tags()->sync($tagIds);

        // Add thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $thumbnailName = 'thumbnail_' . $product->sku . '_' . time() . '.' . $file->getClientOriginalExtension();
            $thumbnailPath = 'images/product/' . $product->sku . '/thumbnail';
            $file->storeAs($thumbnailPath, $thumbnailName);
            $product->thumbnail_filename = $thumbnailName;
            $product->thumbnail_path = $thumbnailPath;
            $product->save();
        }

        // Add images
        if ($request->hasFile('images')) {
            $files = $request->images;
            $imageIds = [];
            foreach ($files as $file) {
                $imageName = 'image_' . $product->sku . '_' . md5(time().Str::random(10)) . '.' . $file->getClientOriginalExtension();
                $imagePath = 'images/product/' . $product->sku . '/image';
                $file->storeAs($imagePath, $imageName);
                [$width, $height] = getimagesize($file);
                $image = Image::create([
                    'filename' => $imageName,
                    'path' => $imagePath,
                    'width' => $width,
                    'height' => $height,
                    'size' => $file->getSize()
                ]);
                array_push($imageIds, $image->id);
            }
            $product->images()->sync($imageIds);
        }

        return redirect(route('products.index'))->with('success', 'You have successfully created a new product');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Product $product)
    {
        $allStatus = config('common.product.status');

        return view('backend.product.edit')
            ->with('product', $product)
            ->with('allStatus', $allStatus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $product->update($request->except(['tags', 'thumbnail', 'categories']));

        // Sync Categories
        $categories = $request->get('categories') ?? [];
        $product->categories()->sync($categories);

        // Sync Tags
        $tags = $request->get('tags') ?? [];
        foreach ($tags as $tag) {
            Tag::firstOrCreate(['name' => $tag]);
        }
        $tagIds = Tag::whereIn('name', $tags)->get(['id'])->pluck('id')->all();
        $product->tags()->sync($tagIds);

        // update thumbnail
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $thumbnailName = 'thumbnail_' . $product->sku . '_' . time() . '.' . $file->getClientOriginalExtension();
            $thumbnailPath = 'images/product/' . $product->sku . '/thumbnail';
            $file->storeAs($thumbnailPath, $thumbnailName);
            $product->thumbnail_filename = $thumbnailName;
            $product->thumbnail_path = $thumbnailPath;
            $product->save();
        }

        return redirect(route('products.index'))->with('success', 'You have successfully updated the product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Exception
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect(route('products.index'))->with('success', 'You have successfully deleted the category');
    }
}
