<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/favicon.png">

    <!-- App css -->
    <link href="/admin/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/admin/css/app.min.css" rel="stylesheet" type="text/css" id="light-style" />
    <link href="/admin/css/app-dark.min.css" rel="stylesheet" type="text/css" id="dark-style" />

</head>

<body class="loading authentication-bg" data-layout-config='{"leftSideBarTheme":"dark","layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false,"darkMode":false, "showRightSidebarOnStart": true}'>

    <div class="account-pages pt-2 pt-sm-5 pb-4 pb-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xxl-10 col-lg-5">
                    <div class="card">
                        <!-- Logo-->
                        <div class="card-header pt-4 pb-4 text-center bg-primary">
                            <a href="index.html">
                                <span><img src="/assets/images/menu/logo/2.jpg" alt="" height="50"></span>
                            </a>
                        </div>

                        <div class="card-body">

                            <div class="text-center w-75 m-auto">
                                <h4 class="text-dark-50 text-center mt-0 fw-bold">Đăng ký miễn phí</h4>
                                <p class="text-muted mb-4">Không có một tài khoản? Tạo tài khoản của bạn, chỉ mất chưa
                                    đầy một phút </p>
                            </div>
                            @if (session('message'))
                                    <div class="alert alert-danger">
                                    {{ session('message') }}
                                    </div>
                                @endif
                            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="HoTen" class="form-label">Họ tên</label>
                                    <input class="form-control" type="text" id="HoTen" name="name" id="fullname"
                                        placeholder="Nhập họ tên của bạn" required>
                                </div>

                                <div class="mb-3">
                                    <label for="NgaySinh" class="form-label">Ngày sinh</label>
                                    <input class="form-control" type="date" id="NgaySinh" name="NgaySinh"
                                        placeholder="Nhập ngày sinh" required>
                                </div>

                                <div class="mb-3">
                                    <label for="GioiTinh" class="form-label">Giới tính</label>
                                    <select class="form-select" id = "GioiTinh" name="GioiTinh" id="event-category" required="">
                                        <option value="0">Nam</option>
                                        <option value="1">Nữ</option>
                                        <option value="2">Khác</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="DiaChi" class="form-label">Địa chỉ</label>
                                    <input class="form-control" type="text" id="DiaChi" name="DiaChi"
                                        placeholder="Nhập địa chỉ" required>
                                </div>

                                <div class="mb-3">
                                    <label for="DienThoai" class="form-label">Số điện thoại</label>
                                    <input class="form-control" type="text" id ="DienThoai" name="DienThoai"
                                        placeholder="Nhập số điện thoại" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input class="form-control" type="email" id = "email" name="email" required
                                        placeholder="Nhập địa chỉ email">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <div class="input-group input-group-merge">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder="Nhập mật khẩu">
                                        <div class="input-group-text" data-password="false">
                                            <span class="password-eye"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="AnhDaiDien">Ảnh đại diện</label>
                                    <input type="file" class="form-control" id="AnhDaiDien" name="file_uploads">
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                        <label class="form-check-label" for="checkbox-signup">Tôi đồng ý <a
                                                href="#" class="text-muted">Các điều khoản và điều kiện</a></label>
                                    </div>
                                </div>

                                <div class="mb-3 text-center">
                                    <input class="btn btn-primary" type="submit" value="Đăng ký">
                                </div>

                            </form>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Đã có tài khoản? <a href="{{ route('login') }}"
                                    class="text-muted ms-1"><b>Đăng nhập</b></a></p>
                        </div> <!-- end col-->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2018 - 2021 © Hyper - Coderthemes.com
    </footer>

    <!-- bundle -->
    <script src="/admin/js/vendor.min.js"></script>
    <script src="/admin/js/app.min.js"></script>

</body>

</html>
