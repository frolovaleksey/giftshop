@extends('global.index')

@section('table_all')

    @include($nodeObj::getBaseViewFolder().'.table')

@endsection
