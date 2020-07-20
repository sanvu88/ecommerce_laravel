@extends('frontend.layouts.app')

@section('content')

    <div class="row">
        <div class="col-auto list-cate-left">
            <div class="wiget section--default">
                <h4 class="wiget-title">
                    Danh mục
                </h4>
                <ul class="list-categories">
                    <li><a href="#">Giàn, kệ trồng rau</a></li>
                    <li><a href="#">Chậu lắp ghép thông minh</a></li>
                    <li><a href="#">Đất trồng và phân bón</a></li>
                    <li class="list-category-has-child">
                        <span class="title-cate">Hạt giống </span>
                        <span class="icon-sub-menu"><i class="ti-angle-down float-right"></i></span>
                        <ul class="">
                            <li>
                                <a href="#">Rau mầm</a>
                            </li>
                            <li>
                                <a href="#">Các loại củ</a>
                            </li>
                            <li>
                                <a href="#">Các loại hoa</a>
                            </li>
                            <li>
                                <a href="#">Các loại cà, ớt, đậu</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#">Phôi nấm</a></li>
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
                    <a href="#">
                        <img src="{{ asset($product->thumbnail) }}" alt="">
                    </a>
                    <a href="#" class="item-title">{{ $product->name }}</a>
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

@endsection