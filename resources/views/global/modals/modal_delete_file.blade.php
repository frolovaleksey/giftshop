<div class="modal fade" id="modal_delete_file" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('form.deletion')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {{__('form.ausure_delete_file')}}
            </div>
            <div class="modal-footer">
                {{ Form::open([ 'method'  => 'delete', 'url' => '', 'class' => 'delete_form' ])}}
                {!! Form::hidden('redirect') !!}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('form.cancel')}}</button>
                {{ Form::submit( __('form.delete'), ['class' => 'btn btn-danger']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>