<?php


namespace App\Traits;


trait TemplateTrait
{
    //public $templates = [];

    public function hasTemplate()
    {
        return (count($this->templates) > 1);
    }
}
