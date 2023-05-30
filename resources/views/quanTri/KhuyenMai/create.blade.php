@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Thêm khuyến mại</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form class="needs-validation" novalidate method="POST" action="{{ route('KhuyenMai.store') }}">
                            @csrf
                            <div class="page-title-box">
                                <h4 class="page-title">Khuyến mại</h4>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="TenKhuyenMai">Tên khuyến mại</label>
                                <input type="text" class="form-control" id="TenKhuyenMai" name="TenKhuyenMai" required>
                            </div>
                            <div class="position-relative mb-3">
                                <label for="MoTa">Mô tả</label>
                                <input type="text" class="form-control" name="MoTa" required>
                            </div>
                            <script>
                                var products = @json($product);
                            </script>

                            <div id="ChiTiet-container">
                            </div>
                            <button id="add-ChiTiet" type="button" class="btn btn-primary">Thêm chi tiết</button>
                            <button type="button" class="btn btn-danger remove-chiTiet">Xóa</button>


                            <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                                <a href="{{ route('KhuyenMai') }}" class="btn btn-secondary">Quay lại</a>
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
