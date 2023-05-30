<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietTinTucModels extends Model
{
    use HasFactory;
    protected $table ='chitiettintuc';
    protected $fillable=[
        'MaTinTuc', 
        'NoiDung'
    ];
    public function tintuc()
    {
        return $this->belongsTo(TinTucModels::class, 'MaTinTuc', 'id');
    }
}
