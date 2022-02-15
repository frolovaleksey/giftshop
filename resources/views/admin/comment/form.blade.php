<div class="form-body">

    {!! \App\Helpers\FormGroup\Textarea::create('body')->get() !!}

    {!! \App\Helpers\FormGroup\Select::create('rating')
    ->setOptions([1,2,3,4,5])
    ->get() !!}

</div>

@include('global.form_submit')
