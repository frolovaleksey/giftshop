<?php


namespace App\Traits;


trait FullNameTrait
{
    public function getFullNameAttribute()
    {
        return $this->last_name.' '.$this->first_name;
    }
}
