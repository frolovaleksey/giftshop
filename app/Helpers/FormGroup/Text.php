<?php


namespace App\Helpers\FormGroup;


class Text extends FormGroupElement
{
    protected $view = 'form_group.form_group_input';

    public function prepareViewOptions($viewOptions)
    {
        return $viewOptions + ['fieldType' => 'text'];
    }
}
