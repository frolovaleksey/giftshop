<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class CategoryController extends TaxonomyController
{
    //
    protected function getNodeObj()
    {
        return 'App\Category';
    }
}
