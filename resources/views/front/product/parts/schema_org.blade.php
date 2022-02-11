<div class="hide">
    <span itemprop="sku">{{$webItem->sku}}</span>
    <span itemprop="image">{{$webItem->getImage('main_image')->url()}}</span>
    <div itemscope="" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
        <span itemprop="ratingValue"> {{$webItem->review()->average}}</span>
        <span itemprop="bestRating">{{$webItem->review()->bestRating}}</span>
        <span itemprop="reviewCount">{{$webItem->review()->reviewCount}}</span>
        <span itemprop="ratingCount">{{$webItem->review()->ratingCount}}</span>
    </div>
    <div itemscope="" itemprop="offers" itemtype="http://schema.org/AggregateOffer">
        <span itemprop="offerCount">{{$webItem->review()->offerCount}}</span>
        <span itemprop="lowPrice">{{$webItem->review()->lowPrice}}</span>
        <span itemprop="highPrice">{{$webItem->review()->highPrice}}</span>
        <span itemprop="priceCurrency">{{$webItem->review()->priceCurrency}}</span>
    </div>
    <div itemscope="" itemprop="offers" itemtype="http://schema.org/Offer">
        <span itemprop="url">{{$webItem->getUrl()}}</span>
        <span itemprop="price">{{$webItem->review()->salePrice}}</span>salePrice
        <span itemprop="priceCurrency">{{$webItem->review()->priceCurrency}}</span>
    </div>
</div>
