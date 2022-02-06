<?php


namespace App\Traits;


trait AuthorTrait
{
    public function author()
    {
        return $this->belongsTo('App\User', 'author_id')->withDefault([
            'name' => '--'
        ]);
    }
}
