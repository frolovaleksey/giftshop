<?php


namespace App\Traits;


trait ModelHelperTrait
{
    protected function setDate($value)
    {
        if($value===null){
            return null;
        }else{
            return date ("Y-m-d H:i:s", strtotime($value));
        }
    }
}
