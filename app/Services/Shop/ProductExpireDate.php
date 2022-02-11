<?php


namespace App\Services\Shop;


class ProductExpireDate
{
    public static function defaultDate(){
        return date('Ymd', strtotime("+361days"));
    }

    public static function getExpairedField($id){
        return get_post_meta($id, 'product_expired', true);
    }

    public static function getExpairedDateByProduct($id, $format='d.m.Y'){
        $product_expired = self::getExpairedField($id);
        if($product_expired == false){
            $product_expired = self::defaultDate();
        }

        return date_create_from_format('Ymd', $product_expired)->format($format);
    }

    public static function getCartExpairedMinDate($cart, $format='d.m.Y'){
        // TODO
        $min_date = self::defaultDate();
        foreach ( $cart as $cart_item_key => $cart_item ) {

            $_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

            $product_expired = self::getExpairedField($_product->get_id());
            if($product_expired != false && $product_expired < $min_date){
                $min_date = $product_expired;
            }
        }

        return date_create_from_format('Ymd', $min_date)->format($format);
    }

    public static function getOrderExpairedMinDate($order, $format='Ymd'){
        // TODO
        $min_date = self::defaultDate();
        foreach ( $order->get_items() as $item_id => $item ) {
            $product_id = $item->get_product_id();

            $product_expired = self::getExpairedField($product_id);
            if($product_expired != false && $product_expired < $min_date){
                $min_date = $product_expired;
            }
        }

        return date_create_from_format('Ymd', $min_date)->format($format);
    }
}
