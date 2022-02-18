<?php


namespace App\Helpers;

use App\Helpers\Resize;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    protected $media;

    public function __construct($mediaId)
    {
        $this->media = \App\Media::find($mediaId);
        if( $this->media === null ){
            return;
        }
    }

    public function isImageEmpty()
    {
        return $this->media === null;
    }

    public function url($thumbnail=null)
    {
        if( $this->isImageEmpty() ){
            return;
        }

        if($thumbnail === null) {
            return $this->media->getUrl();
        }else{
            return $this->getSyze($thumbnail);
        }
    }

    public function alt()
    {
        return $this->media->alt;
    }

    public function title()
    {
        return $this->media->title;
    }

    public function getSyze($size)
    {
        $thumbnail = config('thumbnail');
        if(isset($thumbnail[$size])){
            return $this->thumbnailUrl($size);
        }else{
            return $this->url();
        }
    }

    public function thumbnailUrl($size)
    {
        $thumbnailPath = $this->getThumbnailPath($size);

        if( ! Storage::disk( $this->media::getDisk() )->exists($thumbnailPath) ){
            $this->resizeImage($size);
        }

        return Storage::disk( $this->media::getDisk() )->url($thumbnailPath);
    }

    public function getThumbnailPath($size)
    {
        $thumbnailName = $this->getThumbnailName($size);
        return $this->media->getFileDir(). $thumbnailName;
    }

    public function getThumbnailName($size)
    {
        return $size.'_'.$this->media->getFileNameExt();
    }

    public function resizeImage($size)
    {
        $thumbnail = config('thumbnail');
        $options = $thumbnail[$size];

        $filename = Storage::disk( $this->media::getDisk() )->path($this->media->url);
        $resultFile = Storage::disk( $this->media::getDisk() )->path( $this->getThumbnailPath($size) );

        $resizer = new Resize($filename);
        $resizer->resizeImage($options['width'], $options['height'], $options['option']);
        $resizer->saveImage($resultFile, $options['quality']);

    }
}
