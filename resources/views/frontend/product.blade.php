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
                        @if ($product->current_promotion)
                            <del>{{ number_format($product->price, 0) }} VNĐ</del><br>
                            <span class="price">{{ number_format($product->current_promotion->price_promotion, 0) }} VNĐ</span>
                        @else
                            <span class="price">{{ number_format($product->price, 0) }} VNĐ</span>
                        @endif
                    </p>
                    <p>Tình trạng: Còn hàng</p>
                    <div class="mb-10">
                        <button class="btn-default-solid">Chọn mua</button>
                        <div class="wrap-group-number">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input id="qty" type="text" disabled="" value="1">
                        </div>
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

@section('script')
    <script>
        $('.btn-plus').click(function () {
            if ($('#qty').val() < {{ $product->stock }}) {
                $('#qty').val(parseInt($('#qty').val()) + 1);
            }
        });

        $('.btn-minus').click(function () {
            if ($('#qty').val() > 0) {
                $('#qty').val(parseInt($('#qty').val()) - 1);
            }
        });
    </script>
@endsection
