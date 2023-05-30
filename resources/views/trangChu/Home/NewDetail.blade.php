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
                        <li><a href="{{ route('News') }}">Tin tức</a></li>
                        <li class="active">{{ $new->TieuDe }}</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Li's Main Blog Page Area -->
        <div class="li-main-blog-page li-main-blog-details-page pt-60 pb-60 pb-sm-45 pb-xs-45">
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
                            <div class="col-lg-12">
                                <div class="li-blog-single-item pb-30">
                                    <div class="li-blog-banner">
                                        <a href="blog-details.html"><img class="img-full"
                                                src="images/blog-banner/bg-banner.jpg" alt=""></a>
                                    </div>
                                    <div class="li-blog-content">
                                        <div class="li-blog-details">
                                            <h3 class="li-blog-heading pt-25"><a href="#">{{ $new->TieuDe }}</a></h3>
                                            <div class="li-blog-meta">
                                                <a class="author" href="#"><i class="fa fa-user"></i>Admin</a>
                                                <a class="post-time" href="#"><i
                                                        class="fa fa-calendar"></i>{{ $new->created_at }}</a>
                                            </div>
                                            <p>{{ $new->TomTat }}</p>
                                            <!-- Begin Blog Blockquote Area -->
                                            <div class="li-blog-blockquote">
                                                <blockquote>
                                                    <p>{{ $newdetail->NoiDung }}</p>
                                                </blockquote>
                                            </div>
                                            <!-- Blog Blockquote Area End Here -->

                                            <div class="li-blog-sharing text-center pt-30">
                                                <h4>Chia sẻ bài viết:</h4>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="li-blog-comment-wrapper">
                                    <h3>ĐỂ LẠI CÂU TRẢ LỜI</h3>
                                    <p>Địa chỉ email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu *</p>
                                    <form action="#">
                                        <div class="comment-post-box">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <label>Bình luận</label>
                                                    <textarea name="commnet" placeholder="Viết bình luận"></textarea>
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                    <label>Tên</label>
                                                    <input type="text" class="coment-field" placeholder="Name">
                                                </div>
                                                <div class="col-lg-4 col-md-4 col-sm-4 mt-5 mb-sm-20 mb-xs-20">
                                                    <label>Email</label>
                                                    <input type="text" class="coment-field" placeholder="Email">
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="coment-btn pt-30 pb-sm-30 pb-xs-30 f-left">
                                                        <input class="li-btn-2" type="submit" name="submit"
                                                            value="Đăng bài">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Blog comment Box Area End Here -->
                            </div>
                        </div>
                    </div>
                    <!-- Li's Main Content Area End Here -->
                </div>
            </div>
        </div>
    @endif
@endsection
