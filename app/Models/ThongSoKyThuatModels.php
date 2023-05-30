<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThongSoKyThuatModels extends Model
{
    use HasFactory;
    protected $table ='thongsokythuat';
    protected $fillable = [
        'MaSanPham', 
        'TenThongSo', 
        'MoTa',
    ];
    public function sanphams()
    {
        return $this->belongsTo(SanPhamModels::class, 'MaSanPham', 'id');
    }
}
