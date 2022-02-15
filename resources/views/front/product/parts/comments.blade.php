<!-- Shof Comments -->
<div class="row">
    <div class="col-xs-12" id="sec_1">
        <div class="tab-content tab-reviews">
            <div class="tab-content-inner">
                @include('front.comment.holder', ['comments' => $webItem->comments()->paginate(10)->withPath(route('comment.front.get_list', ['modelType' => 'product', 'modelId' => $webItem->id]) )])
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
