<?php


namespace App\Http\Controllers\Front;


use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $nodeObj = null;

    public function __construct()
    {
        parent::__construct();

        $this->nodeObj = $this->getNodeObj();
    }

    protected function getNodeObj()
    {
        return 'App\Product';
    }

    public function show($slug)
    {
        $webItem = $this->nodeObj::findBySlug($slug);

        return view( $webItem::frontView(), ['webItem' => $webItem]);
    }
}
