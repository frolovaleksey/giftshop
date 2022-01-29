<?php
if( !isset($saveText) ){
    $saveText = __('form.save');
}
?>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button class="btn btn-success" type="submit" value="save">{{$saveText}}</button>
            @if(isset($cancel_url))
            <a href="{{$cancel_url}}" type="button" class="btn default">{{__('form.cancel')}}</a>
            @endif
        </div>
    </div>
</div>
