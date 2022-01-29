<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'], false ) !!}
    <div class="col-md-4">
        <div class="input-group">
            <span class="input-group-addon">
                {{$prefix}}
            </span>
            {!! Form::tel($name, null, ['class' => 'form-control']) !!}
        </div>
        {!! FormHelper::error($name) !!}
    </div>
    {!! $msg !!}
</div>