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

    public function getEditUrl()
    {
        return route(self::getBaseRoute().'.edit', [self::getBaseRoute() => $this] );
    }

    public function getTitle()
    {
        $suffix = ' | ' . config('app.name');

        if( method_exists($this, 'getFieldValue') ){
            if( $title = $this->getFieldValue('seo_title') ){
                return $title . $suffix;
            }elseif ($title = $this->getFieldValue('title') ){
                return $title . $suffix;
            }
        }

        return config('app.name');
    }

    public function getMainImageUrl()
    {
        $imageUrl = false;
        if( method_exists($this, 'getImage') ){
            return $this->getImage('main_image')->url();
        }

        return $imageUrl;
    }

    public function getDescription()
    {
        if( method_exists($this, 'getFieldValue') ){
            return $this->getFieldValue('description');
        }

        return '';
    }

    public function getKeywords()
    {
        if( method_exists($this, 'getFieldValue') ){
            return $this->getFieldValue('keywords');
        }

        return '';
    }

}
