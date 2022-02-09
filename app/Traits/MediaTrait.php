<?php


namespace App\Traits;



use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait MediaTrait
{
    public function media()
    {
        return $this->morphMany('App\Media','mediable' );
    }

    public function getFilename($docFileInfo)
    {
        return $docFileInfo['filename'];
    }

    public function getDocUrl( $document )
    {
        if($document === null){
            return null;
        }

        $storage = Storage::disk( Media::getDisk() );

        $file = $this->getFilesDirectory().'/'.$document->filename.'.'.$document->format;
        if( $storage->exists( $file) ){
            return $storage->url($file);
        }else{
            return null;
        }
    }

    // Check if the file exists in the directory
    public static function checkFileExisting ($filename, $extention, $directory)
    {
        //$filename = strtolower($filename);

        $storage = Storage::disk( Media::getDisk() );

        if( ! $storage->has($directory.'/'.$filename.'.'.$extention)){
            return $filename;
        }

        $version = 1;
        if( !$storage->has($directory.'/'.$filename.'_v'.$version.'.'.$extention) ){
            return $filename.'_v'.$version;
        }

        $version++;
        while ( $storage->has($directory.'/'.$filename.'_v'.$version.'.'.$extention) )
        {
            $version++;
        }
        return $filename.'_v'.$version;
    }

    public function saveMediaFromRequest(Request $request, $fileFieldName)
    {
        $file = $request->file($fileFieldName);
        if($file === null){
            return;
        }

        return $this->saveFile($file);
    }

    public function saveFile($file)
    {
        if($file === null){
            return null;
        }

        $folder        = $this->getFilesDirectory();
        $mediaFileInfo = pathinfo( $file->getClientOriginalName());
        $filename      = $this->getFilename($mediaFileInfo);
        $cleanFilename = $this->checkFileExisting( $filename, $mediaFileInfo['extension'], $folder );
        $mediaFile     = $file->storeAs(
            $folder,
            $cleanFilename.'.'.$mediaFileInfo['extension'],
            Media::getDisk()
        );

        return $this->createMedia($mediaFile, $mediaFileInfo);
    }

    public function createMedia($mediaFile, $mediaFileInfo)
    {
        $media = new Media();
        $media->mediable_id   = $this->id;
        $media->mediable_type = get_class($this);
        $media->filename      = $mediaFileInfo['filename'];
        $media->extension     = $mediaFileInfo['extension'];
        $media->url           = $mediaFile;
        $media->author_id      = auth()->user()->id;
        $media->save();

        return $media;
    }
}
