<?php

namespace App;


use App\Relations\HasTaxRelations;
use App\Relations\TaxRelation;
use App\Traits\FrontPageTrait;

class Post extends Node
{
    use FrontPageTrait;

    protected static $singleTableType = 'post';
    protected $table = 'nodes';

    public $templates = [
        'base' => 'base',
    ];

    public $taxonomies = [
        Category::class,
    ];

    public function categories()
    {
        return $this->morphToMany('App\Category', 'taxable', 'taxables', 'taxable_id', 'tax_id'  );
    }

    public function getFilesDirectory()
    {
        return 'upload/post/'.$this->id;
    }

    public static function getBaseRoute()
    {
        return 'post';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.basepage';
    }

    public static function getBaseLoc()
    {
        return 'post';
    }

    public static function initFields()
    {
        // template => [field1, field2, ...]
        return [
            'base' => [
                'title' => \App\Helpers\FormGroup\Text::create('title')->setValidationRules('required'), // post title wp
                'main_image' => \App\Helpers\FormGroup\Image::create('main_image'), // feautured image wp
                'content' => \App\Helpers\FormGroup\Wysiwyg::create('content'),           // post content wp
            ],
        ];
    }
}
