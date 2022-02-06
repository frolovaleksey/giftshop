<header class="header main-header">
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
                        <a href="https://stips.cz/">
                            <img src="assets/main_logo.svg"
                                 alt="Obchod na dárky a zážitky">
                        </a>
                    </div>
                    <!-- main logo end -->

                    <?php include('desktop_header_menu.php'); ?>

                    <!-- mobile menu start -->
                    <div class="wrap-drop-mobile visible-sm visible-xs">
                    </div>

                    <?php include('drop_mobile_menu.php'); ?>

                    <?php include('drop_filter_mobile.php'); ?>

                    <?php include('nav_right_mobile.php'); ?>
                    <!-- mobile menu end -->

                </div>
            </div>
        </div>
        <!-- container end -->

    </div>

    <?php include('desktop_katalog_menu.php'); ?>

</header>
