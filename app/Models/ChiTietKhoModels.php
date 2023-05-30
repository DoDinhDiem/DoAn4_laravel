<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietKhoModels extends Model
{
    use HasFactory;
    protected $table = 'chitietkho';
    protected $fillable = [
        'MaKho',
        'MaSanPham', 
        'SoLuong'
    ];
    public function kho()
    {
        return $this->belongsTo(KhoModels::class, 'MaKho', 'id');
    }
    public function sanpham()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
