@notMobile
<!--Right Sidebar -->
<div class="col-md-3 col-xs-12 hide-mobile hide-tablet"
     id="internal-product-sidebar">
    <div class="sticky-wrap-js_slide_third">
        <div class="js_slide_third">

            @include('front.product.parts.raitng')

            @php
            // @include('front.product.parts.modal_product_request')
            @endphp

            @include('front.product.parts.related_products')

        </div>
    </div>
</div>
@endif
