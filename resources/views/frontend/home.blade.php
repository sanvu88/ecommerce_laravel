@extends('frontend.layouts.app')

@section('content')
    <header>
        <nav class="header-menu">
            <div class="container-fluid main-menu">
                <div class="row">
                    <div class="col header-left">
                        <ul class="ul-menu">
                            <li class="has-child">
                                <a href="#">Sản phẩm</a>
                                <ul class="sub-ul-menu">
                                    <li><a href="#">Giàn, kệ trồng rau</a></li>
                                    <li><a href="#">Chậu lắp ghép thông minh</a></li>
                                    <li><a href="#">Đất trồng và phân bón</a></li>
                                    <li class="has-child">
                                        <a href="#">Hạt giống <span class="arrow-right"><i class="ti-angle-right"></i></span></a>
                                        <ul class="sub-ul-menu sub-ul-menu-child">
                                            <li><a href="#">Rau mầm</a></li>
                                            <li><a href="#">Các loại củ</a></li>
                                            <li><a href="#">Các loại hoa</a></li>
                                            <li><a href="#">Các loại cà, ớt, đậu</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Phôi nấm</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Tin tức</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                    <div class="col col-md-auto">
                        <div class="logo">
                            <a href="#"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
                        </div>
                    </div>
                    <div class="col header-right">
                        <div class="wrap-header-right">
                            <div class="wrap-cart-icon has-item">
                                <a href="#" class="cart-icon"><i class="ti-shopping-cart"></i></a>
                                <span class="qty-cart">2</span>
                                <a href="#">Giỏ hàng</a>
                                <div class="wrap-item-view-cart">
                                    <div class="item-view-cart">
                                        <div class="w-item-mini">
                                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                                        </div>
                                        <div class="content-text-item">
                                            <a href="#">Hoa cúc họa mi</a>
                                            <p>02 x 20,000 VNĐ</p>
                                        </div>
                                        <span class="remove-item"><i class="ti-close"></i></span>
                                    </div>
                                    <div class="item-view-cart">
                                        <div class="w-item-mini">
                                            <a href="#"><img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt=""></a>
                                        </div>
                                        <div class="content-text-item">
                                            <a href="#">Hoa cúc họa mi</a>
                                            <p>02 x 20,000 VNĐ</p>
                                        </div>
                                        <span class="remove-item"><i class="ti-close"></i></span>
                                    </div>
                                    <div class="wrap-total-fee">
                                        <!-- <p class="mb-0">Phí ship: <span class="float-right">10,000 VNĐ</span></p> -->
                                        <p>Tạm tính: <span class="float-right"><strong>40,000 VNĐ</strong></span></p>
                                        <div class="wrap-btn-event">
                                            <a href="#" class="btn-default">Giỏ hàng</a>
                                            <a href="#" class="btn-default">Thanh toán</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="search">
                                <input type="text" placeholder="Tìm kiếm ...">
                                <button><span class="ti-search"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>
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
    <section>
        <div class="container section--default">
            <div class="section-title">
                <h2>Các loại hoa <a href="#" class="float-right color--link">Xem tất cả</a></h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="item-product">
                        <a href="#">
                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <a href="#" class="item-title">Hoa cúc họa mi</a>
                        <p class="item-price">
                            <del>25,000 VNĐ</del>
                            <span class="price">20,000 VNĐ</span>
                        </p>
                        <button class="btn-default-solid">Chọn mua</button>
                        <div class="wrap-group-number" style="display: none;">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input type="text" disabled value="0">
                        </div>
                    </div>
                    <div class="item-product">
                        <a href="#">
                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <a href="#" class="item-title">Hoa cúc họa mi</a>
                        <p class="item-price">
                            <del>25,000 VNĐ</del>
                            <span class="price">20,000 VNĐ</span>
                        </p>
                        <!-- <button class="btn-default-solid">Chọn mua</button> -->
                        <div class="wrap-group-number">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input type="text" disabled value="2">
                        </div>
                    </div>
                    <div class="item-product">
                        <a href="#">
                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <a href="#" class="item-title">Hoa cúc họa mi</a>
                        <p class="item-price">
                            <del></del>
                            <span class="price">20,000 VNĐ</span>
                        </p>
                        <button class="btn-default-solid">Chọn mua</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container section--default">
            <div class="section-title">
                <h2>Các loại rau thơm <a href="#" class="float-right color--link">Xem tất cả</a></h2>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="item-product">
                        <a href="#">
                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <a href="#" class="item-title">Hoa cúc họa mi</a>
                        <p class="item-price">
                            <del>25,000 VNĐ</del>
                            <span class="price">20,000 VNĐ</span>
                        </p>
                        <button class="btn-default-solid">Chọn mua</button>
                        <div class="wrap-group-number" style="display: none;">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input type="text" disabled value="0">
                        </div>
                    </div>
                    <div class="item-product">
                        <a href="#">
                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <a href="#" class="item-title">Hoa cúc họa mi</a>
                        <p class="item-price">
                            <del>25,000 VNĐ</del>
                            <span class="price">20,000 VNĐ</span>
                        </p>
                        <!-- <button class="btn-default-solid">Chọn mua</button> -->
                        <div class="wrap-group-number">
                            <button class="btn-plus"><i class="ti-plus"></i></button>
                            <button class="btn-minus"><i class="ti-minus"></i></button>
                            <input type="text" disabled value="2">
                        </div>
                    </div>
                    <div class="item-product">
                        <a href="#">
                            <img src="{{ asset('frontend/images/300x300_CH3-mua-hat-giong-hoa-cuc-hoa-mi-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <a href="#" class="item-title">Hoa cúc họa mi</a>
                        <p class="item-price">
                            <del></del>
                            <span class="price">20,000 VNĐ</span>
                        </p>
                        <button class="btn-default-solid">Chọn mua</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container section--default blog-index">
            <div class="section-title">
                <h2>Tin tức <a href="#" class="float-right color--link">Xem tất cả</a></h2>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="wrap-blog-content">
                        <a href="#">
                            <img src="{{ asset('frontend/images/mua-dat-sach-tribat-5dm3-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <h5 class="title-blog"><a href="#">Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất nào?</a></h5>
                        <p class="content-blog">Mến chào các bạn đã trở lại với ✅ Cửa Hàng Vườn Rau Sài Gòn. Hôm nay chúng tôi sẽ chia sẽ với bạn một yếu tố rất quan trọng trong việc trồng rau sạch tại nhà, Đó là đất trồng. ✅ Chúng ta hãy cùng bắt đầu bài viết "Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất trồng nào?"</p>
                        <a href="#" class="float-right color--link readmore">Xem thêm <i class="ti-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="wrap-blog-content">
                        <a href="#">
                            <img src="{{ asset('frontend/images/mua-dat-sach-tribat-5dm3-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <h5 class="title-blog"><a href="#">Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất nào?</a></h5>
                        <p class="content-blog">Mến chào các bạn đã trở lại với ✅ Cửa Hàng Vườn Rau Sài Gòn. Hôm nay chúng tôi sẽ chia sẽ với bạn một yếu tố rất quan trọng trong việc trồng rau sạch tại nhà, Đó là đất trồng. ✅ Chúng ta hãy cùng bắt đầu bài viết "Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất trồng nào?"</p>
                        <a href="#" class="float-right color--link readmore">Xem thêm <i class="ti-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="wrap-blog-content">
                        <a href="#">
                            <img src="{{ asset('frontend/images/mua-dat-sach-tribat-5dm3-vuonrausaigon.jpg') }}" alt="">
                        </a>
                        <h5 class="title-blog"><a href="#">Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất nào?</a></h5>
                        <p class="content-blog">Mến chào các bạn đã trở lại với ✅ Cửa Hàng Vườn Rau Sài Gòn. Hôm nay chúng tôi sẽ chia sẽ với bạn một yếu tố rất quan trọng trong việc trồng rau sạch tại nhà, Đó là đất trồng. ✅ Chúng ta hãy cùng bắt đầu bài viết "Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất trồng nào?"</p>
                        <a href="#" class="float-right color--link readmore">Xem thêm <i class="ti-angle-double-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <div class="wrap-blog-content">
                        <a href="#">
                            <img src="{{ asset('frontend/images/mua-dat-sach-tribat-5dm3-vuonrausaigon.jpg') }}D" alt="">
                        </a>
                        <h5 class="title-blog"><a href="#">Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất nào?</a></h5>
                        <p class="content-blog">Mến chào các bạn đã trở lại với ✅ Cửa Hàng Vườn Rau Sài Gòn. Hôm nay chúng tôi sẽ chia sẽ với bạn một yếu tố rất quan trọng trong việc trồng rau sạch tại nhà, Đó là đất trồng. ✅ Chúng ta hãy cùng bắt đầu bài viết "Trồng rau sạch tại nhà ở TP HCM - Nên dùng loại đất trồng nào?"</p>
                        <a href="#" class="float-right color--link readmore">Xem thêm <i class="ti-angle-double-right"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <footer id="footer">
        <div class="container section--default">
            <div class="row">
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <h3>Thông tin chung</h3>
                    <ul>
                        <li>
                            <a href="#">Giới thiệu</a>
                        </li>
                        <li>
                            <a href="#">Chính sách bảo hành</a>
                        </li>
                        <li>
                            <a href="#">Hình thức thanh toán</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <h3>Dịch vụ</h3>
                    <ul>
                        <li>
                            <a href="#">Khảo sát tư, vấn tại nhà</a>
                        </li>
                        <li>
                            <a href="#">Vận chuyển, lắp đặt trọn gói</a>
                        </li>
                        <li>
                            <a href="#">Gửi hàng COD toàn quốc</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <h3>Bài viết</h3>
                    <ul>
                        <li><a href="#">Tin tức</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-sm-3 col-xs-12">
                    <h3>Hợp tác</h3>
                    <ul>
                        <li><a href="#">Cộng tác viên</a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-12 detail-footer">
                    <h1>VƯỜN RAU SÀI GÒN</h1>
                    <p class="mb-0">Địa chỉ: 40/7 Lê Quang Kim, Phường 9, Quận 8, Thành Phố Hồ Chí Minh</p>
                    <p class="mb-0">Website: <a href="/" class="color--link">vuonrausaigon.com</a> - Email: hotro.vuonrausaigon@gmail.com</p>
                    <p class="mb-0">Số Điện Thoại : 033 400 3526</p>
                </div>
            </div>
            <div class="copyright">
                © Copyright 2020 - vuonrausaigon.com
            </div>
        </div>
    </footer>
    <div class="backtotop"><i class="ti-angle-double-up"></i></div>
@endsection
