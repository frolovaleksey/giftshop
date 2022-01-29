@include('main_tpl_head')

<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">

    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
    <!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@include('main_tpl_footer')
