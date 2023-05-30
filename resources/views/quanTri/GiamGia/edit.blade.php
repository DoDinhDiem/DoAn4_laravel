@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa nhà sản xuất</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('GiamGia.update', $discount->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="position-relative mb-3">
                                <label class="form-label" for="validationTooltip01">Sản phẩm</label>
                                <select name="MaSanPham" class="form-select">
                                    @foreach ($product as $key => $value)
                                        <option value="{{ $key }}"
                                            {{ $discount->MaSanPham == $key ? 'selected' : '' }}>{{ $value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Phần trăm</label>
                                    <input type="number" class="form-control" min='0' max='100'
                                        value="{{ $discount->PhanTram }}" name="PhanTram">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Thời gian bắt đầu</label>
                                    <input type="datetime-local" class="form-control"
                                        value="{{ $discount->ThoiGianBatDau }}" name="ThoiGianBatDau">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Thời gian kết thúc</label>
                                    <input type="datetime-local" class="form-control"
                                        value="{{ $discount->ThoiGianKetThuc }}" name="ThoiGianKetThuc">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Trạng thái</label>
                                    <select class="form-select" name="TrangThai" required>
                                        <option value='1' {{ $discount->TrangThai == 1 ? 'selected' : '' }}>Hoạt động
                                        </option>
                                        <option value='0' {{ $discount->TrangThai == 0 ? 'selected' : '' }}>Ngừng hoạt
                                            động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Câp nhập
                                    </button>
                                    <a href="{{ route('GiamGia') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
