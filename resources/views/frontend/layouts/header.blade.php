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
                        @include('frontend.includes.cart_menu')
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
