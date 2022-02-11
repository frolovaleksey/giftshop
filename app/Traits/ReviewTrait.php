<?php


namespace App\Traits;


use App\Services\Shop\Review;

trait ReviewTrait
{
    protected $review=null;

    public function review()
    {
        if($this->review === null){
            $this->review = new Review($this);
        }

        return $this->review;
    }
}
