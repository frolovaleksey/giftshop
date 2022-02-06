<?php


namespace App\Services\Shop;


use App\Product;

class Cart
{
    public static function addProduct(Product $product)
    {
        $request = request();
        $request->session()->push( 'cart', $product->id );
        $request->session()->save();
    }

    public static function deleteProduct($id)
    {
        $productIds = session('cart');

        foreach ($productIds as $key => $productId){
            if($productId == $id){
                unset($productIds[$key]);
            }
        }

        $request = request();
        $request->session()->put( 'cart', $productIds );
        $request->session()->save();
    }

    public static function getProducts()
    {
        $productIds = session('cart');
        $idsOrdered = implode(',', $productIds);
        return Product::whereIn('id', $productIds)->orderByRaw("FIELD (id, $idsOrdered)")->with('fields')->get();
    }

    public static function getItemsCount()
    {
        $productIds = session('cart');

        if(is_array($productIds) && count($productIds)){
            return count($productIds);
        }

        return 0;
    }

    public static function getCartTotal()
    {
        $total = 0;
        foreach (self::getProducts() as $product) {
            $total+= $product->getClientPrice();
        }
        return $total;
    }
}
