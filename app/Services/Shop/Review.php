<?php


namespace App\Services\Shop;


class Review
{
    protected $rewiebleObj;
    protected $comments;
    public $average;
    public $bestRating;
    public $reviewCount;
    public $ratingCount;
    public $offerCount;
    public $lowPrice;
    public $salePrice;
    public $highPrice;
    public $priceCurrency;
    public $stars;


    public function __construct($rewiebleObj)
    {
        $this->rewiebleObj = $rewiebleObj;
        $this->comments = $rewiebleObj->comments;

        $this->lowPrice = $rewiebleObj->sale_price;
        $this->salePrice = $rewiebleObj->sale_price;
        $this->highPrice = $rewiebleObj->regular_price;
        $this->priceCurrency = $rewiebleObj->currency;


        $this->average = $this->getAverage();
        $this->bestRating = $this->getBestRating();
        $this->reviewCount = $this->getReviewCount();
        $this->stars = $this->getStars();
        $this->ratingCount = $this->getRatingCount();

        // TODO
        $this->offerCount = 1;
    }

    public function getAverage()
    {
        return round($this->comments->avg('rating'), 1);
    }

    public function getBestRating()
    {
        return $this->comments->max('rating');
    }

    public function getReviewCount()
    {
        return $this->comments->count();
    }

    public function getStars()
    {
        return round($this->comments->avg('rating'));
    }

    public function getRatingCount()
    {
        return $this->comments->count();
    }
}
