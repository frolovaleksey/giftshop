@notMobile
<div class="product_mid_sec hide-mobile">
    <span><i class="fa fa-user s-icons-main-product" aria-hidden="true"></i> {{ $webItem->getFieldValue('number_of_persons') }}</span>
    <span><i class="far fa-clock s-icons-main-product" aria-hidden="true"></i> {{ $webItem->getFieldValue('hours') }}</span>
    <span><i class="fas fa-credit-card s-icons-main-product" aria-hidden="true"></i>
	{{__('product.valid_till')}} {{$webItem->expired_date->format('d.m.Y')}}</span>
</div>
@endif
