<?php

namespace App\Http\Controllers\TrangChu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helper\CartHelper;
use App\Models\SanPhamModels;


class CartController extends Controller
{
    public function add(CartHelper $cart, $id)
    {
        $sanPhamModels = new SanPhamModels();
        $product = $sanPhamModels->getProductId($id)->first();
        $cart->add($product);
        return redirect()->back();
    }

    public function remove(CartHelper $cart, $id)
    {
        $cart->remove($id);
        return redirect()->back();
    }
    public function update(CartHelper $cart, $id, Request $request)
    {
        $quantity = request()->quantity ? request()->quantity : 1;
        $cart->update($id, $quantity);
        return redirect()->back();
    }
    public function clear(CartHelper $cart)
    {
        $cart->clear();
        return redirect()->back();
    }

}
