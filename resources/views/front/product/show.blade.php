@extends('front.base_page_tpl')

@section('content')
    <div itemscope="" itemtype="http://schema.org/Product" class="container container-preset-inside">
        <div class="page-content sidebar-position-right sidebar-mobile-bottom">

            @include('front.product.parts.schema_org')

            @include('front.product.parts.main_image')

            <div class="stips-product-info-overlay hide-mobile">
                <div class="container">
                    @include('front.product.parts.product_short_description')

                    @include('front.product.parts.product_short_price')
                </div>
            </div>

            <div class="single-product-default product">
                <div class="row">

                    @include('front.product.parts.product_modals')

                    @include('front.product.parts.product_predescription_mobile')

                    <div class="col-md-12 product-content scroll-fixed-content">
                        <div class="tabs tabs-default">
                            <div class="row">
                                <div class="col-md-9 col-xs-12" id="internal-product-main-content">

                                    @include('front.product.parts.product_tabs')

                                    @include('front.product.parts.product_spec')

                                    @include('front.product.parts.product_text')

                                    @include('front.parts.galery')

                                    @include('front.parts.faq')

                                    @include('front.product.parts.product_map')

                                </div>

                                @include('front.product.parts.right_sidebar')

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('front.product.parts.feautured_products')

@endsection
