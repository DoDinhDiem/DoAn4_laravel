@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Đơn vị tính</h4>
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
                        <div class="col-sm-4">
                            <a href="{{ route('DonViTinh.create') }}" class="btn btn-primary "><i
                                    class="mdi mdi-plus-circle me-2"></i> Tạo mới</a>
                        </div>
                        <!-- end col-->
                    </div>
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-2">
                                <form method="get" action="{{ route('DonViTinh') }}" id="pageSizeForm">
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
                            </div>
                            <div class="col-md-10" >
                                <div class="row pagination d-flex justify-content-end">
                                    <div class="col-md-4 pagination d-flex justify-content-end">
                                        <label> Tìm kiếm : <input type="search"></label> 
                                    </div>
                                    <div class="col-md-6">
                                        <label> Giá từ : <input type="number"> đến: <input type="number"></label> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <table class="table table-centered w-100 dt-responsive nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th>Mã đơn vị tính</th>
                                    <th>Tên đơn vị tính</th>
                                    <th>Trạng thái</th>
                                    @if (Auth::user()->role == 1)
                                        <th style="width: 95px;">Thao tác</th>
                                    @endif

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($unit as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->TenDonViTinh }}
                                        </td>
                                        <td>
                                            @if ($item->TrangThai == 1)
                                                <span>Hoạt động </span><i style="font-size: 12px; color: #0acf97"
                                                    class="fa-sharp fa-regular fa-circle-check"></i>
                                            @else
                                                <span>Ngừng hoạt động </span><i style="font-size: 12px; color: #fa5c7c"
                                                    class="fa-regular fa-circle-xmark"></i>
                                            @endif
                                        </td>
                                        @if (Auth::user()->role == 1)
                                            <td>
                                                <a href="{{ route('DonViTinh.edit', $item->id) }}" class="action-icon"> <i
                                                        style="font-size: 19px" class="mdi mdi-square-edit-outline"></i></a>
                                                <form method="POST" action="{{ route('DonViTinh.destroy', $item->id) }}"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" style="border: none; background: none"
                                                        title="Delete Student"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->TenDonViTinh }} không')">
                                                        <i style="font-size: 19px; color:#6c757d;"
                                                            class="mdi mdi-delete"></i></button>
                                                </form>

                                            </td>
                                        @endif

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            @if ($unit->count() > 0)
                                <p>Hiển thị từ {{ $pageIndex }} đến {{ $pageSize }} của {{ $total }}</p>
                            @endif
                        </div>
                        <div class="col-lg-4 pagination d-flex justify-content-end">
                            {{ $unit->links() }}
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
