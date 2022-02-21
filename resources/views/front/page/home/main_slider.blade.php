<div class="main-slider__wrap">
    @notMobile
    @if( $repeaterItems = $webItem->getFieldValue('gallery') )
    <div class="main-slider">
        @foreach ($repeaterItems as $repeaterItem)
        @php
            $image = new \App\Helpers\ImageHelper($repeaterItem['image'])
        @endphp
        <div class="main-slider__slide">
            <a href="{{$repeaterItem['url']}}" class="main-slider__visual" target="_blank">
                <img src="{{$image->url()}}"/>
            </a>
        </div>
        @endforeach
    </div>
    @endif
    @endif
</div>
