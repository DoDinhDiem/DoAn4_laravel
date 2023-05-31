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
                        <li class="active">
                            @foreach ($categorys as $item)
                                @if ($idcate == $item->id)
                                    {{ $item->TenLoai }}
                                @endif
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Li's Content Wraper Area -->
        <div class="content-wraper pt-60 pb-60 pt-sm-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- Begin Li's Banner Area -->
                        <div class="li-blog-banner">
                            <a href="#">
                                <img class="img-full" style="height: 200px" src="/assets/images/blog-banner/bg-banner.jpg"
                                    alt="Li's Static Banner">
                            </a>
                        </div>
                        <!-- Li's Banner Area End Here -->
                        <!-- shop-top-bar start -->
                        <div class="shop-top-bar mt-30">
                            <!-- product-select-box start -->
                            <div class="product-select-box">
                                <div class="product-short">
                                    <p>Sắp xếp theo:</p>
                                    <select class="nice-select">
                                        <option value="trending">Mức độ liên quan</option>
                                        <option value="sales">Tên (A - Z)</option>
                                        <option value="sales">Tên (Z - A)</option>
                                        <option value="rating">Giá (thấp &gt; cao)</option>
                                        <option value="rating">Giá (cao &gt; thấp)</option>
                                    </select>
                                </div>
                            </div>
                            <!-- product-select-box end -->
                        </div>
                        <!-- shop-top-bar end -->
                        <!-- shop-products-wrapper start -->
                        <div class="shop-products-wrapper">
                            <div class="tab-content">
                                <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                    <div class="product-area shop-product-area">
                                        <div class="row">
                                            @foreach ($categoryproduct as $item)
                                                <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
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
                                                                <div class="product-review">
                                                                    <div class="rating-box">
                                                                        <ul class="rating">
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li><i class="fa fa-star-o"></i></li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                                            </li>
                                                                            <li class="no-star"><i class="fa fa-star-o"></i>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                                <h4><a class="product_name"
                                                                        href="/productdetail/{{ $item->id }}">{{ $item->TenSanPham }}</a>
                                                                </h4>
                                                                <div class="price-box">
                                                                    <span
                                                                        class="new-price">{{ number_format($item->GiaGiam) }}</span>
                                                                    <span
                                                                        class="old-price">{{ number_format($item->GiaBan) }}</span>
                                                                    <span class="discount-percentage"></span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a href="{{ route('addCart', ['id' => $item->id]) }}">Thêm vào
                                                                            giỏ</a></li>
                                                                    <li><a class="links-details" href="wishlist.html"><i
                                                                                class="fa fa-heart-o"></i></a></li>
                                                                    <li><a href="#" title="quick view"
                                                                            class="quick-view-btn" data-toggle="modal"
                                                                            data-target="#exampleModalCenter"><i
                                                                                class="fa fa-eye"></i></a></li>
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

                                <div class="paginatoin-area">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            {{ $categoryproduct->links() }}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrapper end -->
                    </div>
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                            <div class="sidebar-title">
                                <h2>Danh mục</h2>
                            </div>
                            <!-- category-sub-menu start -->
                            <div class="category-sub-menu">
                                <ul>
                                    @foreach ($categorys as $item)
                                        <li style="color: #000"><a href="/categoryproduct/{{ $item->id }}">
                                                {{ $item->TenLoai }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>
                        <!--sidebar-categores-box end  -->
                        <!--sidebar-categores-box start  -->
                        <!--sidebar-categores-box end  -->
                        <!-- category-sub-menu start -->
                        <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                            <div class="sidebar-title">
                                <h2>Hãng</h2>
                            </div>
                            <div class="category-tags">
                                <ul>
                                    @foreach ($producer as $item)
                                        <li><a href="# ">{{ $item->TenNSX }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- category-sub-menu end -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
