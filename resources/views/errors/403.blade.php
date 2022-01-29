@php
    $page_title = '403 Forbidden';
@endphp

@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @include('row', [
    'title' => '403',
    'body' => __($exception->getMessage() ?: 'Forbidden')
    ])

@endsection
