<ul class="comments-list">
    @foreach($comments as $comment)
        <li id="comment-{{$comment->id}}" class="comment even thread-even depth-1">
            <div class="media">
                <div class="comment-review">
                    <div class="comment-review-avatar hide-mobile">
                        <img src="{{url('/')}}/assets/images/avatar.png" alt="Unknown user"/>
                    </div>
                    <div itemprop="review" itemscope itemtype="http://schema.org/Review" class="comment-review-body">
                        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                            <h4 itemprop="author" class="media-heading">{{$comment->author->fullName}}</h4>
                            <time itemprop="datePublished" datetime="{{$comment->date->format('Y-m-d')}}">{{$comment->date->translatedFormat('d F Y')}}</time>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 comment-review-body-rating">
                            <span class="review-rating">{{$comment->rating}}</span>

                            <div itemprop="reviewRating" itemscope itemtype="http://schema.org/Rating"
                                 class="star-rating"
                                 title="Hodnocen {{$comment->rating}} z 5">
                                    <span style="width:{{  ($comment->rating *100)/5 }}%">
                                        <strong itemprop="ratingValue">5</strong>
                                        <span itemprop="bestRating">5</span>
                                        <span itemprop="worstRating">1</span>
                                     </span>
                            </div>
                        </div>
                        <div class="comment-review-body-message">
                            <div itemprop="reviewBody" class="col-xs-12">
                                <p>{{$comment->body}}</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12"></div>
                        </div>
                    </div>
                </div>
            </div>
        </li><!-- #comment-## -->
    @endforeach
</ul>

<nav class="woocommerce-pagination comment-pagination">
    @if(isset($comments) && $comments instanceof \Illuminate\Pagination\LengthAwarePaginator )
        {{ $comments->links() }}
    @endif
</nav>
