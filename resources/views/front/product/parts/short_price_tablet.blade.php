<div class="stips-product-short-price-tablet visible-sm visible-xs">

    <div class="row">
        <div class="stips-product-short-price-tablet-left col-md-6 col-sm-6 col-xs-12">
            <div class="stips-product-short-price-tablet-number-ordered">
                <i class="fa fa-user-plus s-icons-main-product"
                   aria-hidden="true"></i> {{__('product.bought')}} {{$webItem->getBuyCount()}}x
            </div>
            <!-- /.stips-product-short-price-tablet-numbered-ordered -->
        </div>



        <div class="stips-product-short-price-tablet-right col-md-6 col-sm-6 col-xs-12 text-center">
            @if( ShopHelper::isСardholder() )
                @if($webItem->onSale())
                    <div class="stips-product-short-price-tablet-amount">{{$webItem->getSalePrice()}} {{$webItem->saleCurrency()}}
                    </div>
                    <div class="footer-product-price-regular-single">
                        <del>{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</del>
                    </div>
                @else
                    <div class="stips-product-short-price-tablet-amount">{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</div>
                @endif
            @endif


            <!-- /.stips-product-short-price-tablet-amount -->
            <div class="stips-product-short-price-tablet-button">
                @if(\App\Services\Shop\Cart::hasProduct($webItem))
                <a href="#" class="btn-primary btn-block added-to-cart">
                    {{__('product.bought')}}
                </a>
                @else

                @endif
                <i class="small"> Kód: hl-56560</i>
            </div>
            <!-- /.stips-product-short-price-tablet-button -->
        </div>
    </div>
</div>
<!-- /.stips-product-short-price-tablet -->
