@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::open(array('route' => array('roles.store'), 'method' => 'POST', 'class' => 'form-horizontal')) !!}

        @include('admin.role.form')

    @endcomponent

@endsection