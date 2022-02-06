<?php


namespace App\Http\Controllers\Admin;


class PageController extends NodeController
{
    protected function getNodeObj()
    {
        return 'App\Page';
    }
}
