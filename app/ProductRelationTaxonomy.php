<?php


namespace App;


use App\Rules\UniqueTitleRule;

class ProductRelationTaxonomy extends Taxonomy
{
    protected static $singleTableType = 'prod_rel_tax';
    protected $table = 'taxonomies';

    public $templates = [
        'base' => 'base',
    ];


    public $parrentable = true;

    public function getFilesDirectory()
    {
        return 'upload/prod_rel_tax/'.$this->id;
    }

    public static function getBaseRoute()
    {
        return 'prod_rel_tax';
    }

    public static function getBaseViewFolder()
    {
        return 'admin.basepage';
    }

    public static function getBaseLoc()
    {
        return 'prod_rel_tax';
    }

    public static function taxRelationName()
    {
        // name for relation function in model
        return 'productRelationTaxonomies';
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

    public function products()
    {
        return $this->morphedByMany('App\Product', 'taxable', 'taxables', 'tax_id')
            ->withPivotValue('tax_type','prod_rel_tax');
            ;
    }
}
