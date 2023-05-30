@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa đơn đơn hàng</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('DonHang.update', $order->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Trạng thái đơn hàng</label>
                                    <select class="form-select" name="TrangThaiDonHang" required>
                                        <option value='0' {{ $order->TrangThaiDonHang == 0 ? 'selected' : '' }}>Chưa xác nhận</option>
                                        <option value='1' {{ $order->TrangThaiDonHang == 1 ? 'selected' : '' }}>Đã xác nhận</option>
                                        <option value='2' {{ $order->TrangThaiDonHang == 2 ? 'selected' : '' }}>Đang xử lý</option>
                                        <option value='3' {{ $order->TrangThaiDonHang == 3 ? 'selected' : '' }}>Đã vận chuyển</option>
                                        <option value='4' {{ $order->TrangThaiDonHang == 4 ? 'selected' : '' }}>Đã giao hàng</option>
                                        <option value='5' {{ $order->TrangThaiDonHang == 5 ? 'selected' : '' }}>Hủy hàng</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Câp nhập
                                    </button>
                                    <a href="{{ route('DonViTinh') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
@endif
