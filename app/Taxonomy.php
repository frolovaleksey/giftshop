<?php

namespace App;

use App\Interfaces\MediaInterface;
use App\Interfaces\PageInterface;
use App\Traits\AuthorTrait;
use App\Traits\FilableTrait;
use App\Traits\FrontPageTrait;
use App\Traits\HierarchicalModelTrait;
use App\Traits\ParentTrait;
use App\Traits\TaxonomieTrait;
use App\Traits\TemplateTrait;
use Illuminate\Database\Eloquent\Model;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

abstract class Taxonomy extends Model implements MediaInterface, PageInterface
{
    use HierarchicalModelTrait;
    use SingleTableInheritanceTrait;
    use FilableTrait;
    use ParentTrait;
    use TemplateTrait;
    use AuthorTrait;

    /*
     * type
     */
    protected $table = 'taxonomies';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [
        Category::class,
        ProductCategory::class,
        ProductRelationTaxonomy::class,
        FeedCategory::class,
    ];

    public abstract static function getBaseRoute();

    public abstract static function getBaseViewFolder();

    public abstract static function getBaseLoc();

    public abstract static function initFields();

    public abstract static function taxRelationName();

    public function getValidationRules()
    {
        $rules = [];
        if( method_exists($this, 'getFieldsValidationRules') ){
            $rules = $rules + $this->getFieldsValidationRules();
        }
        return $rules;
    }

    public function getItemType()
    {
        return static::$singleTableType;
    }

    public function getTaxonomyType()
    {
        return static::$singleTableType;
    }



}
