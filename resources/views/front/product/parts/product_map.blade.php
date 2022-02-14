<!-- Product map -->
<div class="row" id="stips-internal-product-map">
    <div class="col-xs-12">
        <div class="product_text" id="maploc">
            <h2>{{__('product.place_experience')}} {{$webItem->getFieldValue('title')}}</h2>
            <div class="row">
                <div class="col-md-4 col-sm-5 col-xs-12">
                    <div class="map_left_side">
                        @php
                            $mapkey = $webItem->getFieldValue('cities');
                            $locations = (explode(",", $mapkey));
                            $belolocation = $webItem->getFieldValue('street');
                            $loc = (explode("and", $belolocation));
                        @endphp
                        @foreach ($locations as $key => $val)
                            @php
                              $val2 = $loc[$key];
                            @endphp
                            <div class="map_location_b">
                                <span class="map_location_b_name">
                                    <i class="fa fa-map-marker" aria-hidden="true"></i><a href="https://www.google.com/maps/place/<?= $val2 ?>, <?= $val ?>" target="_blank"> <?= $val; ?></a>
                                </span>
                                <span class="map_location_b_address"><?= $val2; ?></span>
                            </div>
                        @endforeach
                        <div class="map_location_b">
                        </div>
                    </div>
                </div>

                <div class="col-md-8 col-sm-7 col-xs-12">
                    @if( $googlemap = $webItem->getFieldValue('googlemap') )
                        <div class="map_img">
                            {!! $googlemap !!}
                        </div>
                    @else
                        <div class="map_img">
                            <a href="https://www.google.com/maps/place/<?= $val2 ?>, <?= $val ?>" target="_blank"><img src="{{url('/')}}/assets/images/czech-with-magnifying-glass.jpg" alt="czech-with-magnifying-glass"></a>
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</div>
