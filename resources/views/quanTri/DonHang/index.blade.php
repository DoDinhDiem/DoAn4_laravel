@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Đơn hàng</h4>
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
                            
                        </div>
                        <div class="col-sm-10">
                            <form action="{{ route('DonHang') }}" method="GET">
                                <div class="row d-flex justify-content-end">
                                    <div class="col-sm-2">
                                        <label>Từ ngày : <input class="form-control" type="date" name="min_date"></label>
                                    </div>
                                    <div class="col-sm-2">
                                        <label> đến: <input type="date" class="form-control" name="max_date"></label>
                                    </div>
                                    <div class="col-sm-2" style="margin-top: 20px">
                                        <input class="btn btn-primary" type="submit" value="Tìm kiếm">
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                    <!-- end col-->

                    <div class="table-responsive">
                        <form method="get" action="{{ route('DonHang') }}" id="pageSizeForm">
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
                                    <th>Mã đơn hàng</th>
                                    <th>Khách hàng</th>
                                    <th>Tổng tiền</th>
                                    <th>Ngày đặt</th>
                                    <th>Trạng thái đơn hàng</th>
                                    <th style="width: 120px;">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>
                                            {{ $item->id }}
                                        </td>
                                        <td>
                                            {{ $item->khachhang->TenKhachHang }}
                                        </td>
                                        <td>
                                            {{ number_format($item->TongTien) }}
                                        </td>
                                        <td>
                                            {{ $item->NgayDat }}
                                        </td>
                                        <td>
                                            @if ($item->TrangThaiDonHang == 0)
                                                <span>Chưa xác nhận </span>
                                            @elseif($item->TrangThaiDonHang == 1)
                                                <span>Đã xác nhận</span>
                                            @elseif($item->TrangThaiDonHang == 2)
                                                <span>Đang xử lý</span>
                                            @elseif($item->TrangThaiDonHang == 3)
                                                <span>Đã vận chuyển</span>
                                            @elseif($item->TrangThaiDonHang == 4)
                                                <span>Đã giao hàng</span>
                                            @else
                                                <span>Hủy hàng</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('DonHang.show', $item->id) }}" class="action-icon"> <i
                                                    class="mdi mdi-eye"></i></a>
                                            @if (Auth::user()->role == 1)
                                                <a href="{{ route('DonHang.edit', $item->id) }}" class="action-icon"> <i
                                                        style="font-size: 19px" class="mdi mdi-square-edit-outline"></i></a>
                                            @endif
                                            <form method="POST" action="{{ route('DonHang.postprint', $item->id) }}"
                                                style="display:inline">
                                                @csrf
                                                <button type="submit" style="border: none; background: none"
                                                    onclick="return confirm('Bạn có chắc chắn muốn xuất đơn hàng này không')"
                                                    class="action-icon"> <i style="font-size: 19px; color:#6c757d;"
                                                        class="uil-clipboard-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            @if ($order->count() > 0)
                                <p>Hiển thị từ {{ $pageIndex }} đến {{ $pageSize }} của {{ $total }}</p>
                            @endif
                        </div>
                        <div class="col-lg-4 pagination d-flex justify-content-end">
                            {{ $order->links() }}
                        </div>
                    </div>
                </div>

            </div>
             <!-- end card-body-->
        </div> <!-- end card-->
    </div> <!-- end col -->
    </div>
    <!-- end col-12 -->
@endsection
