<?php


namespace App\Helpers\FormGroup;


class Select extends FormGroupElement
{
    protected $view = 'form_group.form_group_select';

    public function prepareViewOptions($viewOptions)
    {
        $value = null;
        if($this->fieldObj !== null){
            $value = $this->fieldObj->value;
        }

        $viewOptions['value'] = $value;
        return $viewOptions;
    }

    public function prepareFrontValue($fieldModel, $filableItem)
    {
        $options = $this->getOptions();
        return $options[$fieldModel->value];
    }
}
