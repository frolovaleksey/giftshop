<?php


namespace App;



class ProductCategory extends Taxonomy
{
    protected static $singleTableType = 'product_cat';
    protected $table = 'taxonomies';

    public $templates = [
        'base' => 'base',
    ];


    public $parrentable = true;

    public function getFilesDirectory()
    {
        return 'upload/product_cat/'.$this->id;
    }

    public static function getBaseRoute()
    {
        return 'product_cat';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.basepage';
    }

    public static function getBaseLoc()
    {
        return 'product_cat';
    }

    public static function taxRelationName()
    {
        // name for relation function in model
        return 'productCategory';
    }

    public static function initFields()
    {
        // template => [field1, field2, ...]
        return [
            'base' => [
                'title'           => \App\Helpers\FormGroup\Text::create('title')
                                        ->setValidationRules(
                                            'required'
                                        ),
                'description'     => \App\Helpers\FormGroup\Textarea::create('description'),
                'category_header' => \App\Helpers\FormGroup\Wysiwyg::create('category_header'),
                'image'           => \App\Helpers\FormGroup\Image::create('image'),
            ],
        ];
    }

}
