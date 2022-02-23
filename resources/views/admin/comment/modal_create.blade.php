<div class="modal fade" id="add_comment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('comment.add')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['route' => ['comment.store'], 'method' => 'POST', 'class' => 'form-horizontal', 'bb_ajax', 'bb_ajax_callback' => 'gs_comment_save']) !!}
            <div class="form-body">

                {!! \App\Helpers\FormGroup\Textarea::create('body')->get() !!}

                {!! \App\Helpers\FormGroup\Select::create('status')
                ->setOptions(\App\Comment::getStatusesOptions())
                ->get() !!}

                {!! \App\Helpers\FormGroup\Select::create('rating')
                ->setOptions([1,2,3,4,5])
                ->get() !!}

                <input type="hidden" name="model" value="{{get_class($item)}}">
                <input type="hidden" name="model_id" value="{{$item->id}}">
                <input type="hidden" name="parent" value="0">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('form.cancel')}}</button>
                <button type="submit" class="btn btn-danger" >{{__('form.save')}}</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
