@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm kho</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('Kho.store') }}">
                            @csrf
                            <div class="page-title-box">
                                <h4 class="page-title">Kho</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenKho">Tên kho</label>
                                <input type="text" class="form-control" name="TenKho" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="nhanvien">Địa chỉ</label>
                                <input type="text" class="form-control" name="DiaChi" required>
                            </div>
                            <script>
                                var products = @json($product);
                            </script>
                            <div class="page-title-box">
                                <h4 class="page-title">Chi tiết kho</h4>
                            </div>
                            <div id="kho-container">
                            </div>
                            <button id="add-kho" type="button" class="btn btn-primary">Thêm chi tiết</button>
                            <button type="button" class="btn btn-danger remove-kho">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('Kho') }}" class="btn btn-secondary">Quay lại</a>
                                <button style="margin-left: 5px" type="submit" class="btn btn-primary">
                                    Thêm mới
                                </button>
                            </div>
                        </form>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection
@endif
