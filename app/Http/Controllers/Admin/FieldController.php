<?php

namespace App\Http\Controllers\Admin;

use App\Field;
use App\Http\Controllers\Controller;
use App\Media;
use App\Node;
use Illuminate\Http\Request;

class FieldController extends AdminController
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

    public function getRepeaterFields(Request $request, $type, $id=null)
    {
        $obj = $request->obj;

        if($id===null){
            $page = new $obj();
        }else{
            $page = $obj::find($id);
        }

        return $page->renderRepeaterBlock($type);
    }

    public function getRelationOptions(Request $request, $model, $field, $id=null)
    {
        $modelName = 'App\\' . $model;

        if( $id === null ){
            $obj = new $modelName();
        }else{
            $obj = $modelName::find($id);
        }

        if($obj === null ){
            Response::json([
                'error'
            ], 500);
        }

        $tplField = $obj->getTemplateField($field);

        $page = 1;
        if($request->has('page')){
            $page = $request->page;
        }
        $relatedModels = $tplField->findRelatedModels($request->q, $page);

        $items = [];
        foreach ($relatedModels as $relatedModel){
            $items[] = [
                'id' => $relatedModel->filabletable_id,
                'title' => $relatedModel->value
            ];
        }

        $result = [
            'total_count' => $relatedModels->count(),
            'incomplete_results' => !$relatedModels->hasMorePages(),
            'items' => $items,
        ];

        return json_encode($result);
    }
}
