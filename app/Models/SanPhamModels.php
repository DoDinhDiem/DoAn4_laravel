<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SanPhamModels extends Model
{
    use HasFactory;
    protected $table = 'sanpham';
    protected $fillable = [
        'MaLoai',
        'TenSanPham',
        'MoTaSanPham',
        'AnhDaiDien',
        'MaNSX',
        'MaDonViTinh',
        'GiaBan'
    ];
    public function loaisp()
    {
        return $this->belongsTo(LoaiSPModels::class, 'MaLoai', 'id');
    }

    public function nhasanxuat()
    {
        return $this->belongsTo(NhaSanXuatModels::class, 'MaNSX', 'id');
    }

    public function donvitinh()
    {
        return $this->belongsTo(DonViTinhModels::class, 'MaDonViTinh', 'id');
    }
    public function chitietanh()
    {
        return $this->hasMany(ChiTietAnhModels::class, 'MaSanPham', 'id');
    }
    public function thongsokythuat()
    {
        return $this->hasMany(ThongSoKyThuatModels::class, 'MaSanPham', 'id');
    }
    public function giamgia()
    {
        return $this->hasMany(GiamGiaModels::class, 'MaSanPham', 'id');
    }
    public function chitietkhuyenmai()
    {
        return $this->hasMany(ChiTietKhuyenMaiModels::class, 'MaSanPham', 'id');
    }
    public function chitiethoadonnhap()
    {
        return $this->hasMany(ChiTietHoaDonNhapModels::class, 'MaSanPham', 'id');
    }
    public function chitiethoadonxuat()
    {
        return $this->hasMany(ChiTietHoaDonXuatModels::class, 'MaSanPham', 'id');
    }
    public function chitietkho()
    {
        return $this->hasMany(ChiTietKhoModels::class, 'MaSanPham', 'id');
    }

    public function chitietdonhang()
    {
        return $this->hasMany(ChiTietDonHangModels::class, 'MaSanPham', 'id');
    }
    public function scopeFilterByNameAndPrice($query, $name, $minPrice, $maxPrice)
    {
        if ($name) {
            $query->where('TenSanPham', 'LIKE', '%' . $name . '%');
        }

        if ($minPrice && $maxPrice) {
            $query->whereBetween('GiaBan', [$minPrice, $maxPrice]);
        } elseif ($minPrice) {
            $query->where('GiaBan', '>=', $minPrice);
        } elseif ($maxPrice) {
            $query->where('GiaBan', '<=', $maxPrice);
        }

        return $query;
    }
    public function getSanPhamGiamGia($SoLuong)
    {
        $now = Carbon::now();
        $sanPhamGiamGia = DB::table('giamgia')
            ->join('sanpham', 'giamgia.MaSanPham', '=', 'sanpham.id')
            ->select(
                'sanpham.*',
                'giamgia.PhanTram',
                DB::raw('ROUND((sanpham.GiaBan - (sanpham.GiaBan * IFNULL(giamgia.PhanTram, 0) / 100)), -4) as GiaGiam')
            )
            ->where('giamgia.TrangThai', '=', 1)
            ->where('giamgia.ThoiGianKetThuc', '>=', $now)
            ->orderBy('giamgia.ThoiGianBatDau', 'asc')
            ->take($SoLuong)
            ->get();

        return $sanPhamGiamGia;
    }

    public function getSanPhamMoi($SoLuong)
    {
        $query = DB::table('sanpham')
            ->leftJoin('giamgia', function ($join) {
                $join->on('sanpham.id', '=', 'giamgia.MaSanPham')
                    ->where('giamgia.PhanTram', '>', 0)
                    ->whereDate('giamgia.ThoiGianKetThuc', '>=', Carbon::now());
            })
            ->where('sanpham.created_at', '<=', Carbon::now())
            ->orderBy('sanpham.created_at', 'DESC')
            ->select(
                'sanpham.*',
                DB::raw('ROUND((sanpham.GiaBan - (sanpham.GiaBan * IFNULL(giamgia.PhanTram, 0) / 100)), -4) as GiaGiam'),
                DB::raw('COALESCE(giamgia.PhanTram, 0) as PhanTram')
            )
            ->take($SoLuong)
            ->get();

        return $query;
    }


    public function getSanPhamBanChay($SoLuong)
    {
        $query = DB::table('sanpham as sp')
            ->join('chitiethoadonxuat as ct', 'sp.id', '=', 'ct.MaSanPham')
            ->leftJoin('giamgia as gg', function ($join) {
                $join->on('gg.MaSanPham', '=', 'ct.MaSanPham')
                    ->where('gg.PhanTram', '>', 0)
                    ->whereDate('gg.ThoiGianKetThuc', '>=', Carbon::now());
            })
            ->select(
                'sp.id',
                'sp.TenSanPham',
                'sp.AnhDaiDien',
                'sp.GiaBan',
                DB::raw('ROUND((sp.GiaBan - sp.GiaBan * COALESCE(gg.PhanTram, 0) / 100), -4) as GiaGiam'),
                DB::raw('COALESCE(gg.PhanTram, 0) as PhanTram'),
                DB::raw('COUNT(*) as Total')
            )
            ->groupBy(
                'sp.id',
                'sp.TenSanPham',
                'sp.AnhDaiDien',
                'sp.GiaBan',
                'gg.PhanTram'
            )
            ->orderBy('Total', 'DESC')
            ->take($SoLuong)
            ->get();

        return $query;
    }

    public function getDiscountedProductsByCategoryId($categoryId)
    {
        $query = DB::table('SanPham as sp')
            ->leftJoin('GiamGia as gg', function ($join) {
                $join->on('gg.MaSanPham', '=', 'sp.id')
                    ->where('gg.PhanTram', '>', 0)
                    ->whereDate('gg.ThoiGianKetThuc', '>=', Carbon::now());
            })
            ->where('sp.MaLoai', '=', $categoryId)
            ->select(
                'sp.*',
                DB::raw('ROUND((sp.GiaBan - sp.GiaBan * COALESCE(gg.PhanTram, 0) / 100), -4) as GiaGiam'),
                DB::raw('COALESCE(gg.PhanTram, 0) as PhanTram')
            )
            ->orderBy('sp.created_at', 'DESC')
            ->paginate(15);

        return $query;
    }

    public function getProductId($productId)
    {
        $query = DB::table('sanpham as sp')
            ->leftJoin('GiamGia as gg', function ($join) {
                $join->on('gg.MaSanPham', '=', 'sp.id')
                    ->where('gg.PhanTram', '>', 0)
                    ->whereDate('gg.ThoiGianKetThuc', '>=', Carbon::now());
            })
            ->where('sp.id', '=', $productId)
            ->select(
                'sp.*',
                DB::raw('ROUND((sp.GiaBan - sp.GiaBan * COALESCE(gg.PhanTram, 0) / 100), -4) as GiaGiam'),
                DB::raw('COALESCE(gg.PhanTram, 0) as PhanTram')
            )
            ->get();

        return $query;
    }

    public function getSimilarProduct($productId, $categoryId)
    {
        $query = DB::table('sanpham as sp')
            ->leftJoin('GiamGia as gg', function ($join) {
                $join->on('gg.MaSanPham', '=', 'sp.id')
                    ->where('gg.PhanTram', '>', 0)
                    ->whereDate('gg.ThoiGianKetThuc', '>=', Carbon::now());
            })
            ->where('sp.id', '!=', $productId)
            ->where('sp.MaLoai', '=', $categoryId)
            ->select(
                'sp.*',
                DB::raw('ROUND((sp.GiaBan - sp.GiaBan * COALESCE(gg.PhanTram, 0) / 100), -4) as GiaGiam'),
                DB::raw('COALESCE(gg.PhanTram, 0) as PhanTram')
            )
            ->take(10)
            ->get();

        return $query;
    }

    public function getProduct($name = null)
    {
        $query = DB::table('SanPham as sp')
            ->leftJoin('GiamGia as gg', function ($join) {
                $join->on('gg.MaSanPham', '=', 'sp.id')
                    ->where('gg.PhanTram', '>', 0)
                    ->whereDate('gg.ThoiGianKetThuc', '>=', Carbon::now());
            })
            ->select(
                'sp.*',
                DB::raw('ROUND((sp.GiaBan - sp.GiaBan * COALESCE(gg.PhanTram, 0) / 100), -4) as GiaGiam'),
                DB::raw('COALESCE(gg.PhanTram, 0) as PhanTram')
            )
            ->orderBy('sp.created_at', 'DESC');

        if ($name) {
            $query->where('sp.TenSanPham', 'LIKE', '%' . $name . '%');
        }

        $results = $query->paginate(15);

        return $results;
    }

}