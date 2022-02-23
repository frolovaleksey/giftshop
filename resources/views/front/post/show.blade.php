@extends('front.base_page_tpl')

@section('content')

    <div class="new-blog">
        <div class="page-heading bc-type-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <a class="back-history hide-mobile" href="javascript: history.go(-1)">Vrátit zpět</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="post-heading" style="background-image: url({{$webItem->getImage('main_image')->url()}});">
                        <div class="post-heading-content">

                            @if( $categories = $webItem->categories )
                            <ul class="post-categories">
                                @foreach( $categories as $category)
                                <li class="lastItem firstItem">
                                    <a href="{{$category->getUrl()}}" rel="category tag">{{$category->getFieldValue('title')}}</a>
                                </li>
                                @endforeach
                            </ul>
                            @endif

                            <h1>{{$webItem->getFieldValue('title')}}</h1>
                            <div class="authors-info">
                                {{$webItem->author->name}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row blogs-content">
                @notMobile
                <div class="col-md-4 col-md-offset-0 col-xs-12 sidebar blog-sidebar">

                    @php
                    $categories = \App\Category::withCount('posts')
                    ->having('posts_count', '>', 0)
                    ->get();
                    @endphp
                    <div class="sidebar-widget widget_categories">
                        <h4 class="widget-title"><span>{{__('front.category')}}</span></h4>
                        <ul>
                            @foreach( $categories as $category )
                            <li class="cat-item firstItem">
                                <a href="{{$category->getUrl()}}">{{$category->getFieldValue('title')}}</a> ({{$category->posts_count}})
                            </li>
                            @endforeach
                        </ul>
                    </div>


                    @php
                        $relatedProducts = $webItem->getFieldValue('related_product');

                        if(!$relatedProducts){
                            $relatedProducts = \App\Product::getFeauturedProducts(3);
                        }
                    @endphp

                    @if( $relatedProducts )
                    <div class="jsfixedblock slide_innercet_wrap">
                        <div class="slide_third--header">{{__('product.you_might_interested')}}</div>
                        <div>
                        @foreach( $relatedProducts as $relatedProduct )
                            @if( $relatedProduct->isVisible() )
                                <div class="slide_innercet">
                                    <a href="{{$relatedProduct->getUrl()}}" class="slide_cet1"
                                       style="background-image:url('{{$relatedProduct->getImage('main_image')->url('medium')}}')">
                                        <div class="cet_text">
                                            <h3>{{$relatedProduct->getFieldValue('title')}}</h3>
                                            @php
                                                $regularPrice = $relatedProduct->getRegularPrice();
                                                $salesPrice   = $relatedProduct->getSalePrice();
                                            @endphp
                                            @if ( ! empty( $salesPrice ) )
                                            <p><span><del>{{$regularPrice}} {{$relatedProduct->saleCurrency()}}</del></span>
                                                {{$salesPrice}} {{$relatedProduct->saleCurrency()}}</p>
                                            @else
                                            <p>{{$regularPrice}} {{$relatedProduct->saleCurrency()}}</p>
                                            @endif
                                        </div>
                                    </a>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    @endif

                </div>
                @endif


                <!-- Main blog content -->
                <div class="col-md-8 new-post-content blog-content">
                    {!! $webItem->getFieldValue('content') !!}

                    <div class="stips-blog-shares">
                        <a class="fab fa-facebook-f fqkr2epc" href="http://www.facebook.com/sharer.php?u={{$webItem->getUrl()}}&amp;t={{$webItem->getFieldValue('title')}}" target="_blank" rel="nofollow" title="Share on Facebook."></a>
                        <a class="fab fa-twitter fqkr2epc" href="http://twitter.com/home/?status={{$webItem->getFieldValue('title')}} - {{$webItem->getUrl()}}" target="_blank" rel="nofollow" title="Tweet this!"></a>
                        <a class="fab fa-google-plus-g fqkr2epc" href="https://plus.google.com/share?url={{$webItem->getUrl()}}" target="_blank" rel="nofollow"></a>
                    </div>

                    @include('front.comment.post_comments')
                </div>

            </div>
        </div>
    </div>

    <div class="new-blog">
        @include('front.blocks.feautured_products')

        @include('front.blocks.instagram_feed')
    </div>

@endsection
