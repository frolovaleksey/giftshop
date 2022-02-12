@php
$sale_price = new \App\Helpers\FormGroup\Text('sale_price');
$sale_price->setRequired()
->setLabel('Sale price')
->setAttr(['class' => 'form-control small_input'])
;
@endphp
{!! $sale_price->get() !!}

@php
    $regular_price = new \App\Helpers\FormGroup\Text('regular_price');
    $regular_price->setRequired()
    ->setLabel('Regular price')
    ->setAttr(['class' => 'form-control small_input'])
    ;
@endphp
{!! $regular_price->get() !!}


@php
    $expired_date = new \App\Helpers\FormGroup\Date('expired_date');
    $expired_date
    ->setFilableItem($item)
    ->setLabel('Product expire date')
    ;
@endphp
{!! $expired_date->get() !!}


@php
    $sku = new \App\Helpers\FormGroup\Text('sku');
    $sku->setAttr(['class' => 'form-control small_input'])
    ;
@endphp
{!! $sku->get() !!}


{!! $item->renderField('customproductsales') !!}


{!! $item->renderField('faq') !!}


{!! $item->renderField('related_product') !!}

