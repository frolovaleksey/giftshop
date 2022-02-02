<?php

namespace App;


use App\Relations\HasTaxRelations;
use App\Relations\TaxRelation;

class Post extends Node
{
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
        $title   = new \App\Helpers\FormGroup\Text('title');
        $title->setValidationRules(
            'required'
        );

        // template => [field1, field2, ...]
        return [
            'base' => [
                'title' => $title,
            ],
        ];
    }
}
