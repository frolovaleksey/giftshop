<?php


namespace App\Helpers\FormGroup;


class FormGroup
{
    public static function select($name)
    {
        return new Select($name);
    }
}
