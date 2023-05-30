<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SlideModels extends Model
{
    use HasFactory;
    protected $table = 'slide';
    protected $fillable = [
        'Anh'
    ];
}
