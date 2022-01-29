<?php

namespace App\Observers;

use App\Field;

class NodeObserver
{
    public function deleting($node)
    {
        Field::destroy($node->fields->pluck('id'));
    }
}
