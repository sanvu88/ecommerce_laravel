<header>
    <nav class="header-menu">
        <div class="container-fluid main-menu">
            <div class="row">
                <div class="col header-left">
                    <ul class="ul-menu">
                        <li class="has-child">
                            <a href="#">Sản phẩm</a>
                            <ul class="sub-ul-menu">
                                @include('frontend.includes.categories_top_menu', ['categories' => $categories])
                            </ul>
                        </li>
                        <li><a href="#">Tin tức</a></li>
                        <li><a href="#">Liên hệ</a></li>
                    </ul>
                </div>
                <div class="col col-md-auto">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('frontend/images/logo.png') }}" alt=""></a>
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
                            <form action="{{ route('search') }}" method="get">
                                <input type="text" name="query" placeholder="Tìm kiếm ...">
                                <button><span class="ti-search"></span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
