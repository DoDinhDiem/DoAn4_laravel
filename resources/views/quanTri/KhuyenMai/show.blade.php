@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chi tiết khuyến mại</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">Thông tin Khuyến mại</div>
                    <div class="card-body">
                        <p class="mb-0"><strong>Mã khuyến mại:</strong> {{ $promotions->id }}</p>
                        <p class="mb-0"><strong>Tên khuyến mại:</strong> {{ $promotions->TenKhuyenMai }}</p>
                        <p class="mb-0"><strong>Mô tả:</strong> {{ $promotions->MoTa }}</p>

                    </div>
                    <div class="card-header">Thông số tin chi tiết khuyến mại</div>
                    <div class="card-body">
                        <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Ngày bắt đầu</th>
                                    <th>Ngày kết thức</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($promotions->chitietkhuyenmai as $item)
                                    <tr>
                                        <td>{{ $item->sanpham->TenSanPham }}</td>
                                        <td> {{ $item->NgayBatDau }}</td>
                                        <td> {{ $item->NgayKetThuc }}</td>
                                        <td>
                                            @if ($item->TrangThai == 1)
                                                <span>Hoạt động </span><i style="font-size: 12px; color: #0acf97"
                                                    class="fa-sharp fa-regular fa-circle-check"></i>
                                            @else
                                                <span>Ngừng hoạt động </span><i style="font-size: 12px; color: #fa5c7c"
                                                    class="fa-regular fa-circle-xmark"></i>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-9 offset-md-3 d-flex justify-content-end">
                        <a href="{{ route('KhuyenMai') }}" class="btn btn-secondary">Quay lại</a>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
