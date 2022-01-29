@extends('main_tpl')

@section('title', $page_title)

@section('content')

        @include('global.add_new')

        <div bb-sort_block bb-url="{{Request::Url()}}">

            @include('global.searchrow')

            @yield('table_all')

            @include('global.pagination')
        </div>

@endsection
