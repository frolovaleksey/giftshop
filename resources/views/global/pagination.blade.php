<div class="row " bb-paginaion>
    <div class="pagination-block">
        <div class="col-md-5 col-sm-12">
            <div class="dataTables_info" role="status" aria-live="polite">
                @if(isset($items) && $items instanceof \Illuminate\Pagination\LengthAwarePaginator )
                {{__('pagination.showing')}}

                {{$items->firstItem()}} {{__('pagination.to')}} {{$items->lastItem()}} {{__('pagination.of')}} {{$items->total()}}

                {{__('pagination.entries')}}
                @endif
            </div>
        </div>
        <div class="col-md-7 col-sm-12">
            <div class="dataTables_paginate paging_bootstrap_full_number" >
                @if(isset($items) && $items instanceof \Illuminate\Pagination\LengthAwarePaginator )
                {{ $items->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
