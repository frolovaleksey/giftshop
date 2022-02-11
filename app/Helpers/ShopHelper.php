<?php


namespace App\Helpers;


use Illuminate\Support\Facades\Auth;

class ShopHelper
{
    public static function isСardholder()
    {
        if(!Auth::check()){
            return false;
        }

        return Auth::user()->hasRole('cardholder');
    }
}
