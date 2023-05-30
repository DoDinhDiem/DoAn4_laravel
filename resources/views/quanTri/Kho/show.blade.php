@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chi tiết kho</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Thông tin kho</div>
                    <div class="card-body">
                        <p class="mb-0"><strong>Mã kho:</strong> {{ $warehouse->id }}</p>
                        <p class="mb-0"><strong>Tên kho:</strong> {{ $warehouse->TenKho }}</p>
                        <p class="mb-0"><strong>Địa chỉ:</strong> {{ $warehouse->DiaChi }}</p>
                    </div>
                    <div class="card-header">Thông số tin chi tiết kho</div>
                    <div class="card-body">
                        <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Số lượng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($warehouse->chitietkho as $item)
                                    <tr>
                                        <td>{{ $item->sanpham->TenSanPham }}</td>
                                        <td> {{ $item->SoLuong }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                        <a href="{{ route('Kho') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
