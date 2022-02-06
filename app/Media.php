<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Media extends Model
{
    public static function getDisk()
    {
        return 'media';
    }

    public function getUrl()
    {
        return Storage::disk( self::getDisk() )->url($this->url);
    }

    public function delete()
    {
        Storage::disk(self::getDisk())->delete($this->url);
        return parent::delete();
    }

    public function getFileNameExt()
    {
        return $this->filename .'.'.$this->extension;
    }

    public function getFileDir()
    {
        return str_replace($this->getFileNameExt(), '', $this->url);
    }
}
