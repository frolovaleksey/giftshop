<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends NodeController
{
    //
    protected function getNodeObj()
    {
        return 'App\Post';
    }
}
