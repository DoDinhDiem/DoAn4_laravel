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
                    <li><a href="index.html">Trang chủ</a></li>
                    <li class="active">
                        @foreach ($categorys as $item)
                            @if ($productdetail->MaLoai == $item->id)
                                {{ $item->TenLoai }}
                            @endif
                        @endforeach

                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Li's Breadcrumb Area End Here -->
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            @foreach ($imgdetail as $item)
                                <div class="lg-image">
                                    <a class="popup-img venobox vbox-item" href="/uploads/imgdetail/{{ $item->Anh }}"
                                        data-gall="myGallery">
                                        <img src="/uploads/imgdetail/{{ $item->Anh }}" alt="product image">
                                    </a>
                                </div>
                            @endforeach

                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            <div class="sm-image"><img src="/uploads/products/{{ $productdetail->AnhDaiDien }}"
                                    alt="product image thumb"></div>
                            @foreach ($imgdetail as $item)
                                <div class="sm-image"><img src="/uploads/imgdetail/{{ $item->Anh }}"
                                        alt="product image thumb"></div>
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>

                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content pt-60">
                        <div class="product-info">
                            <h2>{{ $productdetail->TenSanPham }}</h2>

                            <div class="price-box">
                                @if ($productdetail->GiaGiam == $productdetail->GiaBan)
                                    <span class="new-price">{{ number_format($productdetail->GiaGiam) }}</span>
                                @else
                                    <span class="new-price">{{ number_format($productdetail->GiaGiam) }}</span>
                                    <span style="text-decoration: line-through;"
                                        class="old-price">{{ number_format($productdetail->GiaBan) }}</span>
                                    <span style="color: #e80f0f;"
                                        class="discount-percentage">-{{ $productdetail->PhanTram }}%</span>
                                @endif
                            </div>
                            <br>
                            <br>

                            <div class="single-add-to-cart">
                                <form class="cart-quantity">
                                    <button class="add-to-cart"><a
                                            href="{{ route('addCart', ['id' => $productdetail->id]) }}">Thêm vào giỏ
                                            hàng</a></button>
                                </form>
                            </div>
                            <div class="product-additional-info pt-25">
                                <a class="wishlist-btn" href="wishlist.html"><i class="fa fa-heart-o"></i>Yêu thích</a>
                                <div class="product-social-sharing pt-25">
                                    <ul>
                                        <li class="facebook"><a href="#"><i class="fa fa-facebook"></i>Facebook</a>
                                        </li>
                                        <li class="twitter"><a href="#"><i class="fa fa-twitter"></i>Twitter</a></li>
                                        <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i>Google
                                                +</a></li>
                                        <li class="instagram"><a href="#"><i class="fa fa-instagram"></i>Instagram</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="block-reassurance">
                                <ul>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-check-square-o"></i>
                                            </div>
                                            <p>Chính sách bảo mậ</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-truck"></i>
                                            </div>
                                            <p>Chính sách giao hàng</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="reassurance-item">
                                            <div class="reassurance-icon">
                                                <i class="fa fa-exchange"></i>
                                            </div>
                                            <p>Chính sách hoàn trả</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-35">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#description"><span>Mô tả</span></a></li>
                            <li><a data-toggle="tab" href="#product-details"><span>Mô tả chi tiết</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Li's Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="description" class="tab-pane active show" role="tabpanel">
                    <div class="product-description">
                        <span>{{ $productdetail->MoTaSanPham }}</span>
                    </div>
                </div>
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                        <div class="table-responsive">
                            <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Thông số</th>
                                        <th>Mô tả</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productInformation as $item)
                                        <tr>
                                            <td>{{ $item->TenThongSo }}</td>
                                            <td>{{ $item->MoTa }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Li's Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Li's Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Sản phẩm tương tự:</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($similarproduct as $item)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="/productdetail/{{ $item->id }}">
                                                <img src="/uploads/products/{{ $item->AnhDaiDien }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">New</span>
                                        </div>
                                        <div class="product_desc">
                                            <div class="product_desc_info">
                                                <h4><a class="product_name"
                                                        href="/productdetail/{{ $item->id }}">{{ $item->TenSanPham }}</a>
                                                </h4>
                                                <div class="price-box">
                                                    @if ($item->GiaGiam == $item->GiaBan)
                                                        <span class="new-price">{{ number_format($item->GiaGiam) }}</span>
                                                    @else
                                                        <span class="new-price">{{ number_format($item->GiaGiam) }}</span>
                                                        <span class="old-price">{{ number_format($item->GiaBan) }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active" style="width: 206px"><a
                                                            href="{{ route('addCart', ['id' => $item->id]) }}">Thêm vào
                                                            giỏ
                                                            hàng</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    @endif
    
@endsection
