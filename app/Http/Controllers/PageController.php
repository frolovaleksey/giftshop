<?php


namespace App\Http\Controllers;


class PageController extends NodeController
{
    protected function getNodeObj()
    {
        return 'App\Page';
    }
}
