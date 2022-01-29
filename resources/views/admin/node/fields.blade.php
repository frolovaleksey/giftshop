<div class="fields" data-get_fields="{{route('page.get_fields', ['type'=>$item->getNodeType(), 'id'=>$item->id])}}">{!! $item->renderFields() !!}</div>
