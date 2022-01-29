<div class="modal fade" id="modal_comment" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__('form.comment_edit')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {{ Form::open([ 'method'  => 'put', 'url' => '/', 'class' => 'comment_form' ])}}
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::textarea( 'comment', null, ['class' => 'comment form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('form.cancel')}}</button>
                {{ Form::submit( __('form.save'), ['class' => 'btn btn-danger']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>