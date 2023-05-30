@if (Auth::user()->role == 1)
    @extends('quanTri.Layout.LayoutAdmin')
    @section('contentAdmin')
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Sửa nhà sản xuất</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('NhaSanXuat.update', $producer->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">Tên nhà sản xuất</label>
                                    <input id="TenLoai" type="text" class="form-control" name="TenNSX"
                                        value="{{ $producer->TenNSX }}" required="">
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label class="control-label form-label">MoTa</label>
                                    <input id="MoTa" type="text" class="form-control" name="MoTa"
                                        value="{{ $producer->MoTa }}">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Câp nhập
                                    </button>
                                    <a href="{{ route('NhaSanXuat') }}" class="btn btn-secondary">Quay lại</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection

@endif
