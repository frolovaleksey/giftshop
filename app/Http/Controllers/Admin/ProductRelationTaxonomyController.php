<?php


namespace App\Http\Controllers\Admin;


class ProductRelationTaxonomyController extends TaxonomyController
{
    protected function getNodeObj()
    {
        return 'App\ProductRelationTaxonomy';
    }
}
