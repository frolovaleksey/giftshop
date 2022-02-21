<div class="row">
    <span class="form_obj" data-form_obj="{{get_class($item)}}"></span>

    <div class="col-md-8 form-body">
        {!! $item->renderField('title') !!}
    </div>

    <div class="col-md-4">
        @include('admin.product.options')
    </div>
</div>


<div class="row">
    <div class="col-md-12">
        <div class="portlet light">
            <div class="portlet-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs">

                        <li>
                            <a href="#tab_content" data-toggle="tab" aria-expanded="false">
                                Content
                            </a>
                        </li>

                        <li>
                            <a href="#tab_images" data-toggle="tab" aria-expanded="false">
                                Images
                            </a>
                        </li>
                        <li>
                            <a href="#tab_seo" data-toggle="tab" aria-expanded="false">
                                SEO
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content no-space">

                        <div class="tab-pane" id="tab_content">
                            <div class="form-body">
                                @include('admin.home.tabs.tab_content')
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_images">
                            <div class="form-body">
                                @include('admin.home.tabs.tab_images')
                            </div>
                        </div>

                        <div class="tab-pane" id="tab_seo">
                            <div class="form-body">
                                @include('admin.home.tabs.tab_seo')
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@include('global.form_submit', ['cancel_url'=>route($item::getBaseRoute().'.index')])
