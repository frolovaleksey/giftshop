<?php


namespace App\Http\Controllers\Admin;


class ProductCategoryController extends TaxonomyController
{
    protected function getNodeObj()
    {
        return 'App\ProductCategory';
    }
}
