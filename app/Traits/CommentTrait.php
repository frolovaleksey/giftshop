<?php


namespace App\Traits;


trait CommentTrait
{
    public function comments()
    {
        return $this->morphMany('App\Comment', 'commentable')->orderBy('date', 'DESC');
    }
}
