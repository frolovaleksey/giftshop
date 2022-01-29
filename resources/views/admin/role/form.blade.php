<div class="form-body">

    {!! FormHelper::form_group( 'name', 'text', __('global.name') )!!}

</div>

@include('global.form_submit', ['cancel_url'=>route('users.index')])