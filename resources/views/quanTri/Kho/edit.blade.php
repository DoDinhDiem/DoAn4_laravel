@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa kho</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" method="POST" action="{{ route('Kho.update', $warehouse->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="page-title-box">
                                <h4 class="page-title">Hóa đơn xuất</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenKho">Tên kho</label>
                                <input type="text" class="form-control" value="{{ $warehouse->TenKho }}" name="TenKho"
                                    required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="diachi">Địa chỉ</label>
                                <input type="text" class="form-control" value="{{ $warehouse->DiaChi }}" name="DiaChi"
                                    required>
                            </div>

                            <script>
                                var products = @json($product);
                            </script>
                            <div id="kho-container">
                                @foreach ($warehouse->chitietkho as $item)
                                    <div>
                                        <div>Chi tiết hóa đơn {{ $loop->iteration }}</div>
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
                                            <label for="SoLuong">Số lượng</label>
                                            <input type="number" class="form-control" name="SoLuong[]"
                                                value="{{ $item->SoLuong }}" required>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button id="add-kho" type="button" class="btn btn-primary">Thêm chi tiết</button>
                            <button type="button" class="btn btn-danger remove-Kho">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('Kho') }}" class="btn btn-secondary">Quay lại</a>
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
