<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <ul class="navbar-nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#categories_drp">
                        <i class="linea-icon linea-basic" data-icon="m"></i>
                        <span class="nav-link-text">Categories</span>
                    </a>
                    <ul id="categories_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.index') }}">Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('categories.create') }}">Create</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Trashed</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#products_drp">
                        <i class="linea-icon linea-basic" data-icon="t"></i>
                        <span class="nav-link-text">Products</span>
                    </a>
                    <ul id="products_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products.index') }}">Listing</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('products.create') }}">Create</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Trashed</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#orders_drp">
                        <i class="linea-icon linea-basic" data-icon="t"></i>
                        <span class="nav-link-text">Orders</span>
                    </a>
                    <ul id="orders_drp" class="nav flex-column collapse collapse-level-1">
                        <li class="nav-item">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('orders.index') }}">Listing</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{ route('products.create') }}">Create</a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="#">Trashed</a>--}}
{{--                                </li>--}}
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div id="hk_nav_backdrop" class="hk-nav-backdrop"></div>
