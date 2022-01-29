@php
$page_title = '404 Not Found';
@endphp

@extends('main_tpl')

@section('title', $page_title)

@section('content')

    @include('row', [
    'title' => '404',
    'body' => __('Not Found')
    ])

@endsection
