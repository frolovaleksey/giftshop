<div class="repeater_holder" >
    <div class="repeater_fields_holder">

        {!! $repeater->renderBlocks() !!}

    </div>
    <a href="#" class="btn btn-success repeater_add" data-get_repeater_fields="{{route('field.get_repeater_fields', ['type'=>$name, 'id'=>$item->id])}}">{{__('global.add')}}</a>
    <img class="btn_loader repeater_loader" style="display: none" src="{{url('/')}}/img/ajax-loading.gif">
</div>
