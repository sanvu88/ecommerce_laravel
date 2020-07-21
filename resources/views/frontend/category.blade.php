@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container vrsg-categories">
            <div class="row">
                <div class="col-auto list-cate-left">
                    <div class="wiget section--default">
                        <h4 class="wiget-title">
                            Danh mục
                        </h4>
                        <ul class="list-categories">
                            @include('frontend.includes.categories_left_menu', ['categories' => $categories])
                        </ul>
                    </div>
                </div>
                <div class="col-auto list-cate-right section--default">
                    <div class="section-title">
                        <h2>{{ $category->name }}</h2>
                    </div>
                    <div class="wrap-item-product">
                        @foreach($products as $product)
                        <div class="item-product">
                            <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                <img src="{{ asset($product->thumbnail) }}" alt="">
                            </a>
                            <a href="{{ route('product', ['slug' => $product->slug]) }}" class="item-title">{{ $product->name }}</a>
                            <p class="item-price">
                                <del>{{ $product->price }}</del>
                                <span class="price">{{ $product->promotion_price }}</span>
                            </p>
                            <button class="btn-default-solid">Chọn mua</button>
                            <div class="wrap-group-number" style="display: none;">
                                <button class="btn-plus"><i class="ti-plus"></i></button>
                                <button class="btn-minus"><i class="ti-minus"></i></button>
                                <input type="text" disabled value="0">
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="pagination-style">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">...</a></li>
                            <li><a href="#">10</a></li>
                        </ul>
                        <p class="mb-0">Tất cả có 20 kết quả</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection