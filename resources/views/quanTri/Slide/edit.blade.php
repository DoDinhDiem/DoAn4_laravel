@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa ảnh slide</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('Slide.update', $slide->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="position-relative mb-3">
                                <label for="Anh">Ảnh slide</label>
                                <input type="file" class="form-control" id="Anh" name="file_uploads" required>
                                <br>
                                <img src="/uploads/slide/{{ $slide->Anh }}" style="border-radius: 5px; height: 120px"
                                    alt="">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Câp nhập
                                    </button>
                                    <a href="{{ route('Slide') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@endif
