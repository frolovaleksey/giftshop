<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Product;
use App\Services\Shop\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addProduct($id, Cart $cart)
    {
        $product = Product::findOrFail($id);
        $cart->addProduct($product);

        return back();
    }

    public function deleteProduct($id, Cart $cart)
    {
        $cart->deleteProduct($id);
        return back();
    }
}
