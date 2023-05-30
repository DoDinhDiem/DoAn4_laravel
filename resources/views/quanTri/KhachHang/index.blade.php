@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Khách hàng</h4>
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
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <a href="{{ route('KhachHang.create') }}" class="btn btn-primary "><i
                                        class="mdi mdi-plus-circle me-2"></i> Tạo mới</a>
                            </div>
                            <div class="col-sm-10">
                                <form action="{{ route('KhachHang') }}" method="GET">
                                    <div class="row pagination d-flex justify-content-end">
                                        <div class="col-md-3">
                                            <label> Tìm kiếm : <input type="search" width="120px" placeholder="Nhập tên khách hàng..." class="form-control"
                                                    name="name"></label>
                                        </div>
                                        <div class="col-sm-2" style="margin-top: 20px">
                                            <input class="btn btn-primary" type="submit" value="Tìm kiếm">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- end col-->
                        </div>

                        <div class="table-responsive">
                            <form method="get" action="{{ route('KhachHang') }}" id="pageSizeForm">
                                <select class="control-label form-label" name="pageSize" id="pageSize">
                                    <option value="5" {{ request()->input('pageSize') == 5 ? 'selected' : '' }}>5
                                    </option>
                                    <option value="10" {{ request()->input('pageSize') == 10 ? 'selected' : '' }}>10
                                    </option>
                                    <option value="20" {{ request()->input('pageSize') == 20 ? 'selected' : '' }}>20
                                    </option>
                                    <option value="30" {{ request()->input('pageSize') == 30 ? 'selected' : '' }}>30
                                    </option>
                                </select>
                            </form>
                            <table class="table table-centered w-100 dt-responsive nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã khách hàng</th>
                                        <th>Tên khách hàng</th>
                                        <th>Địa chỉ</th>
                                        <th>Số điện thoại</th>
                                        <th>Email</th>
                                        <th style="width: 95px;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($custumer as $item)
                                        <tr>
                                            <td>
                                                {{ $item->id }}
                                            </td>
                                            <td>
                                                {{ $item->TenKhachHang }}
                                            </td>
                                            <td>
                                                {{ $item->DiaChi }}
                                            </td>
                                            <td>
                                                {{ $item->SoDienThoai }}
                                            </td>
                                            <td>
                                                {{ $item->Email }}
                                            </td>
                                            <td>
                                                <a href="{{ route('KhachHang.edit', $item->id) }}" class="action-icon"> <i
                                                        style="font-size: 19px" class="mdi mdi-square-edit-outline"></i></a>
                                                <form method="POST" action="{{ route('KhachHang.destroy', $item->id) }}"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" style="border: none; background: none"
                                                        title="Delete Student"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->TenNSX }} không')">
                                                        <i style="font-size: 19px; color:#6c757d;"
                                                            class="mdi mdi-delete"></i></button>
                                                </form>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                @if ($custumer->count() > 0)
                                    <p>Hiển thị từ {{ $pageIndex }} đến {{ $pageSize }} của {{ $total }}
                                    </p>
                                @endif
                            </div>
                            <div class="col-lg-4 pagination d-flex justify-content-end">
                                {{ $custumer->links() }}
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
    @endsection
@endif
