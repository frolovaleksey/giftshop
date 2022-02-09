<?php


namespace App;


use App\Traits\FrontPageTrait;

class Page extends Node
{
    use FrontPageTrait;

    protected static $singleTableType = 'page';
    protected $table = 'nodes';

    public $templates = [
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
                'title' => $title,
                'content' => $content,
                'info' => $info,
                'image' => $image,
            ],
            'text' => [
                'title' => $title,
                'decs' => $decs,
            ],
        ];
    }


}
