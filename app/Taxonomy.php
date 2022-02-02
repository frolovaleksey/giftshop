<?php

namespace App;

use App\Traits\HierarchicalModelTrait;
use Illuminate\Database\Eloquent\Model;

abstract class Taxonomy extends Node
{
    use HierarchicalModelTrait;
    /*
     * type
     */
    protected $table = 'taxonomies';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [
        Category::class,
    ];

    public function getTaxonomyType()
    {
        return static::$singleTableType;
    }



}
