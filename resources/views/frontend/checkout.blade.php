@extends('frontend.layouts.app')

@section('content')
    {{ Breadcrumbs::render('checkout') }}

    <section>
        <div class="container vrsg-cart">
            <div class="row">
                <div class="col-lg-8 col-sm-7 col-xs-12 cart-left p-0">
                    <form name="checkout" action="{{ route('cart.postCheckout') }}" method="post">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span>
                            @endforeach
                        @endif
                        @csrf
                        <div class="section--default section--default-custom">
                            <h5 class="pb-10">Thông tin khách hàng </h5>
                            <div class="form-group">
                                <input type="text" name="fullname" placeholder="Họ và tên" class="">
                            </div>
                            <div class="form-group-custom">
                                <div class="form-group w60">
                                    <input type="text" name="email" placeholder="Email" class="">
                                </div>
                                <div class="form-group w35">
                                    <input type="text" name="phone_number" placeholder="*Số điện thoại" class="">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="house_number" placeholder="*Số nhà" class="">
                            </div>
                            <div class="form-group">
                                <select id="province" name="province_code" class="col-md-4">
                                    <option value="" disabled selected>Thành phố / Tỉnh </option>
                                    @foreach($provinces as $province)
                                        <option value="{{ $province->code }}">{{ $province->name_with_type }}</option>
                                    @endforeach
                                </select>
                                <select id="district" name="district_code" class="col-md-4">
                                    <option value="" disabled selected>Quận / Huyện</option>
                                    @foreach($districts as $district)
                                        <option value="{{ $district->code }}">{{ $district->name_with_type }}</option>
                                    @endforeach
                                </select>
                                <select id="ward" name="ward_code" class="col-md-4">
                                    <option value="" disabled selected>Phường / Xã</option>
                                    @foreach($wards as $ward)
                                        <option value="{{ $ward->code }}">{{ $ward->name_with_type }}</option>
                                    @endforeach
                                </select>
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
                                    <p> <span class="float-right">{{ number_format($subTotal, 0) }} VNĐ</span></p>
                                    <p>Mã giảm giá <span class="float-right">{{ number_format($discount, 0) }} VNĐ</span></p>
                                    <p class="tax">Phí ship <span class="float-right">{{ number_format($tax, 0) }} VNĐ</span></p>
                                    <p class="total">Thanh toán <span class="price float-right">{{ number_format($total, 0) }} VNĐ</span></p>
                                </div>
                            </div>

                        </div>
                        <div class="text-center go-checkout">
                            <button name="btnCheckout" class="btn-default float-right w-100">Đặt hàng</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script>
        $('#province').change(function () {
            let selected =  $(this).children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.getListDistrict') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    provinceCode: selected,
                }
            }).then(function (res) {
                let html = '';
                res.data.forEach(function (e) {
                    html += `<option value="${e.code}">${e.name_with_type}</option>`;
                });
                $('#district').html(html);
                $('#district').trigger('change');
            })
        });

        $('#district').change(function () {
            let selected =  $(this).children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.getListWard') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    districtCode: selected,
                }
            }).then(function (res) {
                let html = '';
                res.data.forEach(function (e) {
                    html += `<option value="${e.code}">${e.name_with_type}</option>`;
                });
                $('#ward').html(html);
                $('#ward').trigger('change');
            })
        });
        $('#ward').change(function () {
            getAddressString();
            let province_code = $('#province').children("option:selected").val();
            let district_code = $('#district').children("option:selected").val();
            $.ajax({
                type: 'POST',
                url: '{{ route('cart.getTax') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    province_code: province_code,
                    district_code: district_code
                }
            }).then(function (res) {
                let tax = `${res.data.tax} VNĐ`;
                let total = `${res.data.total} VNĐ`;
                $('p.tax > span').text(tax);
                $('p.total > span').text(total);
            });
        });
        $('button[name="btnCheckout"]').click(function () {
            $('form[name="checkout"]').submit();
        });
    </script>
@endsection
