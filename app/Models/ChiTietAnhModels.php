<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietAnhModels extends Model
{
    use HasFactory;
    protected $table = 'chitietanh';
    protected $fillable = [
        'MaSanPham', 
        'Anh',
    ];
    public function sanphams()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
