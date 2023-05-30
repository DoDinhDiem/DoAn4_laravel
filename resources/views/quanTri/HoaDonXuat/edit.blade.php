@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa hóa đơn xuất</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('HoaDonXuat.update', $invoice->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="page-title-box">
                                <h4 class="page-title">Hóa đơn xuất</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenHoaDonXuat">Ngày bán</label>
                                <input type="datetime-local" class="form-control" value="{{ $invoice->NgayXuat }}"
                                    name="NgayXuat" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="nhanvien">Khách hàng</label>
                                <select name="MaKhachHang" class="form-select">
                                    @foreach ($custumer as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $invoice->MaKhachHang == $key ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="nhanvien">Nhân viên bán</label>
                                <select name="MaNhanVien" class="form-select">
                                    @foreach ($staff as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $invoice->MaNhanVien == $key ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <script>
                                var products = @json($product);
                            </script>
                            <div id="hoadonXuat-container">
                                @foreach ($invoice->chitiethoadonxuat as $item)
                                    <div>
                                        <div>Chi tiết hóa đơn {{ $loop->iteration }}</div>
                                        <div class="position-relative mb-3">
                                            <label for="MaSanPham">Sản phẩm</label>
                                            <select name="MaSanPham[]" class="form-select">
                                                @foreach ($product as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $item->MaSanPham == $key ? 'selected' : '' }}>
                                                        {{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label for="SoLuong">Số lượng</label>
                                            <input type="number" class="form-control" name="SoLuong[]"
                                                value="{{ $item->SoLuong }}" required>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label for="dongianhap">Giá bán</label>
                                            <input type="number" class="form-control" name="GiaBan[]"
                                                value="{{ $item->GiaBan }}" required>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button id="add-hoadonXuat" type="button" class="btn btn-primary">Thêm chi tiết</button>
                            <button type="button" class="btn btn-danger remove-hoadonXuat">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('HoaDonXuat') }}" class="btn btn-secondary">Quay lại</a>
                                <button style="margin-left: 5px" type="submit" class="btn btn-primary">
                                    Cập nhập
                                </button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection

@endif
