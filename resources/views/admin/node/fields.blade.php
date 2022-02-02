<div class="fields" data-get_fields="{{route('field.get_fields', ['type'=>$item->getNodeType(), 'id'=>$item->id])}}">{!! $item->renderFields() !!}</div>
