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
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Tin tức</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Li's Main Blog Page Area -->
        <div class="li-main-blog-page pt-60 pb-55">
            <div class="container">
                <div class="row">
                    <!-- Begin Li's Blog Sidebar Area -->
                    <div class="col-lg-3 order-lg-1 order-2">
                        <div class="li-blog-sidebar-wrapper">
                            <div class="li-blog-sidebar pt-25">
                                <h4 class="li-blog-sidebar-title">Danh mục sản phẩm</h4>
                                <ul class="li-blog-archive">
                                    @foreach ($categorys as $item)
                                        <li style="color: #000"><a href="/categoryproduct/{{ $item->id }}">
                                                {{ $item->TenLoai }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Li's Blog Sidebar Area End Here -->
                    <!-- Begin Li's Main Content Area -->
                    <div class="col-lg-9 order-lg-2 order-1">
                        <div class="row li-main-content">
                            @foreach ($new as $item)
                            <div class="col-lg-6 col-md-6">
                                <div class="li-blog-single-item pb-25">
                                    <div class="li-blog-banner">
                                        <a href="blog-details-left-sidebar.html">
                                            <img class="img-full" style="height: 238.38px" src="/uploads/news/{{ $item->Anh }}" alt=""></a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a href="{{ route('NewDetail', $item->id) }}">{{ $item->TieuDe }}</a></h3>
                                            <div class="li-blog-meta">
                                                <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                <a class="post-time" href="#"><i class="fa fa-calendar"></i> {{ $item->created_at }}</a>
                                            </div>
                                            <p>{{ $item->TomTat }}</p>
                                            <a class="read-more" href="{{ route('NewDetail', $item->id) }}">Xem thêm...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            
                            <!-- Li's Pagination End Here Area -->
                        </div>
                        <div class="col-lg-4 pagination d-flex justify-content-end">
                            {{ $new->links() }}
                        </div>
                    </div>
                    <!-- Li's Main Content Area End Here -->
                </div>
            </div>
        </div>
    @endif
   
@endsection
