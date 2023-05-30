@if (Auth::user()->role ==1)
@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Sửa khách hàng</h4>
        </div>
    </div>
</div> 
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="needs-validation" novalidate method="POST" action="{{ route('KhachHang.update', $custumer->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="position-relative mb-3">
                        <label class="form-label" for="validationTooltip01">Tên khách hàng</label>
                        <input type="text" class="form-control" value="{{ $custumer->TenKhachHang }}" name="TenKhachHang">    
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="control-label form-label">Địa chỉ</label>
                            <input type="text" class="form-control" value="{{ $custumer->DiaChi }}" name="DiaChi">                   
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="control-label form-label">Số điện thoại</label>
                            <input type="number" class="form-control" value="{{ $custumer->SoDienThoai }}" name="SoDienThoai">                   
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="control-label form-label">Email</label>
                            <input type="email" class="form-control" value="{{ $custumer->Email }}" name="Email">                   
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Cập nhập
                        </button>
                        <a href="{{ route('KhachHang') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
@endsection
@endif