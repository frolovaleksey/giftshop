<label>{{__('form.search')}}:
    @if(isset($special_search))
        <input type="text" name="search" bb-special_sg bb-cahnge class="form-control input-small input-inline">
    @else
        <input type="text" name="search" bb-search bb-cahnge class="form-control input-small input-inline">
    @endif
</label>
