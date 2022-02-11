<div class="stips-product-short-description">
    <h1 itemprop="name" class="stips-product-short-description-header">{{$webItem->getFieldValue('title')}}</h1>
    <div class="stips-product-short-description-body">
        <div itemprop="description" class="short-description <?php echo (mb_strlen($webItem->getFieldValue('short_description'), 'utf-8') >= 400 ? 'short-description-too-long' : '') ?>">
             {!! $webItem->getFieldValue('short_description') !!}
        </div>
        <ul class="stips-product-short-description-body-features">
            <li class="stips-product-short-description-body-person firstItem">
                {{$webItem->getFieldValue('number_of_persons')}}
            </li>
            <li class="stips-product-short-description-body-time">
                {{$webItem->getFieldValue('hours')}}
            </li>
            <li class="stips-product-short-description-body-pay lastItem">
                {{__('product.valid_till')}} {{$webItem->expired_date->format('d.m.Y')}}
            </li>
        </ul>

        @include('front.product.parts.short_price_tablet')

    </div>
</div>
