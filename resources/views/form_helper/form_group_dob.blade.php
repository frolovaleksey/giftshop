<div class="form-group @if($errors->has('DOB_d') || $errors->has('DOB_m') || $errors->has('DOB_y')) has-error @endif ">
    {!! Form::label('DOB_d', $label, ['class' => 'control-label col-md-3'], false ) !!}
    <div class="col-md-4">
        {!! Form::text( 'DOB_d', $dob_d, ['class' => 'form-control input-inline input-small', 'placeholder' => __('global.day')] ) !!}
        {!! Form::select('DOB_m', [
        '1' => __('global.january'),
        '2' => __('global.february'),
        '3' => __('global.march'),
        '4' => __('global.april'),
        '5' => __('global.may'),
        '6' => __('global.june'),
        '7' => __('global.july'),
        '8' => __('global.august'),
        '9' => __('global.september'),
        '10' => __('global.october'),
        '11' => __('global.november'),
        '12' => __('global.december'),
        ], $dob_m, ['class' => 'form-control input-inline input-small'] ) !!}
        {!! Form::text('DOB_y', $dob_y, ['class' => 'form-control input-inline input-small', 'placeholder' => __('global.year')] ) !!}
        {!! FormHelper::error('DOB_d') !!}
        {!! FormHelper::error('DOB_m') !!}
        {!! FormHelper::error('DOB_y') !!}
    </div>
</div>