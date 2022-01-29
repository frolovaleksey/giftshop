<div class="row">
    <div class="col-md-8 form-body">
        @include('admin.node.fields')
    </div>

    <div class="col-md-4">
        @include('admin.node.options')
    </div>
</div>


@include('global.form_submit', ['cancel_url'=>route($item::getBaseRoute().'.index')])
