<?php


namespace App\Traits;


use App\Field;
use App\FieldRelation;
use App\Helpers\ImageHelper;
use App\Media;
use App\Product;
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
        $field->setValue( $this->getFieldValue($field->getName()) );
        $field->setFilableItem( $this );
        return $field->get();
    }

    public function renderRepeaterBlock($key)
    {
        $field = $this->getTemplateField($key);
        $field->setFieldObj($this->getField($field->getName()));
        $field->setValue( $this->getFieldValue($field->getName()) );
        $field->setFilableItem( $this );
        return $field->getBlock();
    }

    public function saveFields($request)
    {
        foreach($this->getTemplateFields() as $key => $field){
            $this->saveFieldValueFromRequest($field, $key, $request);
        }
    }

    public function saveFieldValueFromRequest($field, $key, $request, $parent=0, $order=0)
    {
        if( $field->isMedia() ) {
            $this->saveMedia($key, $request, $parent, $order);

        }elseif ( $field->isRepeater() ) {
            $this->saveRepeater($key, $field, $request);

        }elseif ( $field->isRelation() ){
            $this->saveRelation($key, $field, $request);

        }else{
            $this->saveField($key, $field->getValueFromRequest($request), $parent, $order);
        }
    }

    public function saveRelation($key, $field, $request)
    {
        $mainField = $this->saveField($key, 'relation');
        $fieldRelations = $mainField->fieldRelations;

        if($request->has($key)){
            $order = 0;
            foreach ($request->$key as $item) {

                // find old relations
                $filteredRelationObj = null;
                $filteredRelationObjKey = null;
                foreach ($fieldRelations as $fieldRelationKey => $fieldRelation){
                    if( $fieldRelation->relatable_id == $item && $fieldRelation->relatable_type == $field->getRelatedModel() ){
                        $filteredRelationObj = $fieldRelation;
                        $filteredRelationObjKey = $fieldRelationKey;
                        break;
                    }
                }

                if( $filteredRelationObj === null){
                    $filteredRelationObj = new FieldRelation();
                    $filteredRelationObj->relatable_id = $item;
                    $filteredRelationObj->relatable_type = $field->getRelatedModel();
                    $filteredRelationObj->field_id = $mainField->id;
                }

                $filteredRelationObj->order = $order;

                $filteredRelationObj->save();

                $fieldRelations->forget($filteredRelationObjKey);

                $order++;
            }
        }

        FieldRelation::destroy($fieldRelations->pluck('id'));
    }

    public function saveMedia($key, $request, $parent=0, $order=0)
    {
        $media = $this->saveMediaFromRequest($request, $key);
        if ($media !== null) {
            $this->saveField($key, $media->id, $parent, $order);
        }
    }

    public function saveRepeater($key, $field, $request)
    {
        $field->setFilableItem($this);

        $mainField = $field->getRepeaterMainField();
        if( $mainField === null ){
            $mainField = new Field();
            $mainField->filabletable_id = $this->id;
            $mainField->filabletable_type = get_class($this);
            $mainField->fkey = $key;
            $mainField->save();
        }

        $repeaterFields = $field->getRepeaterFields();
        $requestRepeaterData = $request->$key;

        foreach ($field->getFields() as $initField){
            $initFieldName = $initField->getName();

            if( !isset($requestRepeaterData[$initFieldName]) ){
                continue;
            }

            $order = 0;
            foreach ($requestRepeaterData[$initFieldName] as $fieldObjId => $requestValue){

                if( $initField->isMedia() ){

                    // Find old fields
                    $filteredFieldObj = null;
                    $filteredFieldObjKey = null;
                    foreach ($repeaterFields as $repeaterFieldKey => $repeaterField) {
                        if(
                            $repeaterField->id == $fieldObjId
                            && $repeaterField->fkey == $initFieldName
                            && $repeaterField->parent == $mainField->id
                            && $repeaterField->filabletable_id == $this->id
                            && $repeaterField->filabletable_type == get_class($this)
                        ){
                            $filteredFieldObj = $repeaterField;
                            $filteredFieldObjKey = $repeaterFieldKey;
                            break;
                        }
                    }

                    if( $filteredFieldObj === null ){
                        $filteredFieldObj = new Field();
                        $filteredFieldObj->filabletable_id = $this->id;
                        $filteredFieldObj->filabletable_type = get_class($this);
                        $filteredFieldObj->fkey = $initFieldName;
                        $filteredFieldObj->parent = $mainField->id;
                    }

                    $filteredFieldObj->order = $order;


                    // Media field
                    $files = $request->file($mainField->fkey);
                    $fieldFiles = $files[$initFieldName];

                    if( isset($fieldFiles[$fieldObjId]) ){

                        $media = $this->saveFile( $fieldFiles[$fieldObjId ]);

                        if ($media !== null) {
                            $filteredFieldObj->value = $media->id;
                        }
                    }

                    $filteredFieldObj->save();

                    $repeaterFields->forget($filteredFieldObjKey);


                }else{

                    // Find old fields
                    $filteredFieldObj = null;
                    $filteredFieldObjKey = null;
                    foreach ($repeaterFields as $repeaterFieldKey => $repeaterField) {
                        if(
                            $repeaterField->id == $fieldObjId
                            && $repeaterField->fkey == $initFieldName
                            && $repeaterField->parent == $mainField->id
                            && $repeaterField->filabletable_id == $this->id
                            && $repeaterField->filabletable_type == get_class($this)
                        ){
                            $filteredFieldObj = $repeaterField;
                            $filteredFieldObjKey = $repeaterFieldKey;
                            break;
                        }
                    }

                    if( $filteredFieldObj === null ){
                        $filteredFieldObj = new Field();
                        $filteredFieldObj->filabletable_id = $this->id;
                        $filteredFieldObj->filabletable_type = get_class($this);
                        $filteredFieldObj->fkey = $initFieldName;
                        $filteredFieldObj->parent = $mainField->id;
                    }

                    $filteredFieldObj->order = $order;
                    $filteredFieldObj->value = $requestValue;
                    $filteredFieldObj->save();

                    $repeaterFields->forget($filteredFieldObjKey);

                }

                $order++;
            }
        }

        // Delete unused fields
        Field::destroy($repeaterFields->pluck('id'));
    }

    public function saveField($key, $value, $parent=0, $order=0)
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
            $field->parent = $parent;
            $field->order = $order;
        }

        $field->value = $value;
        $field->save();

        return $field;
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

        $templateField = $this->getTemplateField($key);

        return $templateField->prepareFrontValue($field, $this);
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

        if( is_array($this->fillable) && count($this->fillable) ) {
            $this->fill($request->all());
        }

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
