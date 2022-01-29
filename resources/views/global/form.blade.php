<div class="portlet-body form">

    @include('global.errors')

    {{ $slot }}

    {!! FormHelper::unique_token() !!}
    {!! Form::close() !!}

</div>
