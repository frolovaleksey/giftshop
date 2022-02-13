@php
$relatedProductByTax = $webItem->getRelatedProductByTax();
@endphp
@if($relatedProductByTax->count())
<!-- Varianty related productu -->
<div class="varianty" id="tab_additional_information">
    <h2 class="product_darkobox">{{__('product.other_variants_of_experiences')}}</h2>
    <div class="sort-block">
        <ul class="sort-block__heading">
            <li>Název</li>
            <li class="descending"><i class="fas fa-chevron-down"></i>{{__('product.location')}}</li>
            <li class="descending"><i class="fas fa-chevron-down"></i>{{__('product.number_of_persons')}}</li>
            <li class="descending"><i class="fas fa-chevron-down"></i>{{__('product.time')}}</li>
            <li class="descending"><i class="fas fa-chevron-down"></i>{{__('product.price')}}</li>
        </ul>

        @foreach ($relatedProductByTax as $relProduct)

        <ul class="sort-block__body">
            <li>
                <ul>
                    <li>
                        <a target="_blank" class="tenhpm2t" href="{{$relProduct->getUrl()}}">
                            {{$relProduct->getFieldValue('title')}}
                        </a>
                    </li>

                    <li data-sort-value="{{$relProduct->getFieldValue('number_of_persons')}}">
                        <a target="_blank" class="tenhpm2t" href="{{$relProduct->getUrl()}}">
                             <span title="{{$relProduct->getFieldValue('cities')}}">
                            <i class="fas fa-map-marker-alt"></i> maplocations_1 TODO</span>
                        </a>
                    </li>

                    <li data-sort-value="{{$relProduct->getFieldValue('number_of_persons')}}">
                        <a target="_blank" class="tenhpm2t" href="{{$relProduct->getUrl()}}">
                            <i class="fas fa-user-circle"></i> {{$relProduct->getFieldValue('number_of_persons')}}
                        </a>
                    </li>

                    <li data-sort-value="{{$relProduct->getFieldValue('hours')}}">
                        <a target="_blank" class="tenhpm2t" href="{{$relProduct->getUrl()}}">
                            <i class="fas fa-clock"></i> {{$relProduct->getFieldValue('hours')}}
                        </a>
                    </li>

                    <li data-sort-value="{{$relProduct->getClientPrice()}}">
                        <b class="sort-block__price">
                            <a target="_blank" class="tenhpm2t" href="{{$relProduct->getUrl()}}">
                                @if( $relProduct->getSalePrice() !== null )
                                    <del>{{$relProduct->getRegularPrice() }}</del> {{$relProduct->getSalePrice() }}
                                @else
                                    {{$relProduct->getRegularPrice() }}
                                @endif
                                    {{$relProduct->saleCurrency() }}
                            </a>
                        </b>
                    </li>
                </ul>
            </li>
        </ul>
        @endforeach
    </div>
</div>
@endif
