<header class="li-header-4">
    <!-- Begin Header Top Area -->

    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="/assets/images/menu/logo/2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="#" method="GET" class="hm-searchbox">
                        <input type="text" name="nameSearch" placeholder="Tìm kiếm ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <!-- Header Middle Wishlist Area End Here -->
                            <li class="hm-wishlist">
                                <a style="border-radius: 2px" href="{{ route('login') }}">
                                    <i class="fa fa-user"></i>
                                </a>
                            </li>
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">{{number_format(floatval($cart->total_price), 0, ',', '.').' VNĐ'}}
                                        <span class="cart-item-count">{{ $cart->total_quantity }}</span>
                                    </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        
                                        @foreach ($cart->items as $item)
                                            <li>
                                                <a href="single-product.html" class="minicart-product-image">
                                                    <img src="/uploads/products/{{$item['AnhDaiDien']}}" alt="cart products">
                                                </a>
                                                <div class="minicart-product-details">
                                                    <h6><a href="single-product.html">{{$item['TenSanPham']}}</a></h6>
                                                    <span style="color: #e84d1c;">{{number_format(floatval($item['GiaBan']), 0, ',', '.').' VNĐ'}}</span> <span> {{ ' x '.$item['quantity'] }}</span>
                                                </div>
                                                <button class="close">
                                                    <a href="{{route('removeCart',['id'=>$item['id']])}}"><i class="fa fa-close"></i></a>
                                                </button>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <p class="minicart-total">Tổng tiền: <span style="color: #e84d1c;">{{number_format(floatval($cart->total_price), 0, ',', '.').' VNĐ'}}</span></p>
                                    <div class="minicart-button">
                                        <a href="{{ route('ViewCart') }}"
                                            class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                            <span>Xem giỏ hàng</span>
                                        </a>
                                        <a href="{{ route('CheckOut') }}" class="li-button li-button-fullwidth li-button-sm">
                                            <span>Thanh toán</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky stick d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                    <div class="hb-menu">
                        <nav>
                            <ul>
                                <li class="dropdown-holder"><a href="{{ route('home') }}">Trang chủ</a>
                                </li>
                                <li class="megamenu-holder"><a href="">Sản phẩm</a>
                                    <ul class="megamenu hb-megamenu">
                                        <li class="col-4">
                                            <ul>
                                                @foreach ($categorys as $item)
                                                    <li style="color: #000"><a
                                                            href="/categoryproduct/{{ $item->id }}">
                                                            {{ $item->TenLoai }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('News') }}">Tin tức</a></li>
                                <li><a href="{{ route('Contact') }}">Liên hệ</a></li>
                                <li><a href="{{ route('AboutUs') }}">Về chúng tôi</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area mobile-menu-area-4 d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
