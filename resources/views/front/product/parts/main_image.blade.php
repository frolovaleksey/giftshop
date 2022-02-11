@php $videolink = $webItem->getFieldValue('video'); @endphp
@if($videolink)
    @isMobile
        <div class="stips-image-cover-layer" style="background-image:url( '{{$webItem->getImage('main_image')->url('woocommerce_thumbnail')}}')" >
    @else
        <div class="stips-image-cover-layer" style="background-image:url('{{$webItem->getImage('main_image')->url()}}')" >
    @endif
       <a class="icon_play_video" data-fancybox="true" href="https://www.youtube.com/watch?v={{$videolink}}">YouTube video</a>
    </div>
@else
    <div class="stips-image-cover-layer"
         @isMobile
            style="background-image:url('{{$webItem->getImage('main_image')->url('woocommerce_thumbnail')}}')"
         @else
            style="background-image:url('{{$webItem->getImage('main_image')->url()}}')"
        @endif
    >
    </div>
@endif
