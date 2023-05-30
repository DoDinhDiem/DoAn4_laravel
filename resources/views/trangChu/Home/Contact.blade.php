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
                        <li><a href="{{ route('home') }}">Trang chủ</a></li>
                        <li class="active">Liên hệ</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!-- Begin Contact Main Page Area -->
        <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
            <div class="container mb-60">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7453.000936244258!2d106.30844145869138!3d20.932407804980905!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31359b125ee04d43%3A0xc7e448f3048eff7d!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBTxrAgUGjhuqFtIEvhu7kgVGh14bqtdCBIxrBuZyBZw6puIGPGoSBz4bufIEjhuqNpIETGsMahbmc!5e0!3m2!1svi!2s!4v1685290489754!5m2!1svi!2s"
                    width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                        <div class="contact-page-side-content">
                            <h3 class="contact-page-title">Liên hệ chúng tôi</h3>
                            <p class="contact-page-message mb-25">Sự rõ ràng cũng là một quá trình năng động tuân theo thói
                                quen thay đổi của độc giả. Thật đáng ngạc nhiên khi lưu ý rằng văn học Gothic, thứ mà ngày
                                nay chúng ta cho là ít rõ ràng, lại có trước các loại hình văn học của con người.</p>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-fax"></i> Địa chỉ</h4>
                                <p>68 Đỗ Ngọc Du, P. Thanh Trung, Thành phố Hải Dương, Hải Dương, Việt Nam</p>
                            </div>
                            <div class="single-contact-block">
                                <h4><i class="fa fa-phone"></i> Phone</h4>
                                <p>Phone: (+84) 320.3894.540</p>
                                <p>Hotline: 1009 678 456</p>
                            </div>
                            <div class="single-contact-block last-child">
                                <h4><i class="fa fa-envelope-o"></i> Email</h4>
                                <p>daotao@utehy.edu.vn</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                        <div class="contact-form-content pt-sm-55 pt-xs-55">
                            <h3 class="contact-page-title">Cho chúng tôi biết tin nhắn của bạn</h3>
                            <div class="contact-form">
                                <form id="contact-form" action="http://demo.hasthemes.com/limupa-v3/limupa/mail.php"
                                    method="post">
                                    <div class="form-group">
                                        <label>Tên của bạn <span class="required">*</span></label>
                                        <input type="text" name="customerName" id="customername" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Email của bạn <span class="required">*</span></label>
                                        <input type="email" name="customerEmail" id="customerEmail" required>
                                    </div>
                                    <div class="form-group mb-30">
                                        <label>Tin nhắn của bạn</label>
                                        <textarea name="contactMessage" id="contactMessage"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" value="submit" id="submit" class="li-btn-3"
                                            name="submit">Gửi</button>
                                    </div>
                                </form>
                            </div>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
