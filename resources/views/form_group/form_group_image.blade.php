<div class="form-group {{ $errors->has($errorKey) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'], false ) !!}
        <div @if($thirdCol !== null) class="col-md-4" @else <div class="col-md-8"> @endif
        @if($value !== null )
            @php
                $media = \App\Media::find($value);
            @endphp
            <div class="file_holder">
                <img src="{{$media->getUrl()}}" alt="{{$media->alt}}" title="{{$media->title}}" height="50" />
                <a href="#" title="{{__('form.delete')}}" data-toggle="modal" data-target="#modal_delete" data-del_url="{{route('field.destroy_media_field', $fieldObj->id)}}">
                    <span aria-hidden="true" class="icon-trash"></span>
                </a>
            </div>
            <div class="field_holder hidden">
                {!! Form::file($name, null, $parametres) !!}
            </div>
        @else
            {!! Form::file($name, $value, $parametres) !!}
        @endif
            {!! FormHelper::error($errorKey) !!}
        </div>
        {!! $msg !!}
        @if($thirdCol !== null)
            <div class="col-md-4">
                {!! $thirdCol !!}
            </div>
        @endif
</div>
