@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Nhân viên</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-2">
                                <a href="{{ route('User.create') }}" class="btn btn-primary "><i
                                        class="mdi mdi-plus-circle me-2"></i> Tạo mới</a>
                            </div>
                            <div class="col-sm-10">
                                <form action="{{ route('User') }}" method="GET">
                                    <div class="row pagination d-flex justify-content-end">
                                        <div class="col-md-3">
                                            <label> Tìm kiếm : <input type="search" width="120px" placeholder="Nhập tên nhân viên..." class="form-control"
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
                            <form method="get" action="{{ route('User') }}" id="pageSizeForm">
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
                            <table class="table table-centered table-bordered w-100 dt-responsive nowrap">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã nhân viên</th>
                                        <th>Ảnh</th>
                                        <th>Họ tên</th>
                                        <th>Ngày sinh</th>
                                        <th>Giới tính</th>
                                        <th>Địa chỉ</th>
                                        <th>Điện thoại</th>
                                        <th>Email</th>
                                        <th>Mật khẩu</th>
                                        <th>Quyền</th>
                                        <th style="width: 110px">Trạng thái</th>
                                        <th style="width: 95px;">Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $item)
                                        <tr>
                                            <td>{{ $item->id }}</td>
                                            <td><img src="/uploads/staff/{{ $item->AnhDaiDien }}" height="100"></td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->NgaySinh }}</td>
                                            <td>
                                                @if ($item->GioiTinh == 0)
                                                    Nam
                                                @elseif ($item->GioiTinh == 1)
                                                    Nữ
                                                @else
                                                    Khác
                                                @endif
                                            </td>
                                            <td>{{ $item->DiaChi }}</td>
                                            <td>{{ $item->DienThoai }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->limited_pass }}</td>
                                            <td>{{ $item->role == 1 ? 'Admin' : 'Nhân viên' }}</td>
                                            <td>
                                                @if ($item->TrangThai == 1)
                                                    <span>Vẫn Làm </span><i style="font-size: 12px; color: #0acf97"
                                                        class="fa-sharp fa-regular fa-circle-check"></i>
                                                @else
                                                    <span>Đã nghỉ </span><i style="font-size: 12px; color: #fa5c7c"
                                                        class="fa-regular fa-circle-xmark"></i>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('User.edit', $item->id) }}" class="action-icon">
                                                    <i style="font-size: 19px" class="mdi mdi-square-edit-outline"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-8">
                                    @if ($staff->count() > 0)
                                        <p>Hiển thị từ {{ $pageIndex }} đến {{ $pageSize }} của
                                            {{ $total }}
                                        </p>
                                    @endif
                                </div>
                                <div class="col-lg-4 pagination d-flex justify-content-end">
                                    {{ $staff->links() }}
                                </div>
                            </div>
                        </div>
                    </div> <!-- end card-body-->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end col-12 -->
    @endsection
@endif