@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Chi tiết hóa đơn nhập</h4>
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
                            <p class="mb-0"><strong>Mã hóa đơn nhập:</strong> {{ $invoice->id }}</p>
                            <p class="mb-0"><strong>Ngày nhập:</strong> {{ $invoice->NgayNhap }}</p>
                            <p class="mb-0"><strong>Nhân viên nhập:</strong> {{ $invoice->nhanvien->TenNhanVien }}</p>
                            <p class="mb-0"><strong>Nhà cung cấp:</strong> {{ $invoice->nhacungcap->TenNhaCungCap }}</p>
                        </div>
                        <div class="card-header">Thông số tin chi tiết hóa đơn nhập</div>
                        <div class="card-body">
                            <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá nhập</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($invoice->chitiethoadonnhap as $item)
                                        <tr>
                                            <td>{{ $item->sanpham->TenSanPham }}</td>
                                            <td> {{ $item->SoLuong }}</td>
                                            <td> {{ $item->DonGiaNhap }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                            <a href="{{ route('HoaDonNhap') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end col-12 -->
    @endsection

@endif
