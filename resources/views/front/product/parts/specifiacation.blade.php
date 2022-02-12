@if( $value = $webItem->getFieldValue('course_experience') )
    <h4>{{__('product.course_experience')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('location') )
    <h4>{{__('product.location')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('experience_includes') )
    <h4>{{__('product.experience_includes')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('experience_does_not_contain') )
    <h4>{{__('product.experience_does_not_contain')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('season') )
    <h4>{{__('product.season')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('spectators') )
    <h4>{{__('product.spectators')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('weather') )
    <h4>{{__('product.weather')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('health_condition') )
    <h4>{{__('product.health_condition')}}:</h4>
    <p>{!! $value !!}</p>
@endif

@if( $value = $webItem->getFieldValue('note') )
    <h4>{{__('product.note')}}:</h4>
    <p>{!! $value !!}</p>
@endif

