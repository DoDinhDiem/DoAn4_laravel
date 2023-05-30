@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa sản phẩm</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data"
                            action="{{ route('SanPham.update', $products->id) }}">
                            @csrf
                            @method('PUT')
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
                                <input type="text" class="form-control" id="TenSanPham"
                                    value="{{ $products->TenSanPham }}" name="TenSanPham" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MoTaSanPham">Mô tả sản phẩm</label>
                                <input type="longtext" class="form-control" style="min-height: 60px" id="MoTaSanPham"
                                    name="MoTaSanPham" value="{{ $products->MoTaSanPham }}" required></textarea>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="AnhDaiDien">Ảnh đại diện</label>
                                <input type="file" class="form-control" value="{{ $products->AnhDaiDien }}"
                                    name="file_uploads">
                                <br>
                                <img src="/uploads/products/{{ $products->AnhDaiDien }}" style="height: 120px"
                                    alt="">
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
                                <input type="number" class="form-control" id="GiaBan" value="{{ $products->GiaBan }}"
                                    name="GiaBan" min="0" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="chi_tiet_anh">Chi tiết ảnh sản phẩm</label>
                                <input type="file" class="form-control" id="chi_tiet_anh" name="imgdetail[]" multiple
                                    accept="image/*">
                                <br>
                                <div class="row">
                                    @if (isset($oldImages) && is_array($oldImages) && count($oldImages) > 0)
                                        @foreach ($oldImages as $image)
                                            <div class="col-2">
                                                <img src="/uploads/imgdetail/{{ $image }}" style="height: 120px"
                                                    class="img-thumbnail">
                                            </div>
                                        @endforeach
                                    @else
                                    @endif

                                </div>
                            </div>
                            <div id="thongso-container">
                                @foreach ($oldSpecifications as $item)
                                    <div>
                                        <div>Thông số kỹ thuật {{ $loop->iteration }}</div>
                                        <div>
                                            <div class="position-relative mb-3">
                                                <label for="TenThongSo">Tên thông số</label>
                                                <input type="text" class="form-control" id="TenThongSo"
                                                    value="{{ $item->TenThongSo }}" name="TenThongSo[]" required>
                                            </div>
                                            <div class="position-relative mb-3">
                                                <label for="MoTa">Mô tả</label>
                                                <input type="text" class="form-control" id="MoTa"
                                                    value="{{ $item->MoTa }}" name="MoTa[]" required>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button id="add-thongso" type="button" class="btn btn-primary">Thêm thông số</button>
                            <button type="button" class="btn btn-danger remove-thongso">Xóa</button>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Câp nhập
                            </button>
                            <a href="{{ route('SanPham') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endsection
@endif
