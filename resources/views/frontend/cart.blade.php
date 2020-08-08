@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('cart') }}

    <section>
        <div class="container vrsg-cart">
            <div class="row">
                <div class="col-lg-8 col-sm-7 col-12 cart-left section--default">
                    <div class="section-title">
                        <h2>Bạn có {{ $cart::count() }} sản phẩm </h2>
                    </div>
                    <div class="wrap-list-item">
                        @foreach($cart::content() as $product)
                            <div class="cart-item">
                            <div class="wrap-img-cart">
                                <a href="#"><img src="{{ $product->options['img'] }}" alt=""></a>
                            </div>
                            <div class="content-cart">
                                <h4 class=""><a href="#">{{ $product->name }}</a></h4>
                                <div class="wrap-group-number float-left">
                                    <button class="btn-plus"><i class="ti-plus"></i></button>
                                    <button class="btn-minus"><i class="ti-minus"></i></button>
                                    <input type="text" disabled="" value="{{ $product->qty }}">
                                </div>
                                <p class="item-price cart-price">
                                    <span>x</span>
                                    <span class="price">{{ number_format($product->price, 0) }} VNĐ</span>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-sm-5 col-12 cart-right">
                    <div class="wrap-layout-r">
                        <div class="p-0 section--default">
                            <h4 class="wiget-title">
                                Áp dụng giảm giá
                            </h4>
                            <div class="wrap-apply-promo">
                                @if(!isset($coupon))
                                    <form action="{{ route('cart.applyCoupon') }}" method="post">
                                        @csrf
                                        <input type="text" name="code" placeholder="Mã giảm giá">
                                        <button class="btn-default-solid" type="submit">Áp dụng</button>
                                    </form>
                                @else
                                    <form action="{{ route('cart.removeCoupon') }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn-default-solid" type="submit">Gỡ mã giảm giá</button>
                                    </form>
                                @endif
                                <div class="pt-30">
                                    <p><span class="float-right">{{ $cart::subTotal() }} VNĐ</span></p>
                                    @if(isset($coupon))
                                        <p class="p-promo">Mã <strong>{{ $coupon }}</strong> giảm giá <span class="float-right">-{{ $discount }} VNĐ</span></p>
                                    @endif
                                    <p>Tạm tính <span class="float-right price">{{ $newSubtotal }} VNĐ</span></p>
                                </div>
                            </div>
                        </div>
                        <div class="text-center go-checkout">
                            <a href="{{ route('cart.getCheckout') }}" class="btn-default float-right w-100">Tiến hành thanh toán</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
