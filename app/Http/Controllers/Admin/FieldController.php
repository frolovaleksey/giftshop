<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Http\Controllers\Controller;
use App\Media;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    public function getFields(Request $request, $type, $id=null)
    {
        $obj = $request->obj;

        if($id===null){
            $page = new $obj();
        }else{
            $page = $obj::find($id);
        }

        $page->template = $request->tpl;
        return $page->renderFields();
    }

    public function destroyMediaField($id)
    {
        $field = Field::findOrFail($id);
        $media = Media::findOrFail($field->value);


        $media->delete();
        $field->delete();

        return back();
    }
}
