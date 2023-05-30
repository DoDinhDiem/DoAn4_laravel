@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Tin tức</h4>
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
                            <a href="{{ route('TinTuc.create') }}" class="btn btn-primary "><i
                                    class="mdi mdi-plus-circle me-2"></i> Tạo mới</a>
                        </div>
                        <!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <form method="get" action="{{ route('TinTuc') }}" id="pageSizeForm">
                            <select class="control-label form-label" name="pageSize" id="pageSize">
                                <option value="5" {{ request()->input('pageSize') == 5 ? 'selected' : '' }}>5</option>
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
                                    <th>Mã tin tức</th>
                                    <th>Nhân viên</th>
                                    <th>Tiêu đề</th>
                                    <th>Tóm tắt</th>
                                    <th style="text-align: center">Ảnh</th>
                                    <th style="width: 120px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($news as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->user->name }}
                                        </td>
                                        <td>
                                            {{ $item->TieuDe }}
                                        </td>
                                        <td>
                                            {{ $item->TomTat }}
                                        </td>

                                        <td style="text-align: center">
                                            <img src="/uploads/news/{{ $item->Anh }}" height="100px">
                                        </td>


                                        <td>
                                            <a href="{{ route('TinTuc.show', $item->id) }}" title="Chi tiết tin tức" class="action-icon"> <i
                                                    class="mdi mdi-eye"></i></a>
                                            @if (Auth::user()->role == 1)
                                                <a href="{{ route('TinTuc.edit', $item->id) }}" class="action-icon"> <i
                                                        style="font-size: 19px" class="mdi mdi-square-edit-outline"></i></a>
                                                <form method="POST" action="{{ route('TinTuc.destroy', $item->id) }}"
                                                    style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" style="border: none; background: none"
                                                        title="Delete Student"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa {{ $item->TenNSX }} không')">
                                                        <i style="font-size: 19px; color:#6c757d;"
                                                            class="mdi mdi-delete"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            @if ($news->count() > 0)
                                <p>Hiển thị từ {{ $pageIndex }} đến {{ $pageSize }} của {{ $total }}</p>
                            @endif
                        </div>
                        <div class="col-lg-4 pagination d-flex justify-content-end">
                            {{ $news->links() }}
                        </div>
                    </div>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col -->
    </div>
@endsection
