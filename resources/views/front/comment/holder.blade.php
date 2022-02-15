<div id="reviews">
    <div id="comments">
        <h2>{{$comments->total()}} {{__('product.experience_evaluation')}} {{$webItem->getFieldValue('title')}}</h2>

        <div class="comments_holder">
            @include('front.comment.list')
        </div>

    </div>
</div>
