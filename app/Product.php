<?php

namespace App;

use App\Interfaces\MediaInterface;
use App\Interfaces\PageInterface;
use App\Traits\AuthorTrait;
use App\Traits\FilableTrait;
use App\Traits\FrontPageTrait;
use App\Traits\TemplateTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements MediaInterface, PageInterface
{
    use FilableTrait;
    use AuthorTrait;
    use TemplateTrait;
    use FrontPageTrait;

    protected $fillable = [
        'sale_price',
    ];

    public $templates = [
        'base' => 'base',
    ];

    public function getFilesDirectory()
    {
        return 'upload/product/'.$this->id;
    }

    public function getValidationRules()
    {
        $rules = [
            'sale_price' => 'required|numeric'
        ];


        if( method_exists($this, 'getFieldsValidationRules') ){
            $rules = $rules + $this->getFieldsValidationRules();
        }
        return $rules;
    }

    public function getItemType()
    {
        return 'product';
    }

    public static function getBaseRoute()
    {
        return 'product';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.product';
    }

    public static function getBaseLoc()
    {
        return 'product';
    }

    public static function initFields()
    {
        $title   = new \App\Helpers\FormGroup\Text('title');
        $title->setValidationRules(
            'required'
        );

        $main_image    = new \App\Helpers\FormGroup\Image('main_image');

        $faq    = new \App\Helpers\FormGroup\Repeater('faq');
        $faq->setFields(
            [
                'question' => new \App\Helpers\FormGroup\Text('question'),
                'answer' => new \App\Helpers\FormGroup\Text('answer'),
            ]
        );

        $gallery    = new \App\Helpers\FormGroup\Repeater('gallery');
        $gallery->setFields(
            [
                'image' => new \App\Helpers\FormGroup\Image('image')
            ]
        );

        $relatedProduct = new \App\Helpers\FormGroup\Relation('related_product');
        $relatedProduct->setRelatedModel('App\Product')
        ->setLabel('Related Product')
        ;

        // template => [field1, field2, ...]
        return [
            'base' => [
                'title' => $title,
                'related_product' => $relatedProduct,

                'main_image' => $main_image,
                'gallery' => $gallery,

                'faq' => $faq,
            ],
        ];
    }

    public static function frontView()
    {
        return 'front.product.show';
    }

    public function getClientPrice()
    {
        return $this->sale_price;
    }
}
