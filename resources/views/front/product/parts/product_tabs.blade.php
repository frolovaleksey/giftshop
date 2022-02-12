<div class="row hide-mobile" id="present-single-tabs">
    <div class="col-xs-12">
        <ul class="tabs-nav">
            <li class="firstItem">
                <a href="#tab_additional_information"
                   class="anchor-link tab-title">{{__('product.variants')}}</a>
            </li>
            <li>
                <a href="#sec_1" class="anchor-link tab-title">{{__('product.evaluation')}}</a>
            </li>
            <li>
                <a href="#maploc" class="anchor-link tab-title">{{__('product.venue')}}</a>
            </li>
            <li>
                <a id="tab_9" class="anchor-link tab-title">
                    <span class="fa fa-eye s-icons-main-product"> </span>
                    {{$webItem->getViewsCount()}} {{__('product.views')}}
                </a>
            </li>
            <li class="lastItem">
                <a href="#galerie" class="anchor-link tab-title">{{__('product.gallery')}}</a>
            </li>

            @if( $webItem->getFieldValue('faq')->count() > 0 )
            <li>
                <a href="#stips-internal-product-faq"
                   class="anchor-link tab-title">{{__('product.faq')}}</a>
            </li>
            @endif
        </ul>
    </div>
</div>
