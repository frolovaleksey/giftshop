<?php


namespace App\Helpers;


use App\Helpers\LockHelper;
use Illuminate\Database\Eloquent\Model;



class HtmlHelper
{
    public static function question( $text )
    {
        $view_options = [
            'text' => $text,
        ];
        return view('html_helper.question', $view_options );
    }

    public static function info( $text, $hide_label=false )
    {
        $view_options = [
            'text' => htmlspecialchars($text),
            'hide_label' => $hide_label,
        ];
        return view('html_helper.info', $view_options );
    }

    public static function comment( $text, $cssClass='' )
    {
        $view_options = [
            'text' => $text,
            'cssClass' => $cssClass,
        ];
        return view('html_helper.comment', $view_options );
    }

    /*
     * $options = ['temp'] hint for disable base check
     */
    public static function lock_li( $route, $text, Model $item=null, $options=[], $callback=false, $target=false )
    {
        $active = false;
        if(is_array($route)){
            foreach ($route as $temp_route){
                if(LockHelper::lock( $temp_route, $item, $options, $callback )){
                    $active = true;
                    $route = $temp_route;
                    break;
                }
            }
        }else{
            $active = LockHelper::lock( $route, $item, $options, $callback );
        }

        if($item!==null){
            $item_id = $item->id;
        }else{
            $item_id = null;
        }

        if($active){
            return view('html_helper.lock_active', [
                'route' => $route,
                'id'    => $item_id,
                'text'  => $text,
                'target' => $target,
            ]);
        }else{
            return view('html_helper.lock_inactive', [
                'text'  => $text,
            ]);
        }
    }

    public static function lock_li_destroy( $route, $text, Model $item=null, $options=[], $callback=false, $target=false )
    {
        if(is_array($route)){
            foreach ($route as $temp_route){
                if(LockHelper::lock( $temp_route, $item, $options, $callback )){
                    $active = true;
                    $route = $temp_route;
                    break;
                }
            }
        }else{
            $active = LockHelper::lock( $route, $item, $options, $callback );
        }

        if($item!==null){
            $item_id = $item->id;
        }else{
            $item_id = null;
        }

        if($active){
            return view('html_helper.lock_li_destroy', [
                'route' => $route,
                'id'    => $item_id,
                'text'  => $text,
                'target' => $target,
            ]);
        }else{
            return view('html_helper.lock_inactive', [
                'text'  => $text,
            ]);
        }
    }

    public static function lock( $route, Model $item=null )
    {
        return LockHelper::lock( $route, $item );
    }

    public static function menu($menu_items)
    {
        $menu_items = collect($menu_items);

        $menu = new \App\Helpers\MenuHelper;
        return $menu->render_menu($menu_items);
    }

    public static function blankLink($route, $text)
    {
        return '<a target="_blank" href="'.$route.'">'.$text.'</a>';
    }

}
