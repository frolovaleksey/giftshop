<div class="fields" data-get_fields="{{route('field.get_fields', ['type'=>$item->getItemType(), 'id'=>$item->id])}}">{!! $item->renderFields() !!}</div>
