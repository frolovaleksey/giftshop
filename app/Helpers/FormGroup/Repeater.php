<?php


namespace App\Helpers\FormGroup;


use App\Field;
use phpDocumentor\Reflection\Utils;

class Repeater extends FormGroupElement
{
    protected $repeater = true;
    protected $view = 'form_group.form_group_repeater';
    protected $fields;

    public function setFields($fields)
    {
        $this->fields = $fields;
        return $this;
    }

    public function getFields()
    {
        return $this->fields;
    }

    public function renderBlocks()
    {
        $fields = $this->getRepeaterFields();
        $blocks = $this->prepareRepeaterFieldBlocks($fields);

        $view = '';
        foreach ($blocks as $block) {
            $view.= $this->getFilledBlock($block);
        }

        return $view;
    }

    public function getBlock()
    {
        $item = $this->getFilableItem();

        $view = '';
        foreach ($this->fields as $field) {

            $repeaterName = $this->getName();
            $fieldName    = $field->getName();

            $field->setName( $repeaterName."[$fieldName][]" );

            $field->setFieldObj($item->getField($field->getName()));
            $field->setValue( $item->getFieldValue($field->getName()) );
            $view.= $field->get();
        }

        return view('form_group.repeater.block', ['fields' => $view]);
    }

    public function getFilledBlock($block)
    {
        $item = $this->getFilableItem();

        $view = '';
        foreach ($this->fields as $field) {

            $repeaterName = $this->getName();
            $fieldName    = $field->getName();

            $value = null;
            $fieldObjId = null;
            if(isset($block[$fieldName])){
                $value = $block[$fieldName]->value;
                $fieldObjId = $block[$fieldName]->id;
            }

            $field->setName( $repeaterName."[$fieldName][$fieldObjId]" );
            $field->setFieldObj( Field::find($fieldObjId) );
            $field->setValue(  $value  );
            $view.= $field->get();

            // return original field name
            $field->setName( $fieldName );
        }

        return view('form_group.repeater.block', ['fields' => $view]);
    }


    public function prepareRepeaterFieldBlocks($fields)
    {
        $result = [];
        foreach ($fields as $field) {
            $result[$field->order][$field->fkey] = $field;
        }

        return $result;
    }

    public function getRepeaterFields()
    {
        $repeater = $this->getRepeaterMainField();

        if( $repeater === null){
            return [];
        }

        $fields = $this->filableItem->fields()
            ->where('parent', $repeater->id)
            ->orderBy('order')
            ->get();
        return $fields;
    }

    public function getRepeaterMainField()
    {
        return $this->filableItem->fields()->where('fkey', $this->name)->first();
    }

    public function prepareViewOptions($viewOptions)
    {
        return $viewOptions + ['repeater' => $this];
    }

    public function prepareFrontValue($fieldModel, $filableItem)
    {
        $this->setFilableItem($filableItem);

        $result = [];
        foreach ($this->prepareRepeaterFieldBlocks( $this->getRepeaterFields() ) as $order => $block) {
            foreach ($block as $key => $field){
                $result[$order][$key] = $field->value;
            }
        }

        return collect( $result );
    }
}
