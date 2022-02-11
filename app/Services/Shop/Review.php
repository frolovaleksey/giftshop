<?php


namespace App\Services\Shop;


class Review
{
    protected $rewiebleObj;
    public $average;
    public $bestRating;
    public $reviewCount;
    public $ratingCount;
    public $offerCount;
    public $lowPrice;
    public $salePrice;
    public $highPrice;
    public $priceCurrency;

    public function __construct($rewiebleObj)
    {
        $this->rewiebleObj = $rewiebleObj;

        $this->lowPrice = $rewiebleObj->sale_price;
        $this->salePrice = $rewiebleObj->sale_price;
        $this->highPrice = $rewiebleObj->regular_price;
        $this->priceCurrency = $rewiebleObj->currency;

        // TODO
        $this->average = 4;
        $this->bestRating = 5;
        $this->reviewCount = 10;
        $this->ratingCount = 18;
        $this->offerCount = 1;

    }
}
