<?php

namespace App;

use App\Interfaces\FrontPageInterface;
use App\Interfaces\MediaInterface;
use App\Interfaces\PageInterface;
use App\Traits\AuthorTrait;
use App\Traits\CommentTrait;
use App\Traits\FilableTrait;
use App\Traits\FrontPageTrait;
use App\Traits\ModelHelperTrait;
use App\Traits\ReviewTrait;
use App\Traits\TaxonomieTrait;
use App\Traits\TemplateTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Product extends Model implements MediaInterface, PageInterface, FrontPageInterface
{
    use ModelHelperTrait;
    use FilableTrait;
    use AuthorTrait;
    use TemplateTrait;
    use FrontPageTrait;
    use ReviewTrait;
    use TaxonomieTrait;
    use CommentTrait;

    protected $fillable = [
        'sale_price',
        'regular_price',
        'expired_date',
        'sku',
    ];

    protected $dates = [
        'expired_date', //  product_expired wp
    ];

    public $templates = [
        'base' => 'base',
    ];



    public $taxonomies = [
        ProductCategory::class,
        ProductRelationTaxonomy::class,
        FeedCategory::class,
    ];

    public function productCategory()
    {
        return $this->morphToMany('App\ProductCategory', 'taxable', 'taxables', 'taxable_id', 'tax_id'  )->withPivotValue('tax_type','product_cat');
    }

    public function productRelationTaxonomies()
    {
        return $this->morphToMany('App\ProductRelationTaxonomy', 'taxable', 'taxables', 'taxable_id', 'tax_id'  )->withPivotValue('tax_type','prod_rel_tax');
    }

    public function productFeedCategory()
    {
        return $this->morphToMany('App\FeedCategory', 'taxable', 'taxables', 'taxable_id', 'tax_id'  )->withPivotValue('tax_type','prod_rel_tax');
    }



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
        $number_of_persons = \App\Helpers\FormGroup\Select::create('number_of_persons')  // eg-pocetosob wp
                        ->setOptions(
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

        $hours = \App\Helpers\FormGroup\Select::create('hours') // eg-hodiny wp
                ->setOptions(
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

        return [
            'base' => [
                'title' => \App\Helpers\FormGroup\Text::create('title')->setValidationRules('required'), // post title wp
                'content' => \App\Helpers\FormGroup\Wysiwyg::create('content'),           // post content wp
                'short_description' => \App\Helpers\FormGroup\Wysiwyg::create('short_description'), // post excerpt wp

                'related_product' => \App\Helpers\FormGroup\Relation::create('related_product')
                    ->setRelatedModel('App\Product')
                    ->setLabel('Related Products'),

                'upsell_product' => \App\Helpers\FormGroup\Relation::create('upsell_product')
                    ->setRelatedModel('App\Product')
                    ->setLabel('Upsell Products'),

                'feautured' => \App\Helpers\FormGroup\Checkbox::create('feautured'), //


                'number_of_persons' => $number_of_persons,
                'hours' => $hours,
                'customproductsales' => \App\Helpers\FormGroup\Text::create('customproductsales') // eg-customproductsales  wp
                        ->setValidationRules(['numeric', 'nullable'])
                        ->setCssClass('input-small'),


                'cities' => \App\Helpers\FormGroup\Text::create('cities')->setLabel( 'Cities (next ","):' ), //eg-maplocations wp
                'street' => \App\Helpers\FormGroup\Text::create('street')->setLabel( 'Street (next "and"):' ), //eg-belowlocation wp
                'googlemap' => \App\Helpers\FormGroup\Textarea::create('googlemap'), //eg-googlemap wp
                'single_product_description' => \App\Helpers\FormGroup\Text::create('single_product_description')->setLabel( 'Short description (next "|"):' ), //eg-single-product-description

                // Specification
                'course_experience' => \App\Helpers\FormGroup\Textarea::create('course_experience'), // prubeh_zazitku  wp
                'location' => \App\Helpers\FormGroup\Textarea::create('location'), // lokalita  wp
                'experience_includes' => \App\Helpers\FormGroup\Textarea::create('experience_includes'), // darek_obsahuje  wp
                'experience_does_not_contain' => \App\Helpers\FormGroup\Textarea::create('experience_does_not_contain'), // darek_obsahuje  wp
                'season' => \App\Helpers\FormGroup\Textarea::create('season'), // darek_neobsahuje  wp
                'spectators' => \App\Helpers\FormGroup\Textarea::create('spectators'), // divaci  wp
                'weather' => \App\Helpers\FormGroup\Textarea::create('weather'), // pocasi  wp
                'health_condition' => \App\Helpers\FormGroup\Textarea::create('health_condition'), // zdravotni_stav  wp
                'note' => \App\Helpers\FormGroup\Textarea::create('note'), // poznamka  wp

                'main_image' => \App\Helpers\FormGroup\Image::create('main_image'), // feautured image wp
                'video' => \App\Helpers\FormGroup\Text::create('video'),       // eg-videolink wp
                'gallery' => \App\Helpers\FormGroup\Repeater::create('gallery')
                    ->setFields(
                        [
                            'image' => \App\Helpers\FormGroup\Image::create('image')
                        ]
                    ),

                'faq' =>  \App\Helpers\FormGroup\Repeater::create('faq')
                    ->setFields(
                        [
                            'question' => \App\Helpers\FormGroup\Text::create('question'),
                            'answer' => \App\Helpers\FormGroup\Text::create('answer'),
                        ]
                    ),


                // SEO
                'seo_title' => \App\Helpers\FormGroup\Text::create('seo_title'),
                'description' => \App\Helpers\FormGroup\Textarea::create('description'),
                'keywords' => \App\Helpers\FormGroup\Text::create('keywords'),
            ],
        ];
    }

    public static function frontView()
    {
        return 'front.product.show';
    }

    public function getClientPrice()
    {
        if($this->sale_price === null ){
            return $this->regular_price;
        }
        return $this->sale_price;
    }

    public function getBuyCount()
    {
        return $this->buy_count + $this->getFieldValue('customproductsales');
    }

    public function onSale()
    {
        // TODO  check for dates
        if ( ($this->getSalePrice()!==null && $this->getRegularPrice() !== null) && $this->getRegularPrice() > $this->getSalePrice() ) {
            $onSale = true;

            if( $this->date_open !== null && $this->date_open->gte( Carbon::now() ) ){
                $onSale = true;
            }

            if( $this->date_close !== null && $this->date_close->lte( Carbon::now() ) ){
                $onSale = true;
            }

        } else {
            $onSale = false;
        }

        return $onSale;
    }

    public function isVisible()
    {
        // TODO
        return true;
    }

    public function isHot()
    {
        // TODO
        return true;
    }

    public function isBestseller()
    {
        // TODO
        return true;
    }

    public function hasBestPrice()
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

    public function getViewsCount()
    {
        $min = 1;
        $max = 400;
        return rand($min, $max);
    }

    public function getRelatedProductByTax()
    {
        $products = collect([]);
        foreach ($this->productRelationTaxonomies as $productRelationTaxonomy){
            $products = $products->merge(
                $productRelationTaxonomy->products()->where('taxable_id', '!=', $this->id)
                ->get()
            );
        }
        return $products->unique('id');
    }

    public static function getFeauturedProducts($take=6)
    {
        $fields = Field::where('filabletable_type', 'App\Product')
            ->where('fkey', 'feautured')
            ->where('value', 1)
            ->take($take)
            ->inRandomOrder()
            ->pluck('filabletable_id')
        ;

        $idsOrdered = $fields->implode(',');
        return Product::with('fields')
            ->whereIn('id', $fields)
            ->orderByRaw("FIELD (id, $idsOrdered)")
            ->get();
    }
}
