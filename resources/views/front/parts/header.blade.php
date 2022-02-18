<header class="header main-header">
    <div class="admin-edit">
        <a href="{{$webItem->getEditUrl()}}" class="front_edit_page">{{__('global.edit_page')}}</a>
    </div>

    <div class="main-header-hold">
        <!-- container start -->
        <div class="container">
            <div class="navbar" role="navigation">
                <div class="row-header">

                    <!-- burger opener start -->
                    <a href="#" data-navigation=""
                       class="navbar-navigation-hamburger visible-sm visible-xs">
                        <span></span>
                    </a>
                    <!-- burger opener end -->

                    <!-- main logo start -->
                    <div class="logo inder">
                        <a href="{{url('/')}}">
                            <img src="{{url('/')}}/assets//main_logo.svg"
                                 alt="{{__('front.logo_title')}}">
                        </a>
                    </div>
                    <!-- main logo end -->

                    @include('front.parts.desktop_header_menu')

                    <!-- mobile menu start -->
                    <div class="wrap-drop-mobile visible-sm visible-xs">
                    </div>

                    @include('front.parts.drop_mobile_menu')

                    @include('front.parts.drop_filter_mobile')

                    @include('front.parts.nav_right_mobile')

                    <!-- mobile menu end -->

                </div>
            </div>
        </div>
        <!-- container end -->

    </div>

    @include('front.parts.desktop_katalog_menu')

</header>
