@extends('trangChu.Layout.LayoutClient')
@section('contentClient')
    @if ($nameSearch)
    <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Có {{ $productSearch->count() }} sản phẩm trùng với tên cần tìm: </span>
                        </h2>
                    </div>
                    <div class="row">
                        @foreach ($productSearch as $item)
                            <div style="width: 236px; padding: 15px">
                                <!-- single-product-wrap start -->
                                <div class="single-product-wrap">
                                    <div class="product-image">
                                        <a href="/productdetail/{{ $item->id }}">
                                            <img src="/uploads/products/{{ $item->AnhDaiDien }}"
                                                alt="Li's Product Image">
                                        </a>
                                        <span class="sticker">Giảm {{ $item->PhanTram . ' %' }}</span>
                                    </div>
                                    <div class="product_desc">
                                        <div class="product_desc_info">
                                            <h4><a class="product_name"
                                                    href="/productdetail/{{ $item->id }}">{{ $item->TenSanPham }}</a>
                                            </h4>
                                            <div class="price-box">
                                                <span class="new-price">{{ number_format($item->GiaGiam) }}</span>
                                                <span class="old-price">{{ number_format($item->GiaBan) }}</span>
                                            </div>
                                        </div>
                                        <div class="add-actions">
                                            <ul class="add-actions-link">
                                                <li class="add-cart active" style="width: 206px"><a
                                                        href="{{ route('addCart', ['id' => $item->id]) }}">Thêm vào giỏ
                                                        hàng</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product-wrap end -->
                            </div>
                        @endforeach
                    </div>
                    <div class="col-lg-4 pagination d-flex justify-content-end">
                        {{ $productSearch->links() }}
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    @else
        <div class="breadcrumb-area">
            <div class="container">
                <div class="breadcrumb-content">
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="active">Về chúng tôi</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- about wrapper start -->
        <div class="about-us-wrapper pt-60 pb-40">
            <div class="container">
                <div class="row">
                    <!-- About Text Start -->
                    <div class="col-lg-6 order-last order-lg-first">
                        <div class="about-text-wrap">
                            <h2><span>Cung cấp tốt nhất</span>sản phẩm cho bạn</h2>
                            <p>Chúng tôi cung cấp smart phone tốt nhất trên toàn Việt Nam. Chúng tôi là cửa hàng tốt nhất ở
                                Việt Nam. Bạn có thể mua sản phẩm của chúng tôi mà không có bất kỳ sự do dự nào vì họ tin
                                tưởng chúng tôi và mua sản phẩm của chúng tôi mà không có bất kỳ sự nghi ngờ nào vì họ tin
                                tưởng và luôn vui vẻ mua sản phẩm của chúng tôi.</p>
                            <p>Một số khách hàng của chúng tôi nói rằng họ tin tưởng chúng tôi và mua sản phẩm của chúng tôi
                                mà không có bất kỳ sự nghi ngờ nào vì họ tin tưởng chúng tôi và luôn vui vẻ mua sản phẩm của
                                chúng tôi.</p>
                            <p>Chúng tôi cung cấp những gì tốt nhất mà họ đã tin tưởng và mua sản phẩm của chúng tôi mà
                                không có bất kỳ sự nghi ngờ nào vì họ tin tưởng chúng tôi và luôn vui vẻ mua hàng.</p>
                        </div>
                    </div>
                    <!-- About Text End -->
                    <!-- About Image Start -->
                    <div class="col-lg-5 col-md-10">
                        <div class="about-image-wrap">
                            <img class="img-full" src="/assets/images/product/large-size/13.jpg" alt="About Us" />
                        </div>
                    </div>
                    <!-- About Image End -->
                </div>
            </div>
        </div>
        <!-- about wrapper end -->
        <!-- Begin Counterup Area -->
        <div class="counterup-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <!-- Begin Limupa Counter Area -->
                        <div class="limupa-counter white-smoke-bg">
                            <div class="container">
                                <div class="counter-img">
                                    <img src="/assets/images/about-us/icon/1.png" alt="">
                                </div>
                                <div class="counter-info">
                                    <div class="counter-number">
                                        <h3 class="counter">2169</h3>
                                    </div>
                                    <div class="counter-text">
                                        <span>KHÁCH HÀNG VUI VẺ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- limupa Counter Area End Here -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Begin limupa Counter Area -->
                        <div class="limupa-counter gray-bg">
                            <div class="counter-img">
                                <img src="/assets/images/about-us/icon/2.png" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-number">
                                    <h3 class="counter">869</h3>
                                </div>
                                <div class="counter-text">
                                    <span>GIẢI THƯỞNG ĐÃ ĐẠT ĐƯỢC</span>
                                </div>
                            </div>
                        </div>
                        <!-- limupa Counter Area End Here -->
                    </div>
                    <div class="col-lg-4">
                        <!-- Begin limupa Counter Area -->
                        <div class="limupa-counter white-smoke-bg">
                            <div class="counter-img">
                                <img src="/assets/images/about-us/icon/3.png" alt="">
                            </div>
                            <div class="counter-info">
                                <div class="counter-number">
                                    <h3 class="counter">689</h3>
                                </div>
                                <div class="counter-text">
                                    <span>SỐ GIỜ LÀM VIỆC</span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Counterup Area End Here -->
        <!-- team area wrapper start -->
        <div class="team-area pt-60 pt-sm-44">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="li-section-title capitalize mb-25">
                            <h2><span>Quản lý</span></h2>
                        </div>
                    </div>
                </div> <!-- section title end -->
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                            <div class="team-thumb">
                                <img src="/assets/images/team/1.png" alt="Our Team Member">
                            </div>
                            <div class="team-content text-center">
                                <h3>Đỗ Đình Diệm</h3>
                                <p>Quản trị viên</p>
                                <a href="#">dodinhdiem@gmail.com</a>
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-60 mb-sm-30 mb-xs-30">
                            <div class="team-thumb">
                                <img src="/assets/images/team/2.png" alt="Our Team Member">
                            </div>
                            <div class="team-content text-center">
                                <h3>Hà Thu Thảo</h3>
                                <p>Maketting</p>
                                <a href="#">hathuthao2309@gmail.com</a>
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30 mb-sm-60">
                            <div class="team-thumb">
                                <img src="/assets/images/team/3.png" alt="Our Team Member">
                            </div>
                            <div class="team-content text-center">
                                <h3>Lê Huy Hoàng</h3>
                                <p>Nhân viên giải đáp trực tuyến</p>
                                <a href="#">lehuyhoang2405@gmail.com</a>
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-member mb-30 mb-sm-60 mb-xs-60">
                            <div class="team-thumb">
                                <img src="/assets/images/team/4.png" alt="Our Team Member">
                            </div>
                            <div class="team-content text-center">
                                <h3>Phan Mai Hương</h3>
                                <p>Nhân viên bán hàng</p>
                                <a href="#">phanmaihuong@gmail.com</a>
                                <div class="team-social">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end single team member -->
                </div>
            </div>
        </div>
    @endif
@endsection
