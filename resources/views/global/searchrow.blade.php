@include('global.a_year')


<div class="row">
    @if(!isset($hide_show_entries))
    <div class="col-md-6 col-sm-12">
        <div>
            @include('global.show_entries')
        </div>
    </div>
    @endif

    @if(!isset($hide_search))
    <div class="col-md-6 col-sm-12">
        <div @if(!isset($hide_show_entries)) class="dataTables_filter"@endif>
            @include('global.search')
        </div>
    </div>
    @endif
</div>

