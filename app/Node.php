<?php


namespace App;


use App\Traits\FilableTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Nanigans\SingleTableInheritance\SingleTableInheritanceTrait;

abstract class Node extends Model
{
    use SingleTableInheritanceTrait;
    use FilableTrait;

    /*
     * type
     */
    protected $table = 'nodes';
    protected static $singleTableTypeField = 'type';
    protected static $singleTableSubclasses = [
        Page::class,
    ];

    public $templates = [];
    public $parrentable = false;

    public abstract static function getBaseRoute();

    public abstract static function getBaseViewFolder();

    public abstract static function getBaseLoc();

    public abstract static function initFields();

    public function getValidationRules()
    {
        $rules = [];
        if( method_exists($this, 'getFieldsValidationRules') ){
            $rules = $rules + $this->getFieldsValidationRules();
        }
        return $rules;
    }

    public function getParentOptions()
    {
        $obj = get_class($this);
        $items = $obj::with(['fields' => function ($query) {
            $query->where('fkey', 'title');
        }])
        ->where('id', '!=', $this->id)->get();

        $options = [
            null => '--'
        ];
        foreach ($items as $item) {

            $field = $item->fields->first();

            if( $field !== null ){
                $options[$item->id] = $field->value;
            }else{
                $options[$item->id] = '(Empty title)';
            }

        }

        return $options;
    }

    public function hasTemplate()
    {
        return (count($this->templates) > 1);
    }

    public function getNodeType()
    {
        return static::$singleTableType;
    }

    public function saveRequest(Request $request)
    {
        if ($this->hasTemplate()) {
            $this->template = $request->template;
        }

        if ($this->parrentable) {
            $this->parent_id = $request->parent_id;
        }

        $this->slug = $this->prepareSlugByField($request, 'title');
        $this->save();

        $this->saveFields($request);

        return $this;
    }

    public function prepareSlugByField(Request $request, $field)
    {
        if ($request->slug) {
            $tempSlug = strtolower(\App\Helpers\UsefulHelper::transliterate($request->slug));
        } else {
            $tempSlug = strtolower(\App\Helpers\UsefulHelper::transliterate($request->$field));
        }

        if($tempSlug === null ){
            $tempSlug = 'slug';
        }

        return $this->getUniqueSlug($tempSlug, get_class($this));
    }

    public function getUniqueSlug($tempSlug, $obj)
    {
        if ($obj::where('slug', $tempSlug)->where('id', '!=', $this->id)->first() === null) {
            return $tempSlug;
        } else {
            return $this->getUniqueSlug($tempSlug . '_1', $obj);
        }
    }

}
