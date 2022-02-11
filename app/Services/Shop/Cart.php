<?php


namespace App\Services\Shop;


use App\Product;

class Cart
{
    protected $products = null;
    protected $productIds = null;

    public function __construct($app=null)
    {
        $this->productIds = session('cart');
    }

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

    public function getProducts()
    {
        if($this->products !== null ){
            return $this->products;
        }

        if($this->productIds === null ){
            return null;
        }

        $idsOrdered = implode(',', $this->productIds);
        $this->products = Product::whereIn('id', $this->productIds)->orderByRaw("FIELD (id, $idsOrdered)")
            ->with('fields')
            //->with('media')
            ->get();

        return $this->products;
    }

    public static function getItemsCount()
    {
        $productIds = session('cart');

        if(is_array($productIds) && count($productIds)){
            return count($productIds);
        }

        return 0;
    }

    public function hasProduct($product)
    {
        dd('g');
    }

    public function getCartTotal()
    {
        if($this->productIds === null ){
            return 0;
        }

        $total = 0;
        foreach ($this->getProducts() as $product) {
            $total+= $product->getClientPrice();
        }
        return $total;
    }

}
