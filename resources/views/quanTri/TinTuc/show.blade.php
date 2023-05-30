@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chi tiết tin tức</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Thông tin tin tức</div>
                    <div class="card-body">
                        <p class="mb-0"><strong>Mã tin tức:</strong> {{ $news->id }}</p>
                        <p class="mb-0"><strong>Nhân viên đăng:</strong> {{ $news->user->name }}</p>
                        <p class="mb-0"><strong>Tiêu đề:</strong> {{ $news->TieuDe }}</p>
                        <p class="mb-0"><strong>Tóm tắt:</strong> {{ $news->TomTat }}</p>
                        <p class="mb-0"><strong>Nội dung:</strong> {{ $newsdetail->NoiDung }}</p>
                    </div>
                    
                    <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                        <a href="{{ route('TinTuc') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
