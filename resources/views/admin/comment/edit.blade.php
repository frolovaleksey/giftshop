@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @component('global.form')

        {!! Form::model($item, ['route' => ['comment.update', $item], 'method' => 'PUT', 'class' => 'form-horizontal' ]) !!}

        @include('admin.comment.form')

    @endcomponent


@endsection
