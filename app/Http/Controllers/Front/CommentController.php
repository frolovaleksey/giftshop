<?php


namespace App\Http\Controllers\Front;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends FrontController
{
    public function getListComments(Request $request, $modelType, $modelId)
    {
        switch ($modelType){
            case 'product':
                $model = Product::find($modelId);
            break;
        }

        $comments = $model->comments()->paginate(10)->withPath(route('comment.front.get_list', ['modelType' => $modelType, 'modelId' => $modelId]) );

        return view('front.comment.list', ['comments' => $comments]);
    }
}
