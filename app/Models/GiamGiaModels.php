<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiamGiaModels extends Model
{
    use HasFactory;
    protected $table ='giamgia';
    protected $fillable = [
        'MaSanPham', 
        'PhanTram', 
        'ThoiGianBatDau', 
        'ThoiGianKetThuc', 
        'TrangThai'
    ];
    public function sanphams()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
