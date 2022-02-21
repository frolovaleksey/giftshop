<?php


namespace App;


use App\Interfaces\MediaInterface;
use App\Services\Pages\HomePage;
use App\Traits\AuthorTrait;
use App\Traits\FilableTrait;
use App\Traits\FrontPageTrait;
use App\Traits\MediaTrait;
use App\Traits\ParentTrait;
use App\Traits\TaxonomieTrait;
use App\Traits\TemplateTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

abstract class Node extends Model implements MediaInterface
{
    use SingleTableInheritanceTrait;
    use FilableTrait;
    use TaxonomieTrait;
    use ParentTrait;
    use TemplateTrait;
    use AuthorTrait;


    /*
     * type
     */
    protected $table = 'nodes';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [
        Page::class,
        HomePage::class,
        Post::class,
    ];

    public abstract static function getBaseRoute();

    public abstract static function getBaseViewFolder();

    public abstract static function getBaseLoc();

    public abstract static function initFields();

    public function getFilesDirectory()
    {
        return 'upload/node/'.$this->id;
    }

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

}
