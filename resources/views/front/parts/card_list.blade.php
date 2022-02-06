<?php
$new= true;
?>
@if($new)
<li>
    <a>
            <span data-toggle="collapse" data-target="#cartlist" class="cartnav">
                <i class="fas fa-shopping-cart grey"></i>
                <span id="cart-item-count-bubble">{{\App\Services\Shop\Cart::getItemsCount()}}</span><span class="txt">Košík</span>
            </span>
    </a>
    <div id="cartlist" class="container headslide collapse hide-mobile">
        <div class="row">
            <div class="col-sm-10">
                <p class="est_text">Nakombinujte až 10 ážitků do svého dárkového balíčku – obdarovaný si vybere sám</p>
                <div class="gallery-holder carousel_card">
                    <div class="gallery">
                        <div class="gholder">

                            <div class="gmask-center">
                                <div class="gmask">
                                    <div class="slideset">
                                        @php
                                                $products = \App\Services\Shop\Cart::getProducts();
                                        @endphp

                                        @for($i=0; $i<10; $i++)
                                            @isset($products[$i])
                                                <div class="slide"
                                                    title="{{$products[$i]->getFieldValue('title')}}"
                                                    style="background-image: url('{{$products[$i]->getImage('main_image')->getSyze('cart')}}');"
                                                    >
                                                    <a href="{{route('cart.delete', ['id' => $products[$i]->id])}}">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </div>
                                            @else
                                                <div class="slide">{{$i+1}}</div>
                                            @endisset
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <a class="btn-prev" href="#"><span class="fa fa-angle-left"></span></a>
                            <a class="btn-next" href="#"><span class="fa fa-angle-right"></span></a>

                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 cart">
                <a class="more"
                   href="https://stips.cz/cart/checkout/">
                    <span class="cart-word">Košík</span><br>
                    <span id="cart-highest-price">{{ \App\Services\Shop\Cart::getCartTotal() }}</span>,Kč
                </a>
            </div>
        </div>
    </div>
</li>
@else

<li class="lastItem">
    <a>
            <span data-toggle="collapse" data-target="#cartlist" class="cartnav" aria-expanded="true">
                <i class="fas fa-shopping-cart grey"></i>
                <span id="cart-item-count-bubble">1</span><span class="txt">Košík</span>
            </span>
    </a>
    <div id="cartlist"
         class="container headslide hide-mobile collapse in"
         aria-expanded="true">
        <div class="row">
            <div class="col-sm-10">
                <p class="est_text">
                    Nakombinujte až 10 ážitků do svého dárkového balíčku – obdarovaný si vybere sám</p>
                <div class="lSSlideOuter ">
                    <div class="lSSlideWrapper usingCss">
                        <ul id="headerslider"
                            class="owl-carousel owl-theme lightSlider lsGrab lSSlide"
                            style="width: 1326.25px; height: 74px; padding-bottom: 0%; transform: translate3d(0px, 0px, 0px);">

                            <li class="item product firstItem lslide active"
                                data-position-id="1"
                                title="Vyhlídkový let balonem – starty po celé ČR11"
                                style="background-image: url('{{url('/')}}/temp//Feature_1-150x150.jpg'); width: 124.625px; margin-right: 8px;"
                                data-product_id="56560">
                                <i class="fa fa-times"
                                   onclick="return process2cart(56560, this)"></i>
                            </li>


                            <li class="item lslide"
                                data-position-id="2"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>2</span></li>
                            <li class="item lslide"
                                data-position-id="3"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>3</span></li>
                            <li class="item lslide"
                                data-position-id="4"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>4</span></li>
                            <li class="item lslide"
                                data-position-id="5"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>5</span></li>
                            <li class="item lslide"
                                data-position-id="6"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>6</span></li>
                            <li class="item lslide"
                                data-position-id="7"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>7</span></li>
                            <li class="item lslide"
                                data-position-id="8"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>8</span></li>
                            <li class="item lslide"
                                data-position-id="9"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>9</span></li>
                            <li class="item lastItem lslide"
                                data-position-id="10"
                                style="width: 124.625px; margin-right: 8px;">
                                <span>10</span></li>
                        </ul>
                        <div class="lSAction">
                            <a class="lSPrev">
                                <span class="fa fa-angle-left"></span>
                            </a>
                            <a class="lSNext">
                                <span class="fa fa-angle-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-2 cart">
                <a class="more"
                   href="https://stips.cz/cart/checkout/">
                    <span class="cart-word">Košík</span><br>
                    <span id="cart-highest-price">4190</span>,Kč
                </a>
            </div>
        </div>
    </div>
</li>
@endif
