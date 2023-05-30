@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Sản phẩm</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="{{ route('SanPham.create') }}" class="btn btn-primary "><i
                                    class="mdi mdi-plus-circle me-2"></i> Tạo mới</a>
                        </div>
                        <div class="col-sm-10">
                            <form action="{{ route('SanPham') }}" method="GET">
                                <div class="row pagination d-flex justify-content-end">
                                    <div class="col-md-3">
                                        <label> Tìm kiếm : <input type="search" class="form-control"
                                                name="name"></label>
                                    </div>
                                    <div class="col-md-3">
                                        <label> Giá từ : <input class="form-control" style="width: 100px" type="number"
                                                name="min_price"></label>
                                        <label> đến: <input type="number" style="width: 100px" class="form-control"
                                                name="max_price"></label>
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 20px">
                                        <input class="btn btn-primary" type="submit" value="Tìm kiếm">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    

                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-2">
                                <form method="get" action="{{ route('SanPham') }}" id="pageSizeForm">
                                    <select class="control-label form-label" name="pageSize" id="pageSize">
                                        
                                        <option value="10" {{ request()->input('pageSize') == 10 ? 'selected' : '' }}>10
                                        </option>
                                        <option value="20" {{ request()->input('pageSize') == 20 ? 'selected' : '' }}>20
                                        </option>
                                        <option value="30" {{ request()->input('pageSize') == 30 ? 'selected' : '' }}>30
                                        </option>
                                        <option value="50" {{ request()->input('pageSize') == 50 ? 'selected' : '' }}>5
                                        </option>
                                    </select>
                                </form>
                            </div>
                        </div>
                        <br>
                        <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th style="width: 80px">Mã sản phẩm</th>
                                    <th>Ảnh đại diện</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Mã loại</th>
                                    <th>Nhà sản xuất</th>
                                    <th>Đơn vị tính</th>
                                    <th>Giá bán</th>
                                    <th style="width: 120px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td style="text-align: center"><img src="/uploads/products/{{ $item->AnhDaiDien }}"
                                                height="80"></td>
                                        <td>{{ $item->TenSanPham }}</td>
                                        <td>{{ $item->limited_mota }}</td>
                                        <td>{{ $item->loaisp->TenLoai }}</td>
                                        <td>{{ $item->nhasanxuat->TenNSX }}</td>
                                        <td>{{ $item->donvitinh->TenDonViTinh }}</td>
                                        <td>{{ number_format($item->GiaBan) }}</td>
                                        <td>
                                            <a href="{{ route('SanPham.show', $item->id) }}" class="action-icon"> <i
                                                    class="mdi mdi-eye"></i></a>
                                            @if (Auth::user()->role == 1)
                                                <a href="{{ route('SanPham.edit', $item->id) }}" class="action-icon"> <i
                                                        style="font-size: 19px" class="mdi mdi-square-edit-outline"></i></a>
                                                <form method="POST" action="{{ route('SanPham.destroy', $item->id) }}"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" style="border: none; background: none"
                                                        title="Delete Student"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->TenSanPham }} không')">
                                                        <i style="font-size: 19px; color:#6c757d;"
                                                            class="mdi mdi-delete"></i>
                                                    </button>
                                            @endif

                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row">
                            <div class="col-lg-8">
                                @if ($products->count() > 0)
                                    <p>Hiển thị từ {{ $pageIndex }} đến {{ $pageSize }} của {{ $total }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 pagination d-flex justify-content-end">
                                {{ $products->links() }}
                            </div>
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
