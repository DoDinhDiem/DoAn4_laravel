@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm giảm giá</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('GiamGia.store') }}">
                            @csrf
                            <div class="position-relative mb-3">
                                <label class="form-label" for="validationTooltip01">Sản phẩm</label>
                                <select name="MaSanPham" class="form-select">
                                    @foreach ($product as $key => $value)
                                        <option value="{{ $key }}">{{ $value }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Phần trăm</label>
                                    <input type="text" class="form-control " name="PhanTram">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Thời gian bắt đầu</label>
                                    <input type="datetime-local" class="form-control " name="ThoiGianBatDau">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Thời gian kết thúc</label>
                                    <input type="datetime-local" class="form-control " name="ThoiGianKetThuc">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Trạng thái</label>
                                    <select class="form-select" name="TrangThai" id="event-category" required="">
                                        <option value="1">Hoạt động</option>
                                        <option value="0">Ngừng hoạt động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm mới
                                </button>
                                <a href="{{ route('GiamGia') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection
@endif
