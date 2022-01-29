@include('main_tpl_head')

<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">

    <!-- BEGIN PAGE CONTENT -->
    <div class="page-content">
        <div class="container-fluid">

            <!-- BEGIN PAGE CONTENT INNER -->
            <div class="row">
                <div class="col-md-12">

                    <div class="portlet light">

                        <div class="portlet-title">
                            <div class="caption">
                                <span class="caption-subject font-green-sharp bold uppercase">@yield('title')</span>
                            </div>
                        </div>

                        <div class="portlet-body">
                        @yield('content')
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- END PAGE CONTENT -->

</div>


@include('main_tpl_footer')
