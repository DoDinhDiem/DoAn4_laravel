@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm đơn vị tính</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('DonViTinh.store') }}">
                            @csrf
                            <div class="position-relative mb-3">
                                <label class="form-label" for="validationTooltip01">Tên đơn vị tính</label>
                                <input id="TenDonViTinh" type="text" class="form-control " name="TenDonViTinh"
                                    required="">
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
                                <a href="{{ route('DonViTinh') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection
@endif
