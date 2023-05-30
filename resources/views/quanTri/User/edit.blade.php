
@if (Auth::user()->role ==1)
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
                <form method="POST" enctype="multipart/form-data" action="{{ route('User.update', $staff->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="position-relative mb-3">
                        <label for="name">Họ tên</label>
                        <input type="text" name="name" id="name" value="{{ $staff->name }}" class="form-control" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="NgaySinh">Ngày sinh</label>
                        <input type="date" class="form-control" id="NgaySinh" value="{{ $staff->NgaySinh }}" name="NgaySinh" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="GioiTinh">Giới tính</label>
                        <select class="form-select" name="GioiTinh" id="event-category" required="">
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                            <option value="2">Khác</option>
                        </select>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="AnhDaiDien">Ảnh đại diện</label>
                        <input type="file" class="form-control" id="AnhDaiDien" name="file_uploads" >
                        <br>
                        <img src="/uploads/staff/{{ $staff->AnhDaiDien }}" style="border-radius: 5px; height: 120px" alt="">
                    </div>
                    <div class="position-relative mb-3">
                        <label for="DiaChi">Địa chỉ</label>
                        <input type="text" class="form-control" id="DiaChi" value="{{ $staff->DiaChi }}" name="DiaChi" required>
                    </div>
                   
                    <div class="position-relative mb-3">
                        <label for="DienThoai">Điện thoại</label>
                        <input type="number" class="form-control" id="DienThoai" value="{{ $staff->DienThoai }}" name="DienThoai" min="0" required>
                    </div>
                    <div class="position-relative mb-3">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" value="{{ $staff->password }}" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="control-label form-label">Quyền</label>
                        <select class="form-select" name="role" id="event-category" required="">
                            <option value="0">Nhân viên</option>
                            <option value="1">Admin</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="control-label form-label">Trạng thái</label>
                        <select class="form-select" name="TrangThai" id="event-category" required="">
                            <option value="1">Hoạt động</option>
                            <option value="0">Ngừng hoạt động</option>
                        </select>
                    </div>
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Câp nhập
                            </button>
                            <a href="{{ route('User') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@endif