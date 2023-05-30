<?php

namespace App\Http\Controllers\QuanTri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SanPhamModels;
use App\Models\LoaiSPModels;
use App\Models\NhaSanXuatModels;
use App\Models\DonViTinhModels;
use App\Models\ChiTietAnhModels;
use App\Models\ThongSoKyThuatModels;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class SanPhamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $pageSize = $request->input('pageSize', 10); // Lấy giá trị pageSize từ request, mặc định là 5
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');
        $name = $request->input('name');
        $query = SanPhamModels::query();
        if ($name || ($minPrice && $maxPrice)) {
            $query->filterByNameAndPrice($name, $minPrice, $maxPrice);
        }
        $products = $query->with('loaisp', 'donvitinh', 'nhasanxuat')->paginate($pageSize);
        // $products = SanPhamModels::with('loaisp', 'donvitinh', 'nhasanxuat')->paginate($pageSize); // Phân trang với kích thước trang là $pageSize
        $pageIndex = $products->firstItem(); // Lấy chỉ số sản phẩm đầu tiên của trang hiện tại
        $pageSize = $products->lastItem(); // Lấy chỉ số sản phẩm cuối cùng của trang hiện tại
        $total = $products->total(); // Lấy tổng số sản phẩm
        foreach ($products as $product) {
            $product->limited_mota = Str::limit($product->MoTaSanPham, 100, '...');
        }

        return view('quanTri.SanPham.index', compact('products', 'pageIndex', 'pageSize', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = LoaiSPModels::pluck('TenLoai', 'id');
        $producer = NhaSanXuatModels::pluck('TenNSX', 'id');
        $unit = DonViTinhModels::pluck('TenDonViTinh', 'id');
        return view('quanTri.SanPham.create', compact('producer', 'category', 'unit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        DB::beginTransaction();
        try {
            $product = SanPhamModels::create($request->all());
            if ($request->has('file_uploads')) {
                $file = $request->file_uploads;
                $ext = $request->file_uploads->extension();
                $fileName = 'product' . '-' . date('YmdHis.') . $ext;
                $file->move(public_path('uploads/products/'), $fileName);
                $product->AnhDaiDien = $fileName;
            }
            $product->save();

            $i = 1;
            $imgdetails = [];
            if ($request->has('imgdetail')) {
                $i = 1;
                foreach ($request->imgdetail as $file) {
                    $ext = $file->extension();
                    $fileNames = 'imgdetail' . '-' . date('YmdHis-') . $i . '.' . $ext;
                    $file->move(public_path('uploads/imgdetail/'), $fileNames);
                    $imgdetails[] = [
                        'MaSanPham' => $product->id,
                        'Anh' => $fileNames,
                    ];
                    $i++;
                }
            }
            ChiTietAnhModels::insert($imgdetails);


            $specifications = [];
            if ($request->has('TenThongSo')) {
                foreach ($request->input('TenThongSo') as $key => $value) {
                    $thongSo = [
                        'MaSanPham' => $product->id,
                        'TenThongSo' => $request->input('TenThongSo')[$key],
                        'MoTa' => $request->input('MoTa')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ThongSoKyThuatModels::insert($specifications);

            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }

        return redirect()->route('SanPham')->with('success', 'Thêm thành công.');
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = SanPhamModels::with('loaisp', 'donvitinh', 'nhasanxuat', 'chitietanh', 'thongsokythuat')->findOrFail($id);
        return view('quanTri.SanPham.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = LoaiSPModels::pluck('TenLoai', 'id');
        $producer = NhaSanXuatModels::pluck('TenNSX', 'id');
        $unit = DonViTinhModels::pluck('TenDonViTinh', 'id');
        $products = SanPhamModels::findOrFail($id);
        $oldImages = []; // Danh sách các ảnh cũ
        $oldImages = ChiTietAnhModels::where('MaSanPham', $products->id)->pluck('Anh')->toArray();
        $oldSpecifications = ThongSoKyThuatModels::where('MaSanPham', $products->id)->get();
        return view('quanTri.SanPham.edit', compact('producer', 'category', 'unit', 'products', 'oldImages', 'oldSpecifications'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = SanPhamModels::findOrFail($id);
        DB::beginTransaction();
        try {
            if ($request->has('file_uploads')) {
                $file = $request->file_uploads;
                $ext = $request->file_uploads->extension();
                $fileName = 'product' . '-' . date('YmdHis.') . $ext;
                $file->move(public_path('uploads/products/'), $fileName);
                if ($product->AnhDaiDien) {
                    $oldPath = public_path('uploads/products/') . $product->AnhDaiDien;
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }
                $product->AnhDaiDien = $fileName;
            }


            $product->update($request->all());

            $imgdetails = [];
            $oldImages = []; // Danh sách các ảnh cũ
            $oldImages = ChiTietAnhModels::where('MaSanPham', $product->id)->pluck('Anh')->toArray();
            if ($request->has('imgdetail')) {
                $i = 1;
                foreach ($request->imgdetail as $file) {
                    $ext = $file->extension();
                    $fileNames = 'imgdetail' . '-' . date('YmdHis-') . $i . '.' . $ext;
                    $file->move(public_path('uploads/imgdetail/'), $fileNames);
                    $imgdetails[] = [
                        'MaSanPham' => $product->id,
                        'Anh' => $fileNames,
                    ];
                    $i++;
                }

                // Kiểm tra xem có sự thay đổi ảnh không
                if ($oldImages != $request->imgdetail) {
                    // Xóa các ảnh cũ
                    ChiTietAnhModels::where('MaSanPham', $product->id)->delete();
                    foreach ($oldImages as $image) {
                        $oldPath = public_path('uploads/imgdetail/') . $image;
                        if (file_exists($oldPath)) {
                            unlink($oldPath);
                        }
                    }

                    // Thêm ảnh mới vào
                    ChiTietAnhModels::insert($imgdetails);
                }
            }

            $specifications = [];
            if ($request->has('TenThongSo')) {
                foreach ($request->input('TenThongSo') as $key => $value) {
                    $thongSo = [
                        'MaSanPham' => $product->id,
                        'TenThongSo' => $request->input('TenThongSo')[$key],
                        'MoTa' => $request->input('MoTa')[$key],
                    ];
                    $specifications[] = $thongSo;
                }
            }
            ThongSoKyThuatModels::where('MaSanPham', $product->id)->delete();
            ThongSoKyThuatModels::insert($specifications);


            DB::commit();
        } catch (\Exception $e) {
            // Nếu có lỗi xảy ra, hoàn tác các thay đổi trước đó
            DB::rollback();
            throw $e;
        }

        return redirect()->route('SanPham')->with('success', 'Sửa thành công.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $imgdetails = ChiTietAnhModels::where('MaSanPham', $id)->get();
        foreach ($imgdetails as $imgdetail) {
            $imgdetail->delete();
        }
        $products = SanPhamModels::findOrFail($id);
        $products->delete();

        return redirect()->route('SanPham')->with('success', 'Xóa sản phẩm thành công!');

    }
}