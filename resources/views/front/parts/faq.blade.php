@if( $repeaterItems = $webItem->getFieldValue('faq') )
    <!-- FAQ -->
    <div class="section_faq" id="stips-internal-product-faq">
        <h2 class="product_text faq">{{__('product.faq_title')}}:</h2>

        @foreach($repeaterItems as $repeaterItem)
            <div class="faq_item">
                <h3 class="faq_item_question">{{$repeaterItem['question']}}</h3>
                <p class="faq_item_answer">
                    {{$repeaterItem['answer']}}
                </p>
            </div>
        @endforeach
    </div>
@endif
