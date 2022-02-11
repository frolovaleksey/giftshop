<?php

namespace App;

use App\Interfaces\MediaInterface;
use App\Interfaces\PageInterface;
use App\Traits\AuthorTrait;
use App\Traits\FilableTrait;
use App\Traits\FrontPageTrait;
use App\Traits\ModelHelperTrait;
use App\Traits\ReviewTrait;
use App\Traits\TemplateTrait;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements MediaInterface, PageInterface
{
    use ModelHelperTrait;
    use FilableTrait;
    use AuthorTrait;
    use TemplateTrait;
    use FrontPageTrait;
    use ReviewTrait;

    protected $fillable = [
        'sale_price',
        'expired_date',
    ];

    protected $dates = [
        'expired_date', //  product_expired wp
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
            'sale_price' => 'required|numeric',
            'expired_date' => 'date_format:d.m.Y',
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

    // Mutators
    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] = $this->setDate($value);
    }


    public static function initFields()
    {
        $title   = new \App\Helpers\FormGroup\Text('title'); // post title wp
        $title->setValidationRules(
            'required'
        );

        $content           = new \App\Helpers\FormGroup\Wysiwyg('content');           // post content wp
        $short_description = new \App\Helpers\FormGroup\Wysiwyg('short_description'); // post excerpt wp

        $number_of_persons = new \App\Helpers\FormGroup\Select('number_of_persons');  // eg-pocetosob wp
        $number_of_persons->setOptions(
            [
                1 => __('product.person_1'),
                2 => __('product.person_2'),
                3 => __('product.person_3'),
                4 => __('product.person_4'),
                5 => __('product.person_5'),
                6 => __('product.person_6'),
                7 => __('product.person_7'),
                8 => __('product.person_8'),
                9 => __('product.person_9'),
                10 => __('product.person_10'),
                102 => __('product.person_102'),
                103 => __('product.person_103'),
                104 => __('product.person_104'),
                105 => __('product.person_105'),
                106 => __('product.person_106'),
                1010 => __('product.person_1010'),
                1012 => __('product.person_1012'),
                1013 => __('product.person_1013'),
                1015 => __('product.person_1015'),
                10100 => __('product.person_10_plus'),
                204 => __('product.person_204'),
                205 => __('product.person_205'),
                206 => __('product.person_206'),
                304 => __('product.person_304'),
                305 => __('product.person_305'),
                306 => __('product.person_306'),
                4012 => __('product.person_4012'),
                506 => __('product.person_506'),
                6030 => __('product.person_6030'),
            ]
        );

        $hours = new \App\Helpers\FormGroup\Select('hours'); // eg-hodiny wp
        $hours->setOptions(
            [
                '2m' => __('product.hours_2_min'),
                '3m' => __('product.hours_3_min'),
                '6m' => __('product.hours_6_min'),
                '10m' => __('product.hours_10_min'),
                '15m' => __('product.hours_15_min'),
                '20m' => __('product.hours_20_min'),
                '25m' => __('product.hours_25_min'),
                '30m' => __('product.hours_30_min'),
                '40m' => __('product.hours_40_min'),
                '45m' => __('product.hours_45_min'),
                '50m' => __('product.hours_50_min'),
                '60m' => __('product.hours_60_min'),
                '75m' => __('product.hours_75_min'),
                '90m' => __('product.hours_90_min'),
                '100m' => __('product.hours_100_min'),
                '115m' => __('product.hours_115_min'),
                '1h' => __('product.hours_1h'),
                '2h' => __('product.hours_2h'),
                '2_5h' => __('product.hours_2_5h'),
                '3h' => __('product.hours_3h'),
                '3_5h' => __('product.hours_3_5h'),
                '4h' => __('product.hours_4h'),
                '5h' => __('product.hours_5h'),
                '6h' => __('product.hours_6h'),
                '7h' => __('product.hours_7h'),
                '8h' => __('product.hours_8h'),
                '9h' => __('product.hours_9h'),
                '10h' => __('product.hours_10h'),
                '11h' => __('product.hours_11h'),
                '12h' => __('product.hours_12h'),
                '15h' => __('product.hours_15h'),
                '2d' => __('product.hours_2d'),
                '3d' => __('product.hours_3d'),
                '4d' => __('product.hours_4d'),
                '5d' => __('product.hours_5d'),
                '7d' => __('product.hours_7d'),
                '5l' => __('product.hours_5l'),
                '10l' => __('product.hours_10l'),
                '2w' => __('product.hours_2w'),
                '6w' => __('product.hours_6w'),
                '1n' => __('product.hours_1n'),
                '2n' => __('product.hours_2n'),
                '3n' => __('product.hours_3n'),
                '4n' => __('product.hours_4n'),
                '5n' => __('product.hours_5n'),
                '6n' => __('product.hours_6n'),
                '7n' => __('product.hours_7n'),
                '14n' => __('product.hours_14n'),
                'all_d' => __('product.hours_all_d'),
                '1_month' => __('product.hours_1_month'),
                '1_year' => __('product.hours_1_year'),
            ]
        );

        $customproductsales   = new \App\Helpers\FormGroup\Text('customproductsales'); // eg-customproductsales  wp
        $customproductsales
            ->setValidationRules('numeric')
            ->setCssClass('input-small')
        ;


        $main_image        = new \App\Helpers\FormGroup\Image('main_image'); // feautured image wp
        $video             = new \App\Helpers\FormGroup\Text('video');       // eg-videolink wp

        $gallery           = new \App\Helpers\FormGroup\Repeater('gallery');
        $gallery->setFields(
            [
                'image' => new \App\Helpers\FormGroup\Image('image')
            ]
        );

        $faq    = new \App\Helpers\FormGroup\Repeater('faq');
        $faq->setFields(
            [
                'question' => new \App\Helpers\FormGroup\Text('question'),
                'answer' => new \App\Helpers\FormGroup\Text('answer'),
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
                'content' => $content,
                'short_description' => $short_description,
                'related_product' => $relatedProduct,
                'number_of_persons' => $number_of_persons,
                'hours' => $hours,
                'customproductsales' => $customproductsales,

                'main_image' => $main_image,
                'video' => $video,
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

    public function getBuyCount()
    {
        return $this->buy_count + $this->getFieldValue('customproductsales');
    }

    public function onSale()
    {
        // TODO
        return true;
    }

    public function saleCurrency()
    {
        // TODO
        return 'Kč';
    }

    public function getRegularPrice()
    {
        // stips_get_current_price(
        return $this->regular_price;
    }

    public function getSalePrice()
    {
        return $this->sale_price;
    }

    public function getSku()
    {
        return $this->sku;
    }
}
