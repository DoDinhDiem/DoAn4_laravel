@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa khuyến mại</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST"
                            action="{{ route('KhuyenMai.update', $promotions->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="page-title-box">
                                <h4 class="page-title">Khuyến mại</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenKhuyenMai">Tên khuyến mại</label>
                                <input type="text" class="form-control" id="TenKhuyenMai"
                                    value="{{ $promotions->TenKhuyenMai }}" name="TenKhuyenMai" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MoTa">Mô tả</label>
                                <input type="text" class="form-control" name="MoTa" value="{{ $promotions->MoTa }}"
                                    required>
                            </div>
                            <script>
                                var products = @json($product);
                            </script>
                            <div id="ChiTiet-container">
                                @foreach ($promotions->chitietkhuyenmai as $item)
                                    <div>
                                        <div>Chi tiết khuyến mại {{ $loop->iteration }}</div>
                                        <div class="position-relative mb-3">
                                            <label for="MaSanPham">Sản phẩm</label>
                                            <select name="MaSanPham[]" class="form-select">
                                                @foreach ($product as $key => $value)
                                                    <option value="{{ $key }}"
                                                        {{ $item->MaSanPham == $key ? 'selected' : '' }}>{{ $value }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label for="NgayBatDau">Ngày bắt đầu</label>
                                            <input type="datetime-local" class="form-control" id="NgayBatDau"
                                                name="NgayBatDau[]" value="{{ $item->NgayBatDau }}" required>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label for="NgayKetThuc">Ngày kết thúc</label>
                                            <input type="datetime-local" class="form-control" id="NgayKetThuc"
                                                name="NgayKetThuc[]" value="{{ $item->NgayKetThuc }}" required>
                                        </div>
                                        <div class="position-relative mb-3">
                                            <label class="control-label form-label">Trạng thái</label>
                                            <select class="form-select" name="TrangThai[]" id="TrangThai" required="">
                                                <option value="1" {{ $item->TrangThai == 1 ? 'selected' : '' }}>Kích
                                                    hoạt
                                                </option>
                                                <option value="0" {{ $item->TrangThai == 0 ? 'selected' : '' }}>Dừng
                                                    kích
                                                    hoạt
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button id="add-ChiTiet" type="button" class="btn btn-primary">Thêm chi tiết</button>
                            <button type="button" class="btn btn-danger remove-chiTiet">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('KhuyenMai') }}" class="btn btn-secondary">Quay lại</a>
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
