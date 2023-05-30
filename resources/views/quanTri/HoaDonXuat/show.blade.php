@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Chi tiết hóa đơn xuất</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">Thông tin hóa đơn</div>
                        <div class="card-body">
                            <p class="mb-0"><strong>Mã hóa đơn xuất:</strong> {{ $invoice->id }}</p>
                            <p class="mb-0"><strong>Ngày xuất:</strong> {{ $invoice->NgayXuat }}</p>
                            <p class="mb-0"><strong>Nhân viên bán:</strong> {{ $invoice->nhanvien->name }}</p>
                            <p class="mb-0"><strong>Khách hàng:</strong> {{ $invoice->khachhang->TenKhachHang }}</p>
                            <p class="mb-0"><strong>Địa chỉ nhận:</strong> {{ $invoice->khachhang->DiaChi }}</p>
                            <p class="mb-0"><strong>Số điện thoại:</strong> {{ $invoice->khachhang->SoDienThoai }}</p>

                        </div>
                        <div class="card-header">Thông số tin chi tiết hóa đơn xuất</div>
                        <div class="card-body">
                            <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Giá bán</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->chitiethoadonxuat as $item)
                                        <tr>
                                            <td>{{ $item->sanpham->TenSanPham }}</td>
                                            <td> {{ $item->SoLuong }}</td>
                                            <td> {{ $item->GiaBan }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                            <a href="{{ route('HoaDonXuat') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end col-12 -->
    @endsection
@endif
