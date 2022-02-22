<div class="row products-loop product-grid row-count-4">

    @foreach(\App\Product::paginate(4) as $product)
        @include('front.product.product_block', [ 'product' => $product ])
    @endforeach

    @include('front.page.home.steps')

    @foreach(\App\Product::paginate(4) as $product)
        @include('front.product.product_block', [ 'product' => $product ])
    @endforeach

    @include('front.page.home.reviews')

    @foreach(\App\Product::paginate(4) as $product)
        @include('front.product.product_block', [ 'product' => $product ])
    @endforeach

</div> <!-- .row -->
