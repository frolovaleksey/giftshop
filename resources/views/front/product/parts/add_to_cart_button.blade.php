@if ( Cart::hasProduct($webItem) )
    <a href="#" class="btn-primary btn-block added-to-cart" >{{__('product.in_cart')}}</a>
@else
    <a class="btn-primary btn-block" href="{{ route('cart.add', ['id'=>$webItem->id]) }}" >
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        {{__('product.add_to_cart')}}
    </a>
@endif
