//Thêm thông số kỹ thuật
$(document).ready(function() {
    // Thêm thông số kỹ thuật
    $('#add-thongso').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#thongso-container').children().length;
        // Tạo div chứa thông số kỹ thuật mới
        var newThongSo = '<div>' +
            '<div>Thông số kỹ thuật ' + (currentCount + 1) + '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="TenThongSo">Tên thông số</label>' +
            '<input type="text" class="form-control" id="TenThongSo" name="TenThongSo[]" required>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MoTa">Mô tả</label>' +
            '<input type="text" class="form-control" id="MoTa" name="MoTa[]" required>' +
            '</div>' +
            '</div>';
        // Thêm thông số kỹ thuật mới vào cuối container
        $('#thongso-container').append(newThongSo);
    });
    // Xóa thông số kỹ thuật
    $('.remove-thongso').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#thongso-container').children().length;
        // Không cho phép xóa thông số kỹ thuật nếu chỉ còn 1
        if (currentCount = 0) {
            return;
        }
        // Xóa thông số kỹ thuật cuối cùng
        $('#thongso-container').children().last().remove();
    });



});

//Thêm chi tiết khuyến mại
$(document).ready(function() {
    $('#add-ChiTiet').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#ChiTiet-container').children().length;
        // Tạo div chứa thông số kỹ thuật mới
        var newChiTiet = '<div>' +
            '<div>Chi tiết khuyến mại ' + (currentCount + 1) + '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MaSanPham">Sản phẩm</label>' +
            '<select name="MaSanPham[]" class="form-select">' +
            generateOptions() +
            '</select>' +
            '<div class="position-relative mb-3">' +
            '<label for="TenChiTiet">Ngày bắt đầu</label>' +
            '<input type="datetime-local" class="form-control" id="TenChiTiet" name="NgayBatDau[]" required>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MoTa">Ngày kết thúc</label>' +
            '<input type="datetime-local" class="form-control" id="MoTa" name="NgayKetThuc[]" required>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label class="control-label form-label">Trạng thái</label>' +
            '<select class="form-select" name="TrangThai[]" id="event-category" required="">' +
            '<option value="1">Kích hoạt</option>' +
            '<option value="0">Dừng kích hoạt</option>' +
            '</select>' +
            '</div>' +
            '</div>';
        // Thêm thông số kỹ thuật mới vào cuối container
        $('#ChiTiet-container').append(newChiTiet);
    });
    // Xóa thông số kỹ thuật
    $('.remove-chiTiet').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#ChiTiet-container').children().length;
        // Không cho phép xóa thông số kỹ thuật nếu chỉ còn 1
        if (currentCount = 0) {
            return;
        }
        // Xóa thông số kỹ thuật cuối cùng
        $('#ChiTiet-container').children().last().remove();
    });

    // Hàm sinh danh sách lựa chọn
    function generateOptions() {
        var options = '';
        for (var key in products) {
            if (products.hasOwnProperty(key)) {
                options += '<option value="' + key + '">' + products[key] + '</option>';
            }
        }
        return options;
    }

});

//Thêm chi tiết hóa đơn nhập
$(document).ready(function() {
    $('#add-hoadonnhap').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#hoadonnhap-container').children().length;
        // Tạo div chứa thông số kỹ thuật mới
        var newhoadonnhap = '<div>' +
            '<div>Chi tiết hóa đơn ' + (currentCount + 1) + '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MaSanPham">Sản phẩm</label>' +
            '<select name="MaSanPham[]" class="form-select">' +
            generateOptions() +
            '</select>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="SoLuong">Số lượng</label>' +
            '<input type="number" class="form-control" name="SoLuong[]" required>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MoTa">Đơn giá nhập</label>' +
            '<input type="number" class="form-control" id="MoTa" name="DonGiaNhap[]" required>' +
            '</div>' +
            '</div>';
        // Thêm thông số kỹ thuật mới vào cuối container
        $('#hoadonnhap-container').append(newhoadonnhap);
    });
    // Xóa thông số kỹ thuật
    $('.remove-hoadonnhap').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#hoadonnhap-container').children().length;
        // Không cho phép xóa thông số kỹ thuật nếu chỉ còn 1
        if (currentCount = 0) {
            return;
        }
        // Xóa thông số kỹ thuật cuối cùng
        $('#hoadonnhap-container').children().last().remove();
    });

    // Hàm sinh danh sách lựa chọn
    function generateOptions() {
        var options = '';
        for (var key in products) {
            if (products.hasOwnProperty(key)) {
                options += '<option value="' + key + '">' + products[key] + '</option>';
            }
        }
        return options;
    }

});

//Thêm chi tiết hóa đơn xuất
$(document).ready(function() {
    $('#add-hoadonxuat').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#hoadonxuat-container').children().length;
        // Tạo div chứa thông số kỹ thuật mới
        var newhoadonxuat = '<div>' +
            '<div>Chi tiết hóa đơn ' + (currentCount + 1) + '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MaSanPham">Sản phẩm</label>' +
            '<select name="MaSanPham[]" class="form-select">' +
            generateOptions() +
            '</select>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="SoLuong">Số lượng</label>' +
            '<input type="number" class="form-control" name="SoLuong[]" required>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MoTa">Giá bán</label>' +
            '<input type="number" class="form-control" id="MoTa" name="GiaBan[]" required>' +
            '</div>' +
            '</div>';
        // Thêm thông số kỹ thuật mới vào cuối container
        $('#hoadonxuat-container').append(newhoadonxuat);
    });
    // Xóa thông số kỹ thuật
    $('.remove-hoadonxuat').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#hoadonxuat-container').children().length;
        // Không cho phép xóa thông số kỹ thuật nếu chỉ còn 1
        if (currentCount = 0) {
            return;
        }
        // Xóa thông số kỹ thuật cuối cùng
        $('#hoadonxuat-container').children().last().remove();
    });

    // Hàm sinh danh sách lựa chọn
    function generateOptions() {
        var options = '';
        for (var key in products) {
            if (products.hasOwnProperty(key)) {
                options += '<option value="' + key + '">' + products[key] + '</option>';
            }
        }
        return options;
    }

});

//Thêm chi tiết kho
$(document).ready(function() {
    $('#add-kho').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#kho-container').children().length;
        // Tạo div chứa thông số kỹ thuật mới
        var newkho = '<div>' +
            '<div>Chi tiết kho ' + (currentCount + 1) + '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="MaSanPham">Sản phẩm</label>' +
            '<select name="MaSanPham[]" class="form-select">' +
            generateOptions() +
            '</select>' +
            '</div>' +
            '<div class="position-relative mb-3">' +
            '<label for="SoLuong">Số lượng</label>' +
            '<input type="number" class="form-control" name="SoLuong[]" required>' +
            '</div>' +
            '</div>';
        // Thêm thông số kỹ thuật mới vào cuối container
        $('#kho-container').append(newkho);
    });
    // Xóa thông số kỹ thuật
    $('.remove-kho').click(function() {
        // Lấy số lượng thông số kỹ thuật hiện tại
        var currentCount = $('#kho-container').children().length;
        // Không cho phép xóa thông số kỹ thuật nếu chỉ còn 1
        if (currentCount = 0) {
            return;
        }
        // Xóa thông số kỹ thuật cuối cùng
        $('#kho-container').children().last().remove();
    });

    // Hàm sinh danh sách lựa chọn
    function generateOptions() {
        var options = '';
        for (var key in products) {
            if (products.hasOwnProperty(key)) {
                options += '<option value="' + key + '">' + products[key] + '</option>';
            }
        }
        return options;
    }

});