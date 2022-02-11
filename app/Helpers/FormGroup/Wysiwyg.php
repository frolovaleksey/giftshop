<?php


namespace App\Helpers\FormGroup;


class Wysiwyg extends FormGroupElement
{
    protected $view = 'form_group.form_group_wysiwyg';

    public function prepareViewOptions($viewOptions)
    {
        $viewOptions['parametres']['class'] = $viewOptions['parametres']['class'] .' summernote';
        return $viewOptions;
    }
}

