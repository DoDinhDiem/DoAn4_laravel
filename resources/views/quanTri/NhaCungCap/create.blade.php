@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm nhà cung cấp</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('NhaCungCap.store') }}">
                            @csrf
                            <div class="position-relative mb-3">
                                <label class="form-label" for="validationTooltip01">Tên nhà cung cấp</label>
                                <input id="TenNSX" type="text" class="form-control " name="TenNhaCungCap"
                                    required="">
                            </div>
                            <div class="position-relative mb-3">
                                <div class="mb-3">
                                    <label class="control-label form-label">Địa chỉ</label>
                                    <input id="MoTa" type="text" class="form-control " name="DiaChi">
                                </div>
                            </div>
                            <div class="position-relative mb-3">
                                <div class="mb-3">
                                    <label class="control-label form-label">Số điện thoại</label>
                                    <input id="MoTa" type="text" class="form-control " name="SoDienThoai">
                                </div>
                            </div>
                            <div class="position-relative mb-3">
                                <div class="mb-3">
                                    <label class="control-label form-label">Email</label>
                                    <input type="email" class="form-control " name="Email">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm mới
                                </button>
                                <a href="{{ route('NhaCungCap') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection
@endif
