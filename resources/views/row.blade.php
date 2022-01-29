<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            @isset($title)
            <div class="portlet-title">
                <div class="caption">
                    <span class="caption-subject font-green-sharp bold uppercase">{{$title}}</span>
                </div>
            </div>
            @endisset
            @isset($body)
            <div class="portlet-body">
                {!!$body!!}
            </div>
            @endisset
        </div>
    </div>
</div>
