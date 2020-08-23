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
                        <h2>Kết quả tìm kiếm với từ khoá: {{ app('request')->get('keyword') }}</h2>
                    </div>
                    <div class="wrap-item-product">
                        @foreach($products as $product)
                            <div class="item-product">
                                <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                    <img src="{{ asset($product->thumbnail) }}" alt="">
                                </a>
                                <a href="{{ route('product', ['slug' => $product->slug]) }}" class="item-title">{{ $product->name }}</a>
                                <p class="item-price">
                                    @if ($product->current_promotion)
                                        <del>{{ number_format($product->price, 0) }} VNĐ</del>
                                        <span class="price">{{ number_format($product->current_promotion->price_promotion, 0) }} VNĐ</span>
                                    @else
                                        <span class="price">{{ number_format($product->price, 0) }} VNĐ</span>
                                    @endif
                                </p>
                                <button class="btn-default-solid" onclick="addToCart({{$product->id}}, 1)">Chọn mua</button>
                                <div class="wrap-group-number" style="display: none;">
                                    <button class="btn-plus"><i class="ti-plus"></i></button>
                                    <button class="btn-minus"><i class="ti-minus"></i></button>
                                    <input type="text" disabled value="0">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{ $products->links('frontend.includes.pagination') }}
                </div>
            </div>
        </div>
    </section>
@endsection