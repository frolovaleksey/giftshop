<?php


namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function getTableComments(Request $request)
    {
        if( !isset($request->sg['model']) || !isset($request->sg['model_id']) ){
            return;
        }

        $model = $request->sg['model'];
        $obj = $model::findOrFail($request->sg['model_id']);

        $query = $obj->comments();

        $items = null;
        if( $request->ajax() ){
            $items = $query->paginate( $this->perPage );
        }

        $view_options = [
            'items' => $items,
        ];

        if( $request->ajax() ){
            $result = view('admin.comment.table', $view_options) . view('global.pagination', $view_options);
            return $result;
        }
    }

    public function store(Request $request)
    {
        if( !isset($request->model) || !isset($request->model_id) ){
            return;
        }

        $this->validate($request, [
            'body' => 'required'
        ]);

        $model = $request->model;
        $obj = $model::findOrFail($request->model_id);

        $comment = new Comment();
        $comment->commentable_id = $request->model_id;
        $comment->commentable_type = $request->model;
        $comment->body = $request->body;
        $comment->parent = $request->parent;
        $comment->rating = $request->rating;
        $comment->user_id = Auth::user()->id;
        $comment->save();
    }
}
