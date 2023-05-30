@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm hóa đơn xuất</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('HoaDonXuat.store') }}">
                            @csrf
                            <div class="page-title-box">
                                <h4 class="page-title">Hóa đơn nhập</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenHoaDonXuat">Ngày bán</label>
                                <input type="datetime-local" class="form-control" name="NgayXuat" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="nhanvien">Khách hàng</label>
                                <select name="MaKhachHang" class="form-select">
                                    @foreach ($custumer as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="nhanvien">Nhân viên bán</label>
                                <select name="MaNhanVien" class="form-select">
                                    @foreach ($staff as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <script>
                                var products = @json($product);
                            </script>
                            <div class="page-title-box">
                                <h4 class="page-title">Chi tiết hóa đơn xuất</h4>
                            </div>
                            <div id="hoadonxuat-container">

                            </div>
                            <button id="add-hoadonxuat" type="button" class="btn btn-primary">Thêm chi tiết</button>
                            <button type="button" class="btn btn-danger remove-hoadonxuat">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('HoaDonXuat') }}" class="btn btn-secondary">Quay lại</a>
                                <button style="margin-left: 5px" type="submit" class="btn btn-primary">
                                    Thêm mới
                                </button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection

@endif
