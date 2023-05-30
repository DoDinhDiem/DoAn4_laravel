@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chi tiết sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Thông tin sản phẩm</div>
                    <div class="card-body">
                        <p class="mb-0"><strong>Mã sản phẩm:</strong> {{ $product->id }}</p>
                        <p class="mb-0"><strong>Loại sản phẩm:</strong> {{ $product->loaisp->TenLoai }}</p>
                        <p class="mb-0"><strong>Tên sản phẩm:</strong> {{ $product->TenSanPham }}</p>
                        <p class="mb-0"><strong>Mô tả:</strong></p> {{ $product->MoTaSanPham }}
                        <p class="mb-0"><strong>Ảnh sản phẩm:</strong></p>
                        <img src="/uploads/products/{{ $product->AnhDaiDien }}" style="height: 200px" alt=""> 
                        <p class="mb-0"><strong>Nhà sản xuất:</strong> {{ $product->nhasanxuat->TenNSX }}</p>
                        <p class="mb-0"><strong>Đơn vị tính:</strong> {{ $product->donvitinh->TenDonViTinh }}</p>
                        <p class="mb-0"><strong>Giá bán:</strong> {{ number_format($product->GiaBan) }}</p>
                        <p class="mb-0"><strong>Ngày cập nhật:</strong> {{ $product->created_at->format('d/m/Y H:i:s') }}</p>
                        <p class="mb-0"><strong>Ngày cập nhật:</strong> {{ $product->updated_at->format('d/m/Y H:i:s') }}</p>
                    </div>
                    <div class="card-header">Thông tin ảnh chi tiết</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($product->chitietanh as $item)
                                <div class="col-md-2">
                                    <img src="/uploads/imgdetail/{{ $item->Anh }}" style="height: 200px">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-header">Thông số kỹ thuật</div>
                    <div class="card-body">
                        <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Tên thông số</th>
                                    <th>Mô tả</th>                                   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product->thongsokythuat as $item)
                                    <tr>
                                        <td>{{ $item->TenThongSo }}</td>
                                        <td> {{ $item->MoTa }}</td>    
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                        <a href="{{ route('SanPham') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
