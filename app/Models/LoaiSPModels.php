<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiSPModels extends Model
{
    use HasFactory;
    protected $table = 'loaisp';
    protected $fillable = [
        'TenLoai',
        'TrangThai'
    ];
    public function sanphams()
    {
        return $this->hasMany(SanPhamModels::class, 'MaLoai', 'id');
    }
}
