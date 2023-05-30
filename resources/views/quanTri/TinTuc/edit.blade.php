@if (Auth::user()->role ==1)
@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Sửa tin tức</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data" action="{{ route('TinTuc.update', $news->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="position-relative mb-3">
                            <label for="TieuDe">Tiêu đề</label>
                            <input type="text" class="form-control" value="{{ $news->TieuDe }}" name="TieuDe" required>
                        </div>
                        <div class="position-relative mb-3">
                            <label for="TieuDe">Tóm tắt</label>
                            <input type="text" class="form-control" value="{{ $news->TomTat }}" name="TomTat" required>
                        </div>
                        <div class="position-relative mb-3">
                            <label for="AnhDaiDien">Ảnh</label>
                            <input type="file" class="form-control" id="AnhDaiDien" name="file_uploads" >
                            <br>
                            <img src="/uploads/news/{{ $news->Anh }}" style="border-radius: 5px; height: 120px" alt="">
                        </div>
                        <div class="position-relative mb-3">
                            <label for="AnhDaiDien">Nội dung</label>
                            <input type="text" class="form-control" value="{{ $newsdetail->NoiDung }}" name="NoiDung" required>
                        </div>
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