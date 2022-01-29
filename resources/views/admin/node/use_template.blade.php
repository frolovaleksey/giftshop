@if( $item->hasTemplate() )
    @php
    $template = new \App\Helpers\FormGroup\Select('template');
    $template->setOptions($item->templates);
    @endphp
    {{$template->get()}}
@endif
