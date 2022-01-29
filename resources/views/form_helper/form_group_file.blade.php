<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'], false ) !!}
    <div class="col-md-4">
        @if( $widget == 'image' || $widget == 'image_delete')
            <img src="{{$file}}" height="50" />
        @else
            <a href="{{$file}}'">{{$file}}</a>
        @endif
        {!! Form::file($name) !!}
            {!! FormHelper::error($name) !!}
        @if( $widget == 'image_delete')
            <div>
                <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-redirect_url="{{route('students.edit', ['id' => $item->id])}}" data-target="#modal_delete_file" data-del_url="{{route('documents.destroy', ['id' => $document->id])}}">
                    <span aria-hidden="true" class="icon-trash"></span>
                </a>
            </div>
        @endif
    </div>
    {!! $msg !!}
</div>