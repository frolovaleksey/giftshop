<?php


namespace App\Helpers;


class BladeHelper
{
    public static function  get_all_vars($vars, $add = [])
    {
        if(isset($vars['__path'])){
            unset($vars['__path']);
        }

        if(isset($vars['__data'])){
            unset($vars['__data']);
        }

        if(isset($vars['obLevel'])){
            unset($vars['obLevel']);
        }

        if(isset($vars['__env'])){
            unset($vars['__env']);
        }

        if(isset($vars['app'])){
            unset($vars['app']);
        }

        if(isset($vars['errors'])){
            unset($vars['errors']);
        }

        return array_merge($vars, $add);
    }

}
