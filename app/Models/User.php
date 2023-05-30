<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Foundation\Auth\Authenticatable;
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $fillable = [
        'name', 
        'NgaySinh', 
        'GioiTinh',
        'DiaChi', 
        'DienThoai', 
        'AnhDaiDien', 
        'role', 
        'TrangThai', 
        'email',
        'password'
    ];
    public function hoadonnhap()
    {
        return $this->hasMany(HoaDonNhapModels::class, 'MaNhanVien', 'id');
    }
    public function hoadonxuat()
    {
        return $this->hasMany(HoaDonXuatModels::class, 'MaNhanVien', 'id');
    }
    public function tintuc()
    {
        return $this->hasMany(TinTucModels::class, 'MaNhanVien', 'id');
    }
    public function scopeFilterByName($query, $name)
    {
        if ($name) {
            $query->where('name', 'LIKE', '%' . $name . '%');
        }
        return $query;
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}