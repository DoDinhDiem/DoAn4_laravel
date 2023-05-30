@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa nhà cung cấp</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('NhaCungCap.update', $supplier->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Tên nhà cung cấp</label>
                                    <input id="TenLoai" type="text" class="form-control" name="TenNSX"
                                        value="{{ $supplier->TenNhaCungCap }}" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Địa chỉ</label>
                                    <input id="MoTa" type="text" class="form-control" name="DiaChi"
                                        value="{{ $supplier->DiaChi }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Số điện thoại</label>
                                    <input id="MoTa" type="text" class="form-control" name="SoDienThoai"
                                        value="{{ $supplier->SoDienThoai }}">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Email</label>
                                    <input type="email" class="form-control" name="Email"
                                        value="{{ $supplier->Email }}">
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Câp nhập
                                    </button>
                                    <a href="{{ route('NhaCungCap') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
