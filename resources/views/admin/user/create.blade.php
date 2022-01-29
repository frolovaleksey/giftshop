@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::open(['route' => ['users.store'], 'method' => 'POST', 'class' => 'form-horizontal']) !!}

        @include('admin.user.form')

    @endcomponent

@endsection
