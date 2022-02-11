<?php


namespace App\Helpers\FormGroup;


class Date extends FormGroupElement
{
    protected $view = 'form_group.form_group_input';

    public function prepareViewOptions($viewOptions)
    {
        $value = null;
        if($this->filableItem !== null){
            $name = $this->name;
            if( $this->filableItem->$name !== null) {
                $value = $this->filableItem->$name->format('d.m.Y');
            }
        }

        $viewOptions['parametres']['class'] = $viewOptions['parametres']['class'] .' input-inline date-picker input-small';
        $viewOptions['data-date-format'] = 'dd.mm.yyyy';
        $viewOptions['value'] = $value;
        return $viewOptions + ['fieldType' => 'text'];
    }
}
