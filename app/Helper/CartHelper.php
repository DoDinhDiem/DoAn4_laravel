<?php

namespace App\Helper;

class CartHelper
{
    public $items = [];
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
        $this->total_price = $this->get_total_price();
        $this->total_quantity = $this->get_total_quantity();
    }

    public function add($product, $quantity = 1)
    {
        $item = [
            'id' => $product->id,
            'TenSanPham' => $product->TenSanPham,
            'AnhDaiDien' => $product->AnhDaiDien,
            'GiaBan' => $product->GiaGiam,
            'quantity' => $quantity,
        ];
        if (isset($this->items[$product->id])) {
            $this->items[$product->id]['quantity'] += $quantity;
        } else {
            $this->items[$product->id] = $item;
        }
        session(['cart' => $this->items]);
    }
    public function remove($id)
    {
        if (isset($this->items[$id])) {
            unset($this->items[$id]);
        }
        session(['cart' => $this->items]);
    }

    public function update($id, $quantity = 1)
    {
        if (isset($this->items[$id])) {
            $this->items[$id]['quantity'] = $quantity;
        }
        session(['cart' => $this->items]);
    }

    public function clear()
    {
        session(['cart' => '']);
    }
    private function get_total_price()
    {
        $t = 0;
        foreach ($this->items as $item) {
            $t += $item['GiaBan'] * floatval($item['quantity']);
        }
        return $t;
    }
    private function get_total_quantity()
    {
        $t = 0;
        foreach ($this->items as $item) {
            if ($item['id']) {
                $t += intval($item['quantity']);
            }
        }
        return $t;
    }
    public function get_price_of_item($id)
    {
        if (isset($this->items[$id])) {
            $item = $this->items[$id];
            $price = $item['GiaBan'] * floatval( $item['quantity']);
            return $price;
        }
        return 0;
    }
}
