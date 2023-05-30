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
                        <li class="active">Shopping Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Li's Breadcrumb Area End Here -->
        <!--Shopping Cart Area Strat-->
        <div class="Shopping-cart-area pt-60 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div>
                            <div class="table-content table-responsive">
                                @if (count($cart->items) == 0)
                                    <p>Không có sản phẩm trong giỏ hàng</p>
                                @else
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>STT</th>

                                                <th class="li-product-thumbnail">Ảnh</th>
                                                <th class="cart-product-name">Sản phẩm</th>
                                                <th class="li-product-price">Đơn giá</th>
                                                <th class="li-product-quantity">Số lượng</th>
                                                <th class="li-product-subtotal">Tổng</th>
                                                <th class="li-product-remove">Xoá</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cart->items as $item)
                                                <tr>
                                                    <th>{{ $index++ }}</th>
                                                    <td class="li-product-thumbnail"><a href="#"><img
                                                                style="height: 100px"
                                                                src="/uploads/products/{{ $item['AnhDaiDien'] }}"
                                                                alt="Li's Product Image"></a></td>
                                                    <td class="li-product-name"><a
                                                            href="#">{{ $item['TenSanPham'] }}</a></td>
                                                    <td class="product-subtotal"><span class="amount"
                                                            style="color: #e84d1c;">{{ number_format(floatval($item['GiaBan']), 0, ',', '.') . ' VNĐ' }}</span>
                                                    </td>
                                                    <form action="{{ route('updateCart', ['id' => $item['id']]) }} "
                                                        id="my-form" method="post">
                                                        @csrf
                                                        <td class="quantity">
                                                            <div class="cart-plus-minus">
                                                                <input class="cart-plus-minus-box" type="number"
                                                                    readonly="False" name="quantity"
                                                                    value="{{ $item['quantity'] }}">
                                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                                </div>
                                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                                                </div>

                                                            </div>
                                                            <input type="submit"
                                                                style="margin-top: 5px; height: 30px; line-height: 3px; font-size: 13px; text-align: center"
                                                                class="btn btn-dark" value="Cập nhập">
                                                        </td>
                                                        <td class="product-subtotal">
                                                            <span class="amount"
                                                                style="color: #e84d1c;">{{ number_format(floatval($cart->get_price_of_item($item['id'])), 0, ',', '.') . ' VNĐ' }}</span>
                                                        </td>
                                                    </form>
                                                    <td class="li-product-remove"><a
                                                            href="{{ route('removeCart', ['id' => $item['id']]) }}"><i
                                                                class="fa fa-times"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="4" rowspan="1"></td>
                                                <td colspan="2">
                                                    <input type="text"
                                                        style="background-color: transparent ;border: 1px solid #ddd; border-radius: 5px"
                                                        value="" placeholder="Mã giảm giá">
                                                </td>
                                                <td colspan="3">
                                                    <input class="button"
                                                        style="background-color: #333; font-weight: 500; color: white; border-radius: 5px"
                                                        value="Áp dụng" type="submit">
                                                </td>
                                            </tr>
                                            <tr class="cart-page-total">
                                                <td colspan="4">
                                                    <h5>Tổng cộng(bao gồm thuế)</h5>
                                                </td>
                                                <td colspan="3" class="product-subtotal"><span class="amount"
                                                        style="font-weight: bold; color: #e84d1c; font-size: 20px;">{{ number_format(floatval($cart->total_price), 0, ',', '.') . ' VNĐ' }}</span>
                                                </td>

                                            </tr>
                                        </tfoot>
                                    </table>
                                @endif

                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="coupon-all">
                                        <div class="coupon">
                                            <input style="border-radius: 5px" class="button" value="Tiếp tục mua sắm"
                                                type="submit">
                                        </div>
                                        <div class="coupon2">
                                            <a href="{{ route('CheckOut') }}">
                                                <input style="border-radius: 5px" class="button" name="update_cart"
                                                    value="Thanh toán" type="submit"></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`
    @endif

@endsection
