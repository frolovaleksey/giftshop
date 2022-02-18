<?php


namespace App\Http\Controllers\Admin;


use App\Comment;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use http\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CommentController extends AdminController
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
        $comment->date = Carbon::now();
        $comment->save();
    }

    public function edit($id)
    {
        $item = Comment::findOrFail( $id );

        $view_options = [
            'item' => $item,
            'page_title' => __('comment.edit'),
        ];
        return view('admin.comment.edit', $view_options);
    }

    public function update(Request $request, $id)
    {
        //self::test();
        $comment = Comment::findOrFail( $id );

        $this->validate($request, [
            'body' => 'required'
        ]);

        $comment->body = $request->body;
        $comment->rating = $request->rating;

        $comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $item = Comment::findOrFail($id);
        $item->delete();
        return redirect()->to(url()->previous().'#tab_comments');
    }
}
