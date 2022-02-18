<div class="side_first">
    <h2 class="stips-header">{{__('product.experience_evaluation')}}</h2>
    <div class="product-summary">
        <div class="product-summary-stars">
            @for($i=0; $i<$webItem->review()->stars; $i++)
            <img src="{{url('/')}}/assets//starsingle.png" alt="img">
            @endfor
        </div>

        @if(  $webItem->onSale() )
        <div class="product-summary-price">
            <div class="price-discount">
                <del>{{$webItem->getRegularPrice()}} {{$webItem->saleCurrency()}}</del>
            </div>
            <div class="product-price">{{$webItem->getSalePrice()}} {{$webItem->saleCurrency()}}</div>
        </div>
        @endif
    </div>

    @if ( Cart::hasProduct($webItem) )
        <span class="sidebar-widget-button">{{__('product.in_cart')}}</span>
    @else
        <a class="sidebar-widget-button add_to_cart" href="{{ route('cart.add', ['id'=>$webItem->id]) }}" >
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
            {{__('product.add_to_cart')}}
        </a>
    @endif

</div>
