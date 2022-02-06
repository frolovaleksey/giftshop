@php
$sale_price = new \App\Helpers\FormGroup\Text('sale_price');
$sale_price->setRequired()
->setLabel('Sale price')
->setAttr(['class' => 'form-control small_input'])
;
@endphp
{!! $sale_price->get() !!}
