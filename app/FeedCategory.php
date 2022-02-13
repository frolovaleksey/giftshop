<?php


namespace App;


use App\Rules\UniqueTitleRule;

class FeedCategory extends Taxonomy
{
    protected static $singleTableType = 'feed_category';
    protected $table = 'taxonomies';

    public $templates = [
        'base' => 'base',
    ];


    public $parrentable = true;

    public function getFilesDirectory()
    {
        return 'upload/feed_category/'.$this->id;
    }

    public static function getBaseRoute()
    {
        return 'feed_category';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.basepage';
    }

    public static function getBaseLoc()
    {
        return 'feed_category';
    }

    public static function taxRelationName()
    {
        // name for relation function in model
        return 'productFeedCategory';
    }

    public static function initFields()
    {
        // template => [field1, field2, ...]
        return [
            'base' => [
                'title'           => \App\Helpers\FormGroup\Text::create('title')
                    ->setValidationRules(
                        ['required', new UniqueTitleRule()]
                    ),
            ],
        ];
    }
}

