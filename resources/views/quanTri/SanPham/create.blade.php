@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm sản phẩm</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('SanPham.store') }}">
                            @csrf
                            <div class="page-title-box">
                                <h4 class="page-title">Sản phẩm</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MaLoai">Loại sản phẩm</label>
                                <select name="MaLoai" class="form-select">
                                    @foreach ($category as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenSanPham">Tên sản phẩm</label>
                                <input type="text" class="form-control" id="TenSanPham" name="TenSanPham" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MoTaSanPham">Mô tả sản phẩm</label>
                                <input type="text" class="form-control" name="MoTaSanPham" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="AnhDaiDien">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="file_uploads">
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MaNSX">Nhà sản xuất</label>
                                <select name="MaNSX" class="form-select">
                                    @foreach ($producer as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MaDonViTinh">Đơn vị tính</label>
                                <select class="form-select" name="MaDonViTinh">
                                    @foreach ($unit as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="GiaBan">Giá bán</label>
                                <input type="number" class="form-control" id="GiaBan" name="GiaBan" min="0"
                                    required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="chi_tiet_anh">Chi tiết ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="chi_tiet_anh" name="imgdetail[]" multiple
                                    accept="image/*">
                            </div>
                            <div id="thongso-container">
                            </div>
                            <button id="add-thongso" type="button" class="btn btn-primary">Thêm thông số</button>
                            <button type="button" class="btn btn-danger remove-thongso">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('SanPham') }}" class="btn btn-secondary">Quay lại</a>
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
