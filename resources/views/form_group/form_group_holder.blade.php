<div class="form-group {{ $errors->has($errorKey) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'], false ) !!}
    <div @if($thirdCol !== null) class="col-md-4" @else class="col-md-8"> @endif

        {!! $fieldView !!}

        {!! FormHelper::error($errorKey) !!}
    </div>
    {!! $msg !!}

    @if($thirdCol !== null)
        <div class="col-md-4">
            {!! $thirdCol !!}
        </div>
    @endif

</div>
