@if( $repeaterItems = $webItem->getFieldValue('gallery') )
    <!-- Galery Popup -->
    <div id="example_id" class="container">
        <div class="modal fade and carousel slide" id="lightbox">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="carousel-inner">
                            @php
                                $images = [];
                                foreach ($repeaterItems->pluck('image') as $mediaItem) {
                                    $images[] = new \App\Helpers\ImageHelper($mediaItem);
                                }
                                $images = collect($images);
                            @endphp

                            @foreach($images as $image)
                                <div class="item @if ($loop->first) active @endif">
                                    <img src="{{$image->url()}}" alt="First slide">
                                </div>
                            @endforeach
                        </div>
                        <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">
                            <span class="fa fa-angle-left next gallery"></span>
                        </a>
                        <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">
                            <span class="fa fa-angle-right next gallery"></span>
                        </a>
                    </div><!-- /.modal-body -->
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div><!-- /.container -->

    <!-- Galery -->
    @if( $images->count() )
    <div class="galery-images">
        <div class="product_text" id="galerie">
            <h2>{{__('product.experience_gallery')}} {{$webItem->getFieldValue('title')}}</h2>
        </div>
        <div class="row">
            <div class="col-xs-12 product-images">
                <div class="product_slider">
                    @foreach($images as $image)
                    <div class="slide">
                        <div class="img-wrap" style="background-image: url('{{$image->url()}}');" data-toggle="modal" data-target="#lightbox"></div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif
@endif
