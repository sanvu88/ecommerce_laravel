<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImageStore;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Image;
use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $allStatus = config('common.product.status');
        $allWeightUnit = config('common.product.weight_unit');
        $allDimensionUnit = config('common.product.dimension_unit');
        return view('backend.product.create')
            ->with('allStatus', $allStatus)
            ->with('allWeightUnit', $allWeightUnit)
            ->with('allDimensionUnit', $allDimensionUnit)
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(ProductStoreRequest $request)
    {
        $product = Product::create($request->except(['categories', 'tags', 'thumbnail', 'images']));

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
            $product->thumbnail = Storage::url($thumbnailPath . '/' .$thumbnailName);
            $product->save();
        }

        // Add images
        if ($request->hasFile('images')) {
            $files = $request->images;
            foreach ($files as $file) {
                $imageName = 'image_' . $product->sku . '_' . md5(time().Str::random(10)) . '.' . $file->getClientOriginalExtension();
                $imagePath = 'images/product/' . $product->sku . '/image';
                $file->storeAs($imagePath, $imageName);
                [$width, $height] = getimagesize($file);
                $image = new Image([
                    'url' => Storage::url($imagePath . '/' .$imageName),
                    'width' => $width,
                    'height' => $height,
                    'size' => $file->getSize()
                ]);
                $product->images()->save($image);
            }
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
        $allWeightUnit = config('common.product.weight_unit');
        $allDimensionUnit = config('common.product.dimension_unit');

        return view('backend.product.edit')
            ->with('product', $product)
            ->with('allStatus', $allStatus)
            ->with('allWeightUnit', $allWeightUnit)
            ->with('allDimensionUnit', $allDimensionUnit);
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
        $product->update($request->except(['categories', 'tags', 'thumbnail']));

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
            if (file_exists(public_path() . $product->thumbnail)) {
                unlink(public_path() . $product->thumbnail);
            }
            $file = $request->thumbnail;
            $thumbnailName = 'thumbnail_' . $product->sku . '_' . time() . '.' . $file->getClientOriginalExtension();
            $thumbnailPath = 'images/product/' . $product->sku . '/thumbnail';
            $file->storeAs($thumbnailPath, $thumbnailName);
            $product->thumbnail = Storage::url($thumbnailPath . '/' .$thumbnailName);
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

        return redirect()->back()->with('success', 'You have successfully move the product to trashed');
    }

    /**
     * Display a listing of the trashed products.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function trashed()
    {
        $products = Product::onlyTrashed()->paginate(10);
        return view('backend.product.trashed')->with('products', $products);
    }

    /**
     * Restored a trashed product
     *
     * @param Request $request
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function restore(Request $request, $id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->restore();
        return redirect()->back()->with('success', 'You have successfully restored the product');
    }

    /**
     * Force delete a trashed product
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function forceDelete($id)
    {
        $product = Product::onlyTrashed()->where('id', $id)->first();
        $product->forceDelete();
        return redirect()->back()->with('success', 'You have successfully deleted the product');
    }

    /**
     * Display a listing of product images
     *
     * @param Product $product
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function editImages(Product $product)
    {
        return view('backend.product.edit_images')->with('product', $product->load('images'));
    }

    /**
     * Store product images.
     *
     * @param Product $product
     * @param ProductImageStore $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addImages(Product $product, ProductImageStore $request)
    {
        $files = $request->images;
        foreach ($files as $file) {
            $imageName = 'image_' . $product->sku . '_' . md5(time().Str::random(10)) . '.' . $file->getClientOriginalExtension();
            $imagePath = 'images/product/' . $product->sku . '/image';
            $file->storeAs($imagePath, $imageName);
            [$width, $height] = getimagesize($file);
            $image = new Image([
                'url' => Storage::url($imagePath . '/' .$imageName),
                'width' => $width,
                'height' => $height,
                'size' => $file->getSize()
            ]);
            $product->images()->save($image);
        }

        return redirect()->back()->with('success', 'You have successfully uploaded product images');
    }

    public function deleteImage(Product $product, Image $image)
    {
        foreach ($product->images as $item) {
            if ($item->id == $image->id) {
                $image->imageable()->detach();
                if (file_exists(public_path() . $image->url)) {
                    unlink(public_path() . $image->url);
                }
                $image->delete();
            }
        }

        return redirect()->back()->with('success', 'You have successfully deleted product image');
    }
}
