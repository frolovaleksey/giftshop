<?php

namespace App;

use App\Rules\UniqueTitleRule;
use App\Traits\FrontPageTrait;
use Illuminate\Database\Eloquent\Model;

class Category extends Taxonomy
{
    use FrontPageTrait;

    protected static $singleTableType = 'category';
    protected $table = 'taxonomies';

    /*
    public $templates = [
        'base' => 'base',
    ];
    */
    public $templates = [
        'base' => 'base',
    ];


    public $parrentable = true;

    public function posts()
    {
        return $this->morphedByMany('App\Post', 'taxable', 'taxables', 'tax_id', 'taxable_id' );
    }

    public function getFilesDirectory()
    {
        return 'upload/category/'.$this->id;
    }

    public static function getBaseRoute()
    {
        return 'category';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.basepage';
    }

    public static function getBaseLoc()
    {
        return 'category';
    }

    public static function taxRelationName()
    {
        // name for relation function in model
        return 'categories';
    }

    public static function initFields()
    {
        $title   = new \App\Helpers\FormGroup\Text('title');
        $title->setValidationRules(
            'required'
        );

        $content = new \App\Helpers\FormGroup\Text('content');
        $info    = new \App\Helpers\FormGroup\Text('info');
        $decs    = new \App\Helpers\FormGroup\Text('decs');
        $image    = new \App\Helpers\FormGroup\Image('image');

        // template => [field1, field2, ...]
        return [
            'base' => [
                'title'           => \App\Helpers\FormGroup\Text::create('title')
                    ->setValidationRules(
                        ['required', new UniqueTitleRule()]
                    ),
                'content' => $content,
                'info' => $info,
                'image' => $image,
            ],
        ];
    }
}
