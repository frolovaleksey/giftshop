<?php


namespace App\Traits;


trait FrontPageTrait
{
    public static function findBySlug($slug)
    {
        return self::where('slug', $slug)->first();
    }

    public function getUrl()
    {
        return route(self::getBaseRoute().'.front.show', ['slug' => $this->slug] );
    }
}
