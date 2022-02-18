<?php


namespace App\Helpers\FormGroup;


class Checkbox extends FormGroupElement
{
    protected $view = 'form_group.form_group_checkbox';
    protected $checked = false;
    protected $checkbox = true;

    public function prepareViewOptions($viewOptions)
    {
        if($this->fieldObj !== null && $this->fieldObj->value ){
            $this->checked = true;
        }
        $viewOptions['checked'] = $this->checked;
        return $viewOptions;
    }
}

