<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends NodeController
{

    protected function getNodeObj()
    {
        return 'App\Product';
    }

}
