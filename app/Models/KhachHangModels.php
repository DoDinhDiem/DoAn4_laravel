<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHangModels extends Model
{
    use HasFactory;
    protected $table = 'khachhang';
    protected $fillable = [
        'TenKhachHang', 
        'DiaChi', 
        'SoDienThoai',
        'Email'
    ];
    public function hoadonxuat()
    {
        return $this->hasMany(HoaDonXuatModels::class, 'MaKhachHang', 'id');
    }
    public function khachhang(){
        return $this->hasMany(KhachHangModels::class, 'MaKhachHang', 'id');
    }
    public function scopeFilterByName($query, $name)
    {
        if ($name) {
            $query->where('TenKhachHang', 'LIKE', '%' . $name . '%');
        }
        return $query;
    }
}
