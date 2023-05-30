@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Home</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-account-multiple widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Khách hàng">Khách hàng</h5>
                    <h3 class="mt-3 mb-3">{{ $custumer }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-cart-plus widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Đơn hàng">Đơn hàng</h5>
                    <h3 class="mt-3 mb-3">{{ $order }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-currency-usd widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Sản phẩm">Sản phẩm</h5>
                    <h3 class="mt-3 mb-3">{{ $product }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->
        <div class="col-lg-3">
            <div class="card widget-flat">
                <div class="card-body">
                    <div class="float-end">
                        <i class="mdi mdi-pulse widget-icon"></i>
                    </div>
                    <h5 class="text-muted fw-normal mt-0" title="Tin tức">Tin tức</h5>
                    <h3 class="mt-3 mb-3">{{ $news }}</h3>
                </div> <!-- end card-body-->
            </div> <!-- end card-->
        </div> <!-- end col-->

        <!-- end col -->
    </div>
    <!-- end row -->
    @if ($order_list->count() > 0)
    <table class="table table-centered w-100 dt-responsive nowrap">
        <thead class="table-light">
            <tr>
                <th>Mã đơn hàng</th>
                <th>Khách hàng</th>
                <th>Tổng tiền</th>
                <th>Ngày đặt</th>
                <th>Trạng thái đơn hàng</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order_list as $item)
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
                </tr>
            @endforeach
        </tbody>
    </table>
    @endif
@endsection
