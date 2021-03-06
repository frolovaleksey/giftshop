@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::open(['route' => [$item::getBaseRoute().'.store'], 'method' => 'POST', 'files' => true, 'class' => 'form-horizontal node_form']) !!}

        @include($item::getBaseViewFolder().'.form')

    @endcomponent

    @include('admin.comment.modal_create')
@endsection
