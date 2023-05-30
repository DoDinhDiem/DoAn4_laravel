@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chi tiết đơn hàng</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Thông tin đơn hàng</div>
                    <div class="card-body">
                        <p class="mb-0"><strong>Mã đơn hàng:</strong> {{ $order->id }}</p>
                        <p class="mb-0"><strong>Khách hàng:</strong> {{ $order->khachhang->TenKhachHang }}</p>
                        <p class="mb-0"><strong>Tổng tiền:</strong> {{ number_format($order->TongTien) }}</p>
                    </div>
                    <div class="card-header">Thông tin chi tiết đơn hàng</div>
                    <div class="card-body">
                        <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                    <th>Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->chitietdonhang as $item)
                                    <tr>
                                        <td>{{ $item->sanpham->TenSanPham }}</td>
                                        <td> {{ $item->SoLuong }}</td>
                                        <td> {{ number_format($item->GiaMua) }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                        <a href="{{ route('DonHang') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
