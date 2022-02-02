<li>
    <label><input type="checkbox" name="{{$model->getTaxonomyType()}}[]" value="{{$model->id}}" @if($selected) checked @endif>{{$model->getFieldValue('title')}}</label>
    @if( count($children) )
        <?php
        $model = get_class($model);
        ?>
        {!! $model::renderLevel($children) !!}
    @endif
</li>
