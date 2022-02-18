@if( $upsellProducts =  $webItem->getFieldValue('upsell_product') )
<div class="slide_third">
    <div class="slide_third--header">{{__('product.you_might_interested')}}:
        <i class="fa fa-caret-down" aria-hidden="true"></i>
    </div>
    <div class="upsells">

        @foreach($upsellProducts as $upsellProduct)
            <div class="slide_innercet">
                <a href="{{$upsellProduct->getUrl()}}" class="slide_cet1" style="background-image:url('{{$upsellProduct->getImage('main_image')->url('woocommerce_thumbnail')}}')">
                    <div class="cet_text">
                        <h3>{{$upsellProduct->getFieldValue('title')}}</h3>
                        @if( !empty($upsellProduct->getSalePrice()) )
                            <p><span>
                                    <del>{{$upsellProduct->getRegularPrice()}} {{$upsellProduct->saleCurrency()}}</del>
                                </span>{{$upsellProduct->getSalePrice()}} {{$upsellProduct->saleCurrency()}}
                            </p>
                        @else
                            <p>{{$upsellProduct->getRegularPrice()}} {{$upsellProduct->saleCurrency()}}</p>
                        @endif
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
@endif
