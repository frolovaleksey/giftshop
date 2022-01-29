<div class="form-body">

    {!! FormHelper::form_group( 'name', 'text', __('global.login'), true )!!}

    {!! FormHelper::form_group( 'email', 'text', __('global.email'), true )!!}

    {!! FormHelper::form_group( 'last_name', 'text', __('global.last_name'), true )!!}

    {!! FormHelper::form_group( 'first_name', 'text', __('global.first_name'), true )!!}

</div>

@include('global.form_submit', ['cancel_url'=>route('users.index')])
