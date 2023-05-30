<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonXuatModels extends Model
{
    use HasFactory;
    protected $table = 'hoadonxuat';
    protected $fillable = [
        'NgayXuat', 
        'MaKhachHang',
        'MaNhanVien',
        'TongTien'        
    ];
    public function nhanvien()
    {
        return $this->belongsTo(User::class, 'MaNhanVien', 'id');
    }
    public function khachhang()
    {
        return $this->belongsTo(KhachHangModels::class, 'MaKhachHang', 'id');
    }
    public function chitiethoadonxuat()
    {
        return $this->hasMany(ChiTietHoaDonXuatModels::class, 'MaHoaDonXuat', 'id');
    }
    public function sanpham()
    {
        return $this->hasManyThrough(
            SanPhamModels::class, // Tên lớp mà chúng ta muốn lấy
            ChiTietHoaDonxuatModels::class,
            // Tên lớp trung gian
            'MaHoaDonXuat',
            // Khóa ngoại của bảng trung gian đến bảng hiện tại
            'id',
            // Khóa chính của bảng hiện tại
            'id',
            // Khóa chính của bảng cần lấy
            'MaSanPham' // Khóa ngoại của bảng hiện tại đến bảng cần lấy
        );
    }
    public function scopeFilterByDate($query, $minDate, $maxDate)
    {
        if ($minDate && $maxDate) {
            $query->whereBetween('NgayXuat', [$minDate, $maxDate]);
        } elseif ($minDate) {
            $query->where('NgayXuat', '>=', $minDate);
        } elseif ($maxDate) {
            $query->where('NgayXuat', '<=', $maxDate);
        }

        return $query;
    }
}
