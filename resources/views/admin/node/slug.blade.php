@php
    $slug = new \App\Helpers\FormGroup\Text('slug');
@endphp
{{$slug->get()}}

@if( isset($item->id) && method_exists($item,'getUrl') )
    <div class="form-group ">
        <label for="slug" class="control-label col-md-3">View</label>
        <div class="col-md-8">
            <a target="_blank" href="{{$item->getUrl()}}">{{$item->getUrl()}}</a>
        </div>
    </div>
@endif
