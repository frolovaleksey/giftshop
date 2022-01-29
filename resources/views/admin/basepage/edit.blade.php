@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::model($item, ['route' => [$item::getBaseRoute().'.update', $item], 'method' => 'PUT', 'class' => 'form-horizontal node_form']) !!}

        @include($item::getBaseViewFolder().'.form')

    @endcomponent

@endsection
