<?php


namespace App;


class Page extends Node
{
    protected static $singleTableType = 'page';
    protected $table = 'nodes';

    public $templates = [
        'base' => 'base',
        'text' => 'text',
    ];

    public $parrentable = true;

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

        // template => [field1, field2, ...]
        return [
            'base' => [
                'title' => $title,
                'content' => $content,
                'info' => $info,
            ],
            'text' => [
                'title' => $title,
                'decs' => $decs,
            ],
        ];
    }


}
