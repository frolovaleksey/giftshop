<?php


namespace App\Helpers;


use Illuminate\Database\Eloquent\Model;
use Route;

class LockHelper
{
    public static function active_route( array $routes )
    {
        foreach ($routes as $route) {
            if( self::lock($route) ){
                return $route;
            }
        }
    }

    public static function lock( $route, Model $item=null, $options=[], $callback=false )
    {
        if( !self::check_permissions($route) ){
            return false;
        }

        if($item===null){
            return true;
        }

        // check special function in model
        if($callback){
            $cb_result = $item->$callback();
            if(!$cb_result){
                return false;
            }
        }

        if( count($options) > 0 ){
            $active = true;
            foreach ($options as $parametr){
                if($item->$parametr > 0 ){
                    return false;
                }
            }
        }else{
            if( count($item->locks) > 0 ){
                $active = true;
                foreach ($item->locks as $parametr){
                    if($item->$parametr > 0 ){
                        return false;
                    }
                }
            }else{
                $active = true;
            }
        }

        return $active;
    }

    /*
     * Check controller permission for current user
     */
    protected static function check_permissions($route)
    {
        $routeCollection = Route::getRoutes();
        $controller = $routeCollection->getByName($route)->action['controller'];
        $permission = str_replace( ['\\', '@'], '_', $controller );

        return auth()->user()->can($permission);
    }
}
