@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa đơn vị tính</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('DonViTinh.update', $unit->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Tên đơn vị tính</label>
                                    <input id="TenDonViTinh" type="text" class="form-control"
                                        value="{{ $unit->TenDonViTinh }}" name="TenDonViTinh" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Trạng thái</label>
                                    <select class="form-select" name="TrangThai" required>
                                        <option value='1' {{ $unit->TrangThai == 1 ? 'selected' : '' }}>Hoạt động
                                        </option>
                                        <option value='0' {{ $unit->TrangThai == 0 ? 'selected' : '' }}>Ngừng hoạt động
                                        </option>
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
