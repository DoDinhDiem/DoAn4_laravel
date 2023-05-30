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
                        <li class="active">Thanh toán</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Checkout Area Strat-->
        <div class="checkout-area pt-60 pb-30">
            <div class="container">
                <form action="{{ route('CheckOut.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="checkbox-form">
                                <h3>Thông tin khách hàng</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <div class="checkout-form-list">
                                                <label>Tên khách hàng <span class="required">*</span></label>
                                                <input placeholder="Nhập tên khách hàng" name="TenKhachHang" required=""
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <div class="checkout-form-list">
                                                <label>Địa chỉ giao hàng <span class="required">*</span></label>
                                                <input placeholder="Nhập địa chỉ giao hàng" name="DiaChi" required=""
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <div class="checkout-form-list">
                                                <label>Email <span class="required">*</span></label>
                                                <input placeholder="Nhập email" name="Email" required=""
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="country-select clearfix">
                                            <div class="checkout-form-list">
                                                <label>Số điện thoại <span class="required">*</span></label>
                                                <input placeholder="Nhập số điện thoại" name="SoDienThoai" required=""
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Đơn hàng của bạn</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="cart-product-quantity">Số lượng</th>
                                                <th class="cart-product-total">Giá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart->items as $item)
                                                <tr class="cart_item">
                                                    <td class="cart-product-name">{{ $item['TenSanPham'] }}</td>
                                                    <td class="product-quantity">{{ $item['quantity'] }}</td>
                                                    <td class="cart-product-total">
                                                        <span class="amount"
                                                            style="color: #e84d1c;">{{ number_format(floatval($cart->get_price_of_item($item['id'])), 0, ',', '.') . ' VNĐ' }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Tạm tính</th>
                                                <td></td>
                                                <td><span class="amount"
                                                        style="color: #e84d1c;">{{ number_format(floatval($cart->total_price), 0, ',', '.') . ' VNĐ' }}</span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng tiền</th>
                                                <td></td>
                                                <td><strong><span class="amount"
                                                            style="color: #e84d1c;">{{ number_format(floatval($cart->total_price), 0, ',', '.') . ' VNĐ' }}</span></strong>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div class="order-button-payment">
                                            <input value="Đặt hàng" type="submit">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @endif
@endsection
