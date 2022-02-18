<?php


namespace App\Helpers\FormGroup;


use App\Field;
use App\FieldRelation;

class Relation extends FormGroupElement
{
    protected $relation = true;
    protected $findByField = true;
    protected $findInField = 'title';
    protected $view = 'form_group.form_group_relation';
    protected $relatedModel = null;


    public function prepareViewOptions($viewOptions)
    {
        $filableItem = $this->getFilableItem();

        $viewOptions['parametres']['class'] = $viewOptions['parametres']['class'] .' field_relation';
        $viewOptions['parametres']['multiple'] = 'multiple';
        $viewOptions['parametres']['data-url'] = route('field.get_relation_options', [
            'field' => $this->getName(),
            'model' => str_replace('App\\', '', get_class($filableItem)),
            'id' => $filableItem->id,
        ]
        );
        $viewOptions['name'] = $viewOptions['name'].'[]';
        $viewOptions['selected_options'] = $this->getSelectedOptions();

        return $viewOptions;
    }

    public function setRelatedModel($relatedModel)
    {
        $this->relatedModel = $relatedModel;
        return $this;
    }

    public function getRelatedModel()
    {
        return $this->relatedModel;
    }

    public function findRelatedModels($q, $page)
    {
        return $this->findByFields($q, $page);
    }

    public function findByFields($q, $page)
    {
        return Field::where('fkey', $this->findInField)
            ->where('filabletable_type', $this->relatedModel)
            ->where('parent', 0)
            ->where('value', 'like', $q.'%')
            ->paginate(30, ['*'], 'page', $page  )
            ;
    }

    public function getSelectedOptions()
    {
        $options = [];

        if( $this->fieldObj === null ){
            return $options;
        }

        $fkey = $this->findInField;

        $fieldRelations = $this->fieldObj->fieldRelations;
        if( $fieldRelations === null ){
            return $options;
        }

        foreach ($fieldRelations as $item) {

            $option = $item->relatable->fields->first(function ($item, $key) use($fkey) {
                return $item->fkey == $fkey;
            });

            $options[$item->relatable->id] = $option->value;
        };

        return $options;
    }


    public function prepareFrontValue($fieldModel, $filableItem)
    {
        return $fieldModel->fieldRelations()->with('relatable')->get()
            ->pluck('relatable');
    }


}
