<?php


namespace App;


use App\Interfaces\FrontPageInterface;
use App\Services\Pages\HomePage;
use App\Traits\FrontPageTrait;

class Page extends Node implements FrontPageInterface
{
    use FrontPageTrait;

    protected static $singleTableType = 'page';
    protected $table = 'nodes';


    public $templates = [
        'home' => 'home',
        'base' => 'base',
        'text' => 'text',
    ];

    public $parrentable = true;

    public function getFilesDirectory()
    {
        return 'upload/page/'.$this->id;
    }

    public static function getBaseRoute()
    {
        return 'page';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.basepage';
    }

    public static function getBaseLoc()
    {
        return 'page';
    }

    public function getUrl()
    {
        return str_replace(
            '/page/',
            '/',
            route(self::getBaseRoute().'.front.show', ['slug' => $this->slug] )
        );
    }

    public static function initFields()
    {

        // template => [field1, field2, ...]
        return [
            'home' => [
                'title' => \App\Helpers\FormGroup\Text::create('title')->setValidationRules('required'), // post title wp
                'main_image' => \App\Helpers\FormGroup\Image::create('main_image'), // feautured image wp
                'gallery' => \App\Helpers\FormGroup\Repeater::create('gallery')
                    ->setFields(
                        [
                            'image' => \App\Helpers\FormGroup\Image::create('image'),
                            'url' => \App\Helpers\FormGroup\Text::create('url')
                        ]
                    ),

                // SEO
                'seo_title' => \App\Helpers\FormGroup\Text::create('seo_title'),
                'description' => \App\Helpers\FormGroup\Textarea::create('description'),
                'keywords' => \App\Helpers\FormGroup\Text::create('keywords'),
            ],
            'base' => [
                'title' => \App\Helpers\FormGroup\Text::create('title')->setValidationRules('required'), // post title wp
                'main_image' => \App\Helpers\FormGroup\Image::create('main_image'), // feautured image wp
                'content' => \App\Helpers\FormGroup\Wysiwyg::create('content'),

            ],
            'text' => [
                'title' => \App\Helpers\FormGroup\Text::create('title')->setValidationRules('required'), // post title wp
                'main_image' => \App\Helpers\FormGroup\Image::create('main_image'), // feautured image wp
                'content' => \App\Helpers\FormGroup\Wysiwyg::create('content'),
            ],
        ];
    }


    public static function frontView()
    {
        return 'front.page.show';
    }

    public static function findItem($id)
    {
        $pages = config('pages');
        if($id == $pages['home']){
            $item = HomePage::findOrFail($id);
        }else{
            $item = parent::findOrFail( $id );
        }

        return $item;
    }
}
