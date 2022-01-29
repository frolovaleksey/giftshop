<div class="form-group {{ $errors->has($name) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'] ) !!}
    <div class="col-md-4">
        <div class="radio-list">
        @foreach($select_options as $key=>$value)
                <label><input name="{{$name}}" type="radio" value="{{$key}}" @if($selected_value==$key) checked @endif > {{$value}}</label>
        @endforeach
        </div>
        {!! FormHelper::error($name) !!}
    </div>
    {!! $msg !!}
</div>