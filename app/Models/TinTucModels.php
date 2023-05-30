<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TinTucModels extends Model
{
    use HasFactory;
    protected $table ='tintuc';
    protected $fillable=[
        'MaNhanVien', 
        'TieuDe', 
        'TomTat', 
        'Anh'
    ];

    public function chitiettintuc()
    {
        return $this->hasMany(ChiTietTinTucModels::class, 'MaTinTuc', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'MaNhanVien', 'id');
    }
    
}
