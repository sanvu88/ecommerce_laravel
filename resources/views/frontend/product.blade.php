@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('product', $product) }}
    <section>
        <div class="container section--default">
            <div class="row">
                <div class="col-lg-5 col-sm-4 col-xs-12">
                    <div class="wrap-image-pro">
                        <img src="{{ asset($product->thumbnail) }}" alt="">
                    </div>
                    <div class="thumnail">
                        <img src="{{ asset($product->thumbnail) }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-sm-8 col-xs-12">
                    <h4>{{ $product->name }}</h4>
                    <p class="wrap-price-detail">
                        <del>{{ $product->price }}</del><br>
                        <span class="price">{{ $product->promotion_price }}</span>
                    </p>
                    <p>Tình trạng: Còn hàng</p>
                    <div class="mb-10">
                        <button class="btn-default-solid">Chọn mua</button>
                        <!-- <div class="wrap-group-number">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input type="text" disabled="" value="2">
                        </div> -->
                    </div>

                    <p> Nhà sản xuất: {{ $product->manufacturer }}</p>
                    <p>{!! $product->short_description !!}</p>
                </div>
            </div>
        </div>
        <div class="container section--default">
            {!! $product->long_description !!}
        </div>
    </section>
@endsection
