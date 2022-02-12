<div class="stips-product-short-price visible-md visible-lg">
    @if( ShopHelper::isСardholder() )
            @if( $webItem->onSale() )
                <div class="price-discount">
                    <del>{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</del>
                </div>
                <div class="stips-product-short-price-amount">
                    {{$webItem->getSalePrice()}} {{$webItem->saleCurrency()}}
                </div>
            @else
                <div class="stips-product-short-price-amount">{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</div>
            @endif
    @endif

    <!-- /.stips-product-short-price-amount -->
        <div class="stips-product-short-price-button">
            @include('front.product.parts.add_to_cart_button')
        </div>
    <!-- /.stips-product-short-price-button -->

    <div class="stips-product-short-price-number-ordered">
            <i class="fa fa-user-plus s-icons-main-product" aria-hidden="true"></i> {{__('product.bought')}} {{$webItem->getBuyCount()}}x
            @if( $sku = $webItem->getSku() )
                <br> <i class="small"> {{__('product.sku')}}: {{$sku}}</i>
            @endif
    </div>
    <!-- /.stips-product-short-price-numbered-ordered -->

</div>
