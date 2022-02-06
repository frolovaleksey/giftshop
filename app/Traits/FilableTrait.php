<?php


namespace App\Traits;


use App\Field;
use App\Helpers\ImageHelper;
use App\Media;
use Illuminate\Http\Request;

trait FilableTrait
{
    use MediaTrait;

    protected $loadedFields=null;

    public function getFieldsValidationRules()
    {
        $rules = [];
        foreach ($this->getTemplateFields() as $field) {
            $rules = $rules + $field->getValidationRules();
        }

        return $rules;
    }

    public function fields()
    {
        return $this->morphMany('App\Field', 'filabletable' );
    }

    public function getTemplateFields()
    {
        $fields = $this->initFields();

        if( isset($fields[$this->template]) ){
            $tplFields = $fields[$this->template];
        }else{
            $tplFields = array_shift($fields);
        }

        return $tplFields;
    }

    public function getTemplateField($key)
    {
        $fields = $this->getTemplateFields();
        return $fields[$key];
    }

    public function getImage($key)
    {
        $field = $this->getTemplateField($key);
        $fieldValue = $this->getFieldValue($field->getName());
        return new ImageHelper($fieldValue);
    }

    public function renderFields()
    {
        $view = '';
        foreach ($this->getTemplateFields() as $field) {
            $field->setFieldObj($this->getField($field->getName()));
            $field->setValue(  $this->getFieldValue($field->getName())  );
            $view.= $field->get();
        }
        return $view;
    }

    public function renderField($key)
    {
        $field = $this->getTemplateField($key);
        $field->setFieldObj($this->getField($field->getName()));
        $field->setValue(  $this->getFieldValue($field->getName()) );
        return $field->get();
    }

    public function saveFields($request)
    {
        foreach($this->getTemplateFields() as $key => $field){
            $this->saveFieldValueFromRequest($field, $key, $request);
        }
    }

    public function saveFieldValueFromRequest($field, $key, $request)
    {
        if( $field->isMedia() ){
            $media = $this->saveMediaFromRequest($request, $key);
            if($media !== null) {
                $this->saveField($key, $media->id);
            }
        }else{
            $this->saveField($key, $field->getValueFromRequest($request));
        }
    }

    public function saveField($key, $value)
    {
        if($value===null){
            return;
        }

        $field = $this->getField($key);
        if($field === null ){
            $field = new Field();
            $field->filabletable_id = $this->id;
            $field->filabletable_type = get_class($this);
            $field->fkey = $key;
        }

        $field->value = $value;
        $field->save();

        return $this;
    }

    public function getField($fkey)
    {
        return $this->fields->filter(function ($value, $key) use($fkey) {
            return $value->fkey == $fkey;
        })->first();
    }

    public function getFieldValue($key)
    {
        $field = $this->getField($key);
        if($field === null ){
            return null;
        }
        return $field->value;
    }

    public function saveRequest(Request $request)
    {
        if ($this->hasTemplate()) {
            $this->template = $request->template;
        }

        if ($this->parrentable) {
            $this->parent_id = $request->parent_id;
        }

        if(isset($this->taxonomies) && count($this->taxonomies) > 0){
            $this->saveTaxonomies($request);
        }

        $this->slug = $this->prepareSlugByField($request, 'title');

        $this->fill($request->all());

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
