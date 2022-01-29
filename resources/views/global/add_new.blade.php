<div class="table-toolbar">

    @if( isset($add_url) )
    <div class="row">
        <div class="col-md-6">
            <div class="btn-group">
                <a id="sample_editable_1_new" class="btn green" href="{{$add_url}}">
                    {{$add_text}} <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
    @endif

    @if( isset($exel_print) )
    <div class="row">
        <div class="col-md-12">
            <div class="btn-group tabletools-btn-group pull-right">
                <a class="btn btn-sm default" id="bb_exel" title="Exel"><span>Exel</span></a>
                <a class="btn btn-sm default" id="bb_print" title="View print view"><span>Print</span></a>
            </div>
        </div>
    </div>
    @endif

</div>