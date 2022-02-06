<div class="side_first">
    <h2 class="stips-header">Hodnocení zážitku</h2>
    <div class="product-summary">
        <div class="product-summary-stars">
            <img src="{{url('/')}}/assets//starsingle.png"
                 alt="img">
            <img src="{{url('/')}}/assets//starsingle.png"
                 alt="img">
            <img src="{{url('/')}}/assets//starsingle.png"
                 alt="img">
            <img src="{{url('/')}}/assets//starsingle.png"
                 alt="img">
            <img src="{{url('/')}}/assets//starsingle.png"
                 alt="img">
        </div>

        <div class="product-summary-price">
            <div class="price-discount">
                <del>4500 Kč</del>
            </div>
            <div class="product-price">4190 Kč</div>
        </div>
    </div>

    <a class="sidebar-widget-button add_to_cart" href="{{ route('cart.add', ['id'=>$webItem->id]) }}" >
        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
        Vložit do košíku
    </a>

    <span class="sidebar-widget-button">Vloženo</span>
</div>
