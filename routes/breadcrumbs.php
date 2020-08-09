<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Trang chủ', route('home'));
});

// [Category] > [Category]
Breadcrumbs::for('parent_category', function ($trait, $category) {
    if (isset($category)) {
        if (isset($category->parent)) {
            $trait->parent('parent_category', $category->parent);
        }
        $trait->push($category->name, route('category', ['slug' => $category->slug]));
    }
});

// Home > [Category]
Breadcrumbs::for('category', function ($trait, $category) {
    $trait->parent('home');
    $trait->parent('parent_category', $category->parent);
    $trait->push($category->name, route('category', ['slug' => $category->slug]));
});

// Home > [Category] > [Product]
Breadcrumbs::for('product', function ($trait, $product) {
    $trait->parent('home');
    $trait->parent('parent_category', $product->categories()->first());
    $trait->push($product->name, route('product', ['slug' => $product->slug]));
});

// Home > Cart
Breadcrumbs::for('cart', function ($trait) {
    $trait->parent('home');
    $trait->push('Giỏ hàng', route('cart.index'));
});

// Home > Cart > Checkout
Breadcrumbs::for('checkout', function ($trait) {
    $trait->parent('cart');
    $trait->push('Thanh toán', route('cart.getCheckout'));
});
