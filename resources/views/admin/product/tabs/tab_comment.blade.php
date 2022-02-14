<?php
$comments = $item->comments;
?>

<div bb-sort_block bb-url="{{route('comment.get_table')}}" id="admin_comment_table">
    <div class="table-scrollable">
        @include('admin.comment.table')

        @include('global.pagination')
    </div>
    <input type="hidden" name="model" bb-sg value="{{get_class($item)}}">
    <input type="hidden" name="model_id" bb-sg value="{{$item->id}}">
</div>


<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_comment">
    Add comment
</button>
