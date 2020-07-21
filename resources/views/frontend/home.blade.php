@extends('frontend.layouts.app')

@section('content')
    <section>
        <div class="container section--default mt-30">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="posr banner-aside">
                        <a href="#"><img src="{{ asset('frontend/images/banner-1.png') }}" alt=""></a>
                        <div class="wrap-content-sale">
                            <h3>-30%</h3>
                            <p>Đất trồng và phân bón</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="posr banner-aside">
                        <a href="#"><img src="{{ asset('frontend/images/banner-1.png') }}" alt=""></a>
                        <div class="wrap-content-sale">
                            <h3>-20%</h3>
                            <p>Hạt giống mùa hè</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @foreach($categories as $category)
        <section>
            <div class="container section--default">
                <div class="section-title">
                    <h2>{{ $category->name }} <a href="{{ route('category', ['slug' => $category->slug]) }}" class="float-right color--link">Xem tất cả</a></h2>
                </div>
                <div class="row">
                    <div class="col-12">
                        @foreach($category->products->take(5) as $product)
                            <div class="item-product">
                                <a href="{{ route('product', ['slug' => $product->slug]) }}">
                                    <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->slug }}">
                                </a>
                                <a href="#" class="item-title">{{ $product->name }}</a>
                                <p class="item-price">
                                    <del>{{ $product->price }} VND</del>
                                    <span class="price">{{ $product->promotion_price }} VND</span>
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
                </div>
            </div>
        </section>
    @endforeach
@endsection
