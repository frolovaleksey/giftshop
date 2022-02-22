<div class="col-xs-12">
    @notMobile
    <div class="refer_main">
        <div class="col-lg-7 col-md-6 col-sm-6 col-xs-12"
             id="references-index-container">

            <div class="row">
                <div class="col-xs-12">
                    <h4 class="main-head">{{__('product.evaluation')}} <span><a href="/recenze/">{{__('product.more_references')}}</a></span>
                    </h4>
                </div>

                @php
                $comments = \App\Comment::where('commentable_type', 'App\Product')
                ->where('status', 'approved')
                ->orderBy('date', 'desc')
                ->with('commentable')
                ->paginate(2);
                @endphp

                @foreach($comments as $comment)
                <div class="col-xs-12 refer-box @if($loop->last) refer-box-last @endif ">
                    <div class="top-refer-b">
                        <div class="row">
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12 hide-mobile">
                                <a href="#"><span class="reference-avatar-small"></span></a>
                            </div>
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                                <h4 class="refer_main_title_author">{{$comment->author->fullName}}
                                    <span class="refer_main_date">{{$comment->date->translatedFormat('d F Y')}}</span>
                                </h4>
                                <h5 class="refer_sub_head">
                                    <span>{{__('product.rating_on')}}</span><br>{{$comment->commentable->getFieldValue('title')}}
                                </h5>
                                <p class="refer_author_text"><?php echo substr($comment->body, 0, 210) ?>
                                    ...</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        @php
            $post = \App\Post::orderBy('date_open', 'desc')
            ->first();
        @endphp
        <div class="col-lg-5 col-md-6 col-sm-6 col-xs-12" id="blog-index-container">
            <h2 class="main-head">{{__('front.blog')}}<span><a href="/blog/">{{__('front.more_posts')}}</a></span></h2>
            <div class="row">

                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="refer-box-img">
                        <img src="{{$post->getImage('main_image')->url()}}">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="refer-box refer-box-last">
                        <div class="top-refer-b">
                            <h2 class="refer_sub_head1">{{$post->getFieldValue('title')}}</h2>
                            <p class="sub-text2">{!! \App\Helpers\HtmlHelper::trimWords( $post->getFieldValue('content'), 25 ) !!}</p>
                            <a href="{{$post->getUrl()}}" class="btn read-more-btn-text"> {{__('front.read_more')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @endif
</div>
