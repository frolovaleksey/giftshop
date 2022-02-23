<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected static $statuses = [
        'approved',
        'pending',
        'spam',
    ];

    protected $dates = [
        'date'
    ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id')->withDefault([
            'name' => '--'
        ]);
    }

    public static function getStatusesOptions()
    {
        $options = [];
        foreach (self::$statuses as $status) {
            $options[$status] = __('comment.'.$status);
        };
        return $options;
    }
}
