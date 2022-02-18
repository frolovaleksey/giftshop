<?php


namespace App\Http\Controllers\Front;


use App\Page;

class PageController extends FrontController
{
    protected $nodeObj = null;

    public function __construct()
    {
        parent::__construct();

        $this->nodeObj = $this->getNodeObj();
    }

    protected function getNodeObj()
    {
        return 'App\Page';
    }

    public function show($slug)
    {
        $webItem = $this->nodeObj::findBySlug($slug);

        return view( $webItem::frontView(), ['webItem' => $webItem]);
    }

    public function homePage()
    {
        $webItem = Page::find( config('pages.home') );
        return view('front.page.home', ['webItem' => $webItem]);
    }
}
