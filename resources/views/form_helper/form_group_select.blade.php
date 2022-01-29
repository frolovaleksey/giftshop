<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'], false ) !!}
    <div class="col-md-4">
        {!!Form::select($name, $select_options, $value, $parametres )!!}
        {!! FormHelper::error($name) !!}
    </div>
    {!! $msg !!}
</div>
