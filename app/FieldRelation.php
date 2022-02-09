<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldRelation extends Model
{
    public function relatable()
    {
        return $this->morphTo();
    }
}
