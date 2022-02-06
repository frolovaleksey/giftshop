<?php include('head.php'); ?>

<body id="body" class="scroll_block theme-stips">

<div id="st-container" class="st-container">
    <div class="st-pusher" style="min-height: 927px;">
        <div class="st-content">
            <div class="st-content-inner">
                <div class="page-wrapper fixNav-enabled">

                    <div class="header-wrapper">
                        <?php include('header.php'); ?>
                    </div>

                    <div itemscope="" itemtype="http://schema.org/Product" class="container container-preset-inside">
                        <div class="page-content sidebar-position-right sidebar-mobile-bottom">

                            <div class="stips-image-cover-layer"
                                 style="background-image:url('temp/Feature_1.jpg')">
                            </div>

                            <div class="stips-product-info-overlay hide-mobile">
                                <div class="container">
                                    <?php include('product_short_description.php'); ?>

                                    <?php include('product_short_price.php'); ?>
                                </div>
                            </div>

                            <div class="single-product-default product">
                                <div class="row">

                                    <?php include('product_modals.php'); ?>

                                    <?php include('product_predescription_mobile.php'); ?>

                                    <div class="col-md-12 product-content scroll-fixed-content">
                                        <div class="tabs tabs-default">
                                            <div class="row">
                                                <div class="col-md-9 col-xs-12" id="internal-product-main-content">

                                                    <?php include('product_tabs.php'); ?>

                                                    <?php include('product_spec.php'); ?>

                                                    <?php include('product_text.php'); ?>

                                                    <?php include('galery.php'); ?>

                                                    <?php include('faq.php'); ?>

                                                    <?php include('product_map.php'); ?>

                                                </div>

                                                <?php include('right_sidebar.php'); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php include('feautured_products.php'); ?>

                </div> <!-- st-container -->

                <?php include('footer.php'); ?>

            </div>
        </div>
    </div>
</div>


</body>
</html>
