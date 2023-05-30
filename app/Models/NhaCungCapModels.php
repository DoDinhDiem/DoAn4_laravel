<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaCungCapModels extends Model
{
    use HasFactory;
    protected $table = 'nhacungcap';
    protected $fillable = [
        'TenNhaCungCap', 
        'DiaChi', 
        'SoDienThoai', 
        'Email'
    ];
    public function chitiethoadonnhap()
    {
        return $this->hasMany(ChiTietHoaDonNhapModels::class, 'MaNhaCungCap', 'id');
    }
}
