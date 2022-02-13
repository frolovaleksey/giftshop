<?php


namespace App\Http\Controllers\Admin;


class FeedCategoryController extends TaxonomyController
{
    protected function getNodeObj()
    {
        return 'App\FeedCategory';
    }
}
