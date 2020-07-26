@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('checkout') }}

    <section>
        <div class="container vrsg-cart">
            <div class="row">
                <div class="col-lg-8 col-sm-7 col-xs-12 cart-left p-0">
                    <form action="">
                        <div class="section--default section--default-custom">
                            <h5 class="pb-10">Thông tin khách hàng </h5>
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Họ và tên" class="">
                            </div>
                            <div class="form-group-custom">
                                <div class="form-group w60">
                                    <input type="text" name="email" placeholder="Email" class="">
                                </div>
                                <div class="form-group w35">
                                    <input type="text" name="phoneNumber" placeholder="*Số điện thoại" class="">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" placeholder="*Địa chỉ" class="">
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="2" name="note" placeholder="Ghi chú"></textarea>
                            </div>
                        </div>
                        <div class="section--default section--default-custom">
                            <h5 class="pb-10">Hình thức thanh toán</h5>
                            <div class="form-group mb-0">
                                <input type="radio" checked="" name="payment" id="cod" class="input-custom" value="1">
                                <label for="cod">Thanh toán tiền mặt khi nhận hàng</label>
                            </div>
                            <!-- <div class="form-group mb-0">
                                <input type="radio" name="payment" id="ck" class="input-custom" value="2">
                                <label for="ck">Chuyển khoảng trước</label>
                            </div> -->
                        </div>
                    </form>

                </div>
                <div class="col-lg-4 col-sm-5 col-xs-12 cart-right">
                    <div class="wrap-layout-r">
                        <div class="p-0 section--default">
                            <h4 class="wiget-title">
                                Xác thực thông tin
                            </h4>
                            <div class="wrap-apply-promo">
                                <p>Họ tên: <span class="name-input"></span></p>
                                <p>Số điện thoại: <span class="phone-input"></span></p>
                                <p>Email: <span class="email-input"></span></p>
                                <p>Địa chỉ: <span class="address-input"></span></p>
                                <p>Thanh toán tiền mặt khi nhận hàng</p>
                                <p>Ghi chú: <span class="note"></span></p>
                                <div class="shopping-total">
                                    <p> <span class="float-right">{{ $cart::total() }} VNĐ</span></p>
                                    <p>Mã giảm giá <span class="float-right">-2,000 VNĐ</span></p>
                                    <p>Phí ship <span class="float-right">20,000 VNĐ</span></p>
                                    <p class="total">Thanh toán <span class="price float-right">58,000 VNĐ</span></p>
                                </div>
                            </div>

                        </div>
                        <div class="text-center go-checkout">
                            <button class="btn-default float-right w-100">Đặt hàng</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
