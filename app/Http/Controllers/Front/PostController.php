<?php


namespace App\Http\Controllers\Front;


class PostController extends FrontController
{
    protected function getNodeObj()
    {
        return 'App\Post';
    }

    public function show($slug)
    {
        $webItem = $this->nodeObj::findBySlug($slug);

        return view( $webItem::frontView(), ['webItem' => $webItem]);
    }
}
