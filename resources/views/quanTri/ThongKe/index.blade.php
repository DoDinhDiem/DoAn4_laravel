@if (Auth::user()->role ==1)
@extends('quanTri.Layout.LayoutAdmin')
@section('contentAdmin')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title">Thống kê báo cáo</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Doanh thu bán hàng</h4>
                <div dir="ltr">
                    <div class="row">
                        <label class="col-lg-6" for="">Từ: </label><input class="form-control" type="date" name="start_date">
                        <label class="col-lg-6" for="">đến</label><input class="form-control" type="date" name="start_date">
                    </div>
                    <br>
                    <div id="basic-area" class="apex-charts" data-colors="#fa6767">
                        <h4>Tiền: </h4>
                    </div>
                </div>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="header-title mb-4">Doanh số nhập hàng</h4>
                <div dir="ltr">
                    <div class="row">
                        <label class="col-lg-6" for="">Từ: </label><input class="form-control" type="date" name="start_date1">
                        <label class="col-lg-6" for="">đến</label><input class="form-control" type="date" name="start_date1">
                    </div>
                    <br>
                    <div id="basic-area" class="apex-charts" data-colors="#fa6767">
                        <h4>Tiền: </h4>
                    </div>
                </div>
            </div>
            <!-- end card body-->
        </div>
        <!-- end card -->
    </div>
</div>
@endif
@endsection