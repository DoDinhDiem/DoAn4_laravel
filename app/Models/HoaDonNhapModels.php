<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhapModels extends Model
{
    use HasFactory;
    protected $table = 'hoadonnhap';
    protected $fillable = [
        'NgayNhap', 
        'MaNhanVien', 
        'MaNhaCungCap'
    ];
    public function nhanvien()
    {
        return $this->belongsTo(User::class, 'MaNhanVien', 'id');
    }
    public function nhacungcap()
    {
        return $this->belongsTo(NhaCungCapModels::class, 'MaNhaCungCap', 'id');
    }
    public function chitiethoadonnhap()
    {
        return $this->hasMany(ChiTietHoaDonNhapModels::class, 'MaHoaDonNhap', 'id');
    }
    public function sanpham()
    {
        return $this->hasManyThrough(
            SanPhamModels::class, // Tên lớp mà chúng ta muốn lấy
            ChiTietHoaDonNhapModels::class,
            // Tên lớp trung gian
            'MaHoaDonNhap',
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
            $query->whereBetween('NgayNhap', [$minDate, $maxDate]);
        } elseif ($minDate) {
            $query->where('NgayNhap', '>=', $minDate);
        } elseif ($maxDate) {
            $query->where('NgayNhap', '<=', $maxDate);
        }

        return $query;
    }
}
