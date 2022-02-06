@php
    $slug = new \App\Helpers\FormGroup\Text('slug');
@endphp
{{$slug->get()}}

@isset($item->id)
    <div class="form-group ">
        <label for="slug" class="control-label col-md-3">View</label>
        <div class="col-md-8">
            <a target="_blank" href="{{$item->getUrl()}}">{{$item->getUrl()}}</a>
        </div>
    </div>
@endisset
