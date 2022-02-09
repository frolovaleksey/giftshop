<?php
$attr = '';
foreach ($parametres as $parametrName => $parametrValue ){
    $attr.=' '.$parametrName."='".$parametrValue."'";
}
?>
<div class="form-group {{ $errors->has($errorKey) ? 'has-error' : ''}}">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'], false ) !!}
    <div @if($thirdCol !== null) class="col-md-4" @else class="col-md-8"> @endif

        <select name="{{$name}}" {!! $attr !!}>
            @foreach($selected_options as $optionId => $optionValue)
            <option selected value="{{$optionId}}">{{$optionValue}}</option>
            @endforeach
        </select>

        {!! FormHelper::error($errorKey) !!}
    </div>
    {!! $msg !!}

    @if($thirdCol !== null)
        <div class="col-md-4">
            {!! $thirdCol !!}
        </div>
    @endif

</div>
