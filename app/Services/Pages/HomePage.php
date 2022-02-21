<?php


namespace App\Services\Pages;


use App\Page;

class HomePage extends Page
{
    public function fields()
    {
        return parent::fields();
    }

    public static function getBaseViewFolder()
    {
        return 'admin.home';
    }
}
