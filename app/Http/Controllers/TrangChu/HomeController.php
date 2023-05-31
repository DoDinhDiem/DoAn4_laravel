<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use App\Models\ChiTietTinTucModels;
use App\Models\ThongSoKyThuatModels;
use App\Models\TinTucModels;
use Illuminate\Http\Request;
use App\Models\SanPhamModels;
use App\Models\SlideModels;
use App\Models\NhaSanXuatModels;
use App\Models\ChiTietAnhModels;
use App\Helper\CartHelper;
use App\Models\KhachHangModels;
use App\Models\DonHangModels;
use App\Models\ChiTietDonHangModels;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function index(Request $request)
    {   
        $sanPhamModels = new SanPhamModels();
        $newProducts = $sanPhamModels->getSanPhamMoi(10);
        $dicountProducts  = $sanPhamModels->getSanPhamGiamGia(10);
        $sellingProducts = $sanPhamModels->getSanPhamBanChay(10);
        $name = $request->input('name');
        $productSearch = $sanPhamModels->getProduct($name);
       
        $slide = SlideModels::get();
        return view("trangChu.Home.index", compact('newProducts', 'dicountProducts', 'sellingProducts', 'productSearch', 'slide'));
        
    }
    public function CategoryProduct($categoryId){
        $sanPhamModels = new SanPhamModels();
        $producer = NhaSanXuatModels::get();
        $idcate =  $categoryId;
        $categoryproduct = $sanPhamModels->getDiscountedProductsByCategoryId($categoryId);
        return view("trangChu.Home.CategoryProducts",compact('categoryproduct', 'producer', 'idcate'));
    }
    public function ProductDetail($productId){
        $sanPhamModels = new SanPhamModels();
        $productdetail = $sanPhamModels->getProductId($productId)->first();
        $categoryId = $productdetail->MaLoai;
        $similarproduct = $sanPhamModels->getSimilarProduct($productId, $categoryId);
        $imgdetail = ChiTietAnhModels::where('MaSanPham', '=', $productId)->get();
        $productInformation = ThongSoKyThuatModels::where('MaSanPham', '=', $productId)->get();

        return view("trangChu.Home.ProductDetail",compact('productdetail', 'imgdetail', 'productInformation', 'similarproduct'));
    }

    public function News(){
        $new = TinTucModels::paginate(6);
        return view("trangChu.Home.News", compact('new'));
    }
    public function NewDetail($id){
        $new = TinTucModels::findOrFail($id);
        $newdetail = ChiTietTinTucModels::where('MaTinTuc', $id)->first();
        return view("trangChu.Home.NewDetail", compact('new', 'newdetail'));
    }
    public function AboutUs(){
        return view("trangChu.Home.AboutUs");
    }
    public function Contact(){
        return view("trangChu.Home.Contact");
    }
    public function ViewCart(){
        $index = 1;
        return view("trangChu.Home.ShoppingCart", compact('index'));
    }
    public function CheckOut(){
        return view("trangChu.Home.CheckOut");
    }
    public function store(CartHelper $cart, Request $request)
    {
        $customer = KhachHangModels::create($request->all());
        
        $order = new DonHangModels;
        $order->MaKhachHang = $customer->id;
        $order->NgayDat = Carbon::now();
        $order->TrangThaiDonHang = 0;
        $order->TongTien = $cart->total_price;
        $order->save();

        
        foreach($cart->items as $item){
            $orderdetail = new ChiTietDonHangModels;
            $orderdetail->MaDonHang = $order->id;
            $orderdetail->MaSanPham = $item['id'];
            $orderdetail->SoLuong = $item['quantity'];
            $orderdetail->GiaMua = $item['GiaBan'];
            $orderdetail->save();
        }
        $cart->clear();
        return redirect()->route('home')->with('success', 'Đặt hàng thành công!');

    }
 
}
