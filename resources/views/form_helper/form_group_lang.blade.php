<div class="form-group">
    {!! Form::label($name, $label, ['class' => 'control-label col-md-3'] ) !!}
    <div class="col-md-4">
        <div class="radio-list">
            <label> {!! Form::radio($name, 'ru', true) !!} <img src="{{url('/')}}/img/icons/ru.png" alt=""> {{__('global.ru')}} </label>
            <label> {!! Form::radio($name, 'en', null) !!} <img src="{{url('/')}}/img/icons/gb.png" alt=""> {{__('global.en')}} </label>
        </div>
    </div>
</div>
