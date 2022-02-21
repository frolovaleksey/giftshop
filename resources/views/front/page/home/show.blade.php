@extends('front.base_page_tpl')

@section('content')

<div class="container">
    <div class="page-content sidebar-position-left responsive-sidebar-bottom">
        <div class="row">
            <div class="content main-products-loop col-lg-12 media-full">

                @include('front.page.home.main_slider')

                @include('front.page.home.filter')

                @include('front.page.home.orderby')

                @include('front.page.home.gift_modals')

                @include('front.page.home.products')

                @include('front.page.home.bottom')

            </div>
        </div>
    </div>
</div>

@endsection
