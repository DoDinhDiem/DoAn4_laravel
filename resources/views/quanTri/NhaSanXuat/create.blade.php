@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm nhà sản xuất</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('NhaSanXuat.store') }}">
                            @csrf
                            <div class="position-relative mb-3">
                                <label class="form-label" for="validationTooltip01">Tên nhà sản xuất</label>
                                <input id="TenNSX" type="text" class="form-control " name="TenNSX" required="">
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Mô tả</label>
                                    <input type="text" class="form-control" value="" name="MoTa">
                                </div>
                            </div>
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Thêm mới
                                </button>
                                <a href="{{ route('NhaSanXuat') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection
@endif
