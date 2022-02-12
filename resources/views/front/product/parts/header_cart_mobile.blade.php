<div class="stips-mobile-price">
    <div class="row">

        <div class="stips-mobile-price-left col-xs-6">

            <div class="stips-mobile-price-left-dropdown-like">
                <div class="stips-mobile-price-left-dropdown-like-body">
                    @if($webItem->onSale())
                        <div class="footer-product-price-regular-single-mobile">
                            <del>{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</del>
                        </div>
                        <div class="stips-product-short-price-tablet-amount">{{$webItem->getSalePrice()}} {{$webItem->saleCurrency()}} </div>
                    @else
                        <div class="stips-product-short-price-tablet-amount">{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</div>
                    @endif

                </div>
                <div class="stips-mobile-price-left-dropdown-like-arrow-down price-varients"></div>
            </div>
        </div>


        <div class="stips-mobile-price-right col-xs-6 text-center">
            <div class="stips-mobile-price-right-button">

            @include('front.product.parts.add_to_cart_button')

            @if( $sku = $webItem->getSku() )
                <i class="small"> {{__('product.sku')}}: {{$sku}}</i>
            @endif

            </div>
        </div>
    </div>
</div>
