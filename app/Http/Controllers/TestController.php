<?php

namespace App\Http\Controllers;

use App\Field;
use App\FieldRelation;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $field = Field::find(101);
        $relations = $field->fieldRelations;

        /*
        $FieldRelation = FieldRelation::find(1);
        $fieldRelatable = $FieldRelation->relatable;
*/
        dd($relations);

        return view('test');
    }
}
