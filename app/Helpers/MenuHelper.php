<?php


namespace App\Helpers;


class MenuHelper
{
    public function render_menu($menu_items){

        $html = '';
        foreach ($menu_items as $menu_item) {

            $subs = $this->render_sub($menu_item);
            //if( $this->check_item($menu_item) && $subs!== ''){
           if( ($this->check_item($menu_item) === null && $subs!== '') || $this->check_item($menu_item) ){


                    $html.='<li '.$this->render_li_attr($menu_item).'>';
                    $html.=   '<a '.$this->render_a_attr($menu_item).' '.$this->render_href($menu_item).'>
                             '.$menu_item['title'].'
                        </a>';

                    $html.= $subs;
                    $html.='</li>';


            }
        }
        return $html;
    }

    public function render_sub($menu_item)
    {
        if( isset($menu_item['sub']) && isset($menu_item['sub']['items']) && is_array($menu_item['sub']['items']) && count($menu_item['sub']['items']) ){

            $sub_menu = $this->render_menu($menu_item['sub']['items']);
            if($sub_menu == ''){
                return '';
            }

            $html = '<ul '.$this->render_ul_attr($menu_item['sub']).'>';
            $html.= $sub_menu;
            $html.='</ul>';
            return $html;
        }
    }

    public function check_item($menu_item)
    {
        if( !isset($menu_item['route']) ){
            return null;
        }else{
            return \App\Helpers\LockHelper::lock($menu_item['route']);
        }
    }

    public function render_href($menu_item){
        if( isset($menu_item['route']) ){
            return 'href="'. route($menu_item['route']) .'"';
        }else{
            return 'href="/"';
        }
    }

    public function render_ul_attr( $menu_item )
    {
        if( isset($menu_item['ul_attr']) ){
            return $this->render_attr($menu_item['ul_attr']);
        }
    }

    public function render_li_attr( $menu_item )
    {
        if( isset($menu_item['li_attr']) ){
            return $this->render_attr($menu_item['li_attr']);
        }
    }

    public function render_a_attr( $menu_item )
    {
        if( isset($menu_item['a_attr']) ){
            return $this->render_attr($menu_item['a_attr']);
        }
    }

    public function render_attr( $attributes )
    {
        $result = '';
        foreach ($attributes as $name=>$attribute){
            $result.=' '.$name.'="'.$attribute.'"';
        }
        return $result;
    }


}