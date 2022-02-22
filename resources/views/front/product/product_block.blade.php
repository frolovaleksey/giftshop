@php
$classes = '';

if(isset($first)){
    $classes .= 'first ';
}

if(isset($last)){
    $classes .= 'last ';
}

$classes .= 'col-md-6 col-xs-12';

if( Cart::hasProduct($product) ) {
    $classes .= ' added-to-cart ';
}
@endphp

<div class="product {{$classes}}">

    <div class="content-product">

        <div class="product-title">
            <h2 class="product-title-parent">
                <a class="product-title-parent-link" href="{{$product->getUrl()}}">{{$product->getFieldValue('title')}}</a>
                <a href="#" class="product-title-parent-link-description hide-tablet hide-desktop"><i class="fa fa-question-circle" aria-hidden="true"></i></a>
            </h2>
        </div>

        <div class="product-image-wrapper product-is-on-sale product-best-price hover-effect-disable">

            <a class="product-content-image"
               href="{{$product->getUrl()}}"
               style="background-image:url('{{$product->getImage('main_image')->url('woocommerce_thumbnail')}}')">

                @if( $product->onSale() )
                <div class="stips-badge stips-badge-sale">{{__('product.action')}}</div>
                @endif

                @if( $product->isHot() )
                <div class="stips-badge stips-badge-hot"><i class="fa fa-fire hot" aria-hidden="true"></i>{{__('product.hot')}}</div>
                @endif

                @if ( $product->isBestseller() )
                <div class="stips-badge stips-badge-bestseller">{{__('product.bestseller')}}</div>
                @endif

                @if( $product->hasBestPrice() )
                <div class="stips-badge stips-badge-best-price">{{__('product.best_price')}}</div>
                @endif
            </a>

            <!-- /.post-cover -->
            <a href="{{$product->getUrl()}}" class="product-short-description-wrap">
                <div class="product-short-description">
                    <ul class="product-short-description-features">
                        @if ( $numberOfPersons = $product->getFieldValue('number_of_persons') )
                        <li class="stips-product-short-description-body-person firstItem">
                            {{$numberOfPersons}}
                        </li>
                        @endif
                        @if ( $hours = $product->getFieldValue('hours') )
                        <li class="stips-product-short-description-body-time">
                            {{$hours}}
                        </li>
                        @endif
                        <li class="stips-product-short-description-body-pay lastItem">
                            {{__('product.valid_till')}} {{$product->expired_date->format('d.m.Y')}}
                        </li>
                    </ul>


                    @if( $cities = $product->getFieldValue('cities') )
                    <p class="stips-product-location"><i class="fa fa-map-marker s-icons-hover" aria-hidden="true"></i> {{trim($cities)}}</p>
                    @endif

                    @if( $singleProductDescription = $product->getFieldValue('single_product_description') )
                        <strong>{{__('product.package_includes')}}:</strong>
                        <ul>
                            @foreach( explode( '|', $singleProductDescription ) as $descItem )
                            <li>{{$descItem}}</li>
                            @endforeach
                       </ul>
                    @endif
                </div>
            </a>


            <footer class="footer-product">
                <div class="footer-product-left">

                    <div class="footer-product-gifted-count">
                         {{__('product.bought')}} {{$product->getBuyCount()}}x
                    </div>

                    @if ($product->onSale())
                    <div class="footer-product-price-sale">{{$product->getSalePrice()}} {{$product->saleCurrency()}}</div>
                    <div class="footer-product-price-regular">
                        <del>{{$product->getRegularPrice()}} {{$product->saleCurrency()}}</del>
                    </div>
                    @else
                    <div class="footer-product-price-regular footer-product-price-regular-no-sale">{{$product->getRegularPrice()}} {{$product->saleCurrency()}}</div>
                    @endif
                </div>

                <div class="footer-product-right">
                    @if ( Cart::hasProduct($product) )
                        <span class="btn-custom-full">{{__('product.in_cart')}}</span>
                    @else
                        <a href="{{ route('cart.add', ['id'=>$product->id]) }}"  class="add_to_cart_button">{{__('product.add_to_cart')}}</a>
                    @endif
                </div>

            </footer>
        </div>

    </div>
</div>
