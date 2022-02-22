<?php


namespace App\Http\Controllers\Front;


use App\Page;
use App\Services\Pages\HomePage;

class PageController extends FrontController
{


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
        $webItem = HomePage::find( config('pages.home') );
        return view('front.page.home.show', ['webItem' => $webItem]);
    }
}
