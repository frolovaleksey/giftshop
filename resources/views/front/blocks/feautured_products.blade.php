<div class="new-blog">

@php
$feauturedProducts = \App\Product::getFeauturedProducts();
@endphp

@if( $feauturedProducts->count() )
    <!-- Featured products -->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="top-products-title">
                        <h4 id="uqs2uexr">{{__('product.top_experiences')}}</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-products">

                        @foreach($feauturedProducts as $feauturedProduct)
                            <div class="featured-post" style="background-image: url('{{$feauturedProduct->getImage('main_image')->url('woocommerce_thumbnail')}}')">

                                <div class="price">
                                    @if($feauturedProduct->getRegularPrice())
                                    <del>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>{{$feauturedProduct->getRegularPrice()}} <span class="woocommerce-Price-currencySymbol">{{$feauturedProduct->saleCurrency()}}
                                                </span>
                                            </bdi>
                                        </span>
                                    </del>
                                    @endif
                                    <ins>
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi>{{$feauturedProduct->getSalePrice()}} <span class="woocommerce-Price-currencySymbol">{{$feauturedProduct->saleCurrency()}}</span></bdi>
                                        </span>
                                    </ins>
                                </div>

                                <a href="{{$feauturedProduct->getUrl()}}"><h3 class="q3nevuup">{{$feauturedProduct->getFieldValue('title')}}</h3></a>
                                <div class="count">{{__('product.bought')}} {{$feauturedProduct->getBuyCount()}}x</div>

                                @if ( Cart::hasProduct($feauturedProduct) )
                                    <a href="#" class="slider-button" >{{__('product.in_cart')}}</a>
                                @else
                                    <a class="slider-button" href="{{ route('cart.add', ['id'=>$feauturedProduct->id]) }}" >
                                        {{__('product.add_to_cart')}}
                                    </a>
                                @endif
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-title">
                        <h4>{{__('product.more_gifts')}}</h4>
                        <a href="{{url('/')}}" class="s6qkpadt">{{__('product.search_here')}}</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Add Arrows -->
@endif

</div>
