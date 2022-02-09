<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function fieldRelations()
    {
        return $this->hasMany('App\FieldRelation')
            ->with('relatable.fields')
            ->orderBy('order');
    }

}
