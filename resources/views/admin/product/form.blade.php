<div class="row">
    <span class="form_obj" data-form_obj="{{get_class($item)}}"></span>

    <div class="col-md-8 form-body">
        {!! $item->renderField('title') !!}
    </div>

    <div class="col-md-4">
        @include('admin.node.options')
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#tab_general" data-toggle="tab" aria-expanded="true">
                                General
                            </a>
                        </li>
                        <li class="">
                            <a href="#tab_meta" data-toggle="tab" aria-expanded="false">
                                Meta
                            </a>
                        </li>
                        <li class="">
                            <a href="#tab_images" data-toggle="tab" aria-expanded="false">
                                Images
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content no-space">
                        <div class="tab-pane active" id="tab_general">
                            <div class="form-body">
                                @include('admin.product.tabs.tab_general')
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_meta">
                            <div class="form-body">
                                    rrr
                            </div>
                        </div>
                        <div class="tab-pane" id="tab_images">
                            <div class="form-body">
                                @include('admin.product.tabs.tab_images')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('global.form_submit', ['cancel_url'=>route($item::getBaseRoute().'.index')])
