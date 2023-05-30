@extends('trangChu.Layout.LayoutClient')
@section('contentClient')
    <div class="slider-with-banner">
        <div class="container">
            <div class="row">
                <!-- Begin Slider Area -->
                <div class="col-lg-12 col-md-12">
                    <div class="slider-area">
                        <div class="slider-active owl-carousel">
                            @foreach ($slide as $item)
                                <div class="single-slide align-center-left  animation-style-01 ">
                                    <img class="slide-img" src="/uploads/slide/{{ $item->Anh }}" alt="">
                                    <div class="slider-progress"></div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
        <section class="product-area li-laptop-product pt-60 pb-45 pt-sm-50 pt-xs-60">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm mới</span>
                            </h2>
                        </div>
                        <div class="row">
                            @foreach ($newProducts as $item)
                                <div style="width: 236px; padding: 15px">
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
                    </div>
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
        <section class="product-area li-laptop-product li-tv-audio-product pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm giảm giá</span>
                            </h2>
                        </div>
                        <div class="row">
                            @foreach ($dicountProducts as $item)
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
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
            </div>
        </section>
        <section class="product-area li-laptop-product li-tv-audio-product pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>Sản phẩm bán chạy</span>
                            </h2>
                        </div>
                        <div class="row">
                            @foreach ($sellingProducts as $item)
                                <div style="width: 236px; padding: 15px">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="/productdetail/{{ $item->id }}">
                                                <img src="/uploads/products/{{ $item->AnhDaiDien }}"
                                                    alt="Li's Product Image">
                                            </a>
                                            <span class="sticker">Giảm {{ $item->PhanTram }}%</span>
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
                    <!-- Li's Section Area End Here -->
                </div>
            </div>
        </section>
    @endif
@endsection
