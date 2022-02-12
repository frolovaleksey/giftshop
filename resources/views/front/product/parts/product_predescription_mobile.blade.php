<div class="product-pre-description hide-tablet hide-desktop">
    <h1 class="product-pre-description-header">{{$webItem->getFieldValue('title')}}</h1>

    <div class="product-pre-description-stars product-summary-stars">
        @for ($i = 1; $i <= $webItem->review()->stars; $i++)
            <img src="{{url('/')}}/assets/starsingle.png" alt="img">
        @endfor
    </div>

    @include('front.product.parts.header_cart_mobile')

    <div class="product-pre-description-body">
        <div>{!! $webItem->getFieldValue('short_description') !!}</div>

        <div class="product_mid_sec">
            <span>
                <i class="fa fa-user s-icons-main-product" aria-hidden="true"></i> {{ $webItem->getFieldValue('number_of_persons') }}
            </span>
            <span>
                <i class="far fa-clock s-icons-main-product" aria-hidden="true"></i> {{ $webItem->getFieldValue('hours') }}
            </span>
            <span>
                <i class="fas fa-credit-card s-icons-main-product" aria-hidden="true"></i> {{__('product.valid_till')}} {{$webItem->expired_date->format('d.m.Y')}}
            </span>
            <span>
                <i class="fa fa-user-plus s-icons-main-product" aria-hidden="true"></i> {{__('product.bought')}} {{$webItem->getBuyCount()}}x
            </span>
        </div>
    </div>
</div>
