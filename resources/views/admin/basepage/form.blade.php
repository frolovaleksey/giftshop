<div class="row">
    <span class="form_obj" data-form_obj="{{get_class($item)}}"></span>

    <div class="col-md-8 form-body">
        @include('admin.node.fields')
    </div>

    <div class="col-md-4">
        @include('admin.node.options')
    </div>
</div>


@include('global.form_submit', ['cancel_url'=>route($item::getBaseRoute().'.index')])
