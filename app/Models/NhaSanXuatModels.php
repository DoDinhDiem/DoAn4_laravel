<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhaSanXuatModels extends Model
{
    use HasFactory;
    protected $table ="nhasanxuat";
    protected $fillable = [
        'TenNSX',
        'MoTa'
    ];
    public function sanphams()
    {
        return $this->hasMany(SanPhamModels::class, 'MaNSX', 'id');
    }
}
