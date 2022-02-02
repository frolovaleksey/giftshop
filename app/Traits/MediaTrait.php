<?php


namespace App\Traits;



use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait MediaTrait
{
    public function getFilename($request, $docFileInfo)
    {
        return $docFileInfo['filename'];
    }

    public function getDocUrl( $document )
    {
        if($document === null){
            return null;
        }

        $file = $this->getFilesDirectory().'/'.$document->filename.'.'.$document->format;
        if( Storage::exists( $file) ){
            return Storage::url($file);
        }else{
            return null;
        }
    }

    // Check if the file exists in the directory
    public static function checkFileExisting ($filename, $extention, $directory)
    {
        //$filename = strtolower($filename);

        if( ! Storage::has($directory.'/'.$filename.'.'.$extention)){
            return $filename;
        }

        $version = 1;
        if( ! Storage::has($directory.'/'.$filename.'_v'.$version.'.'.$extention) ){
            return $filename.'_v'.$version;
        }

        $version++;
        while ( Storage::has($directory.'/'.$filename.'_v'.$version.'.'.$extention) )
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

        $folder        = $this->getFilesDirectory();
        $mediaFileInfo = pathinfo($request->$fileFieldName->getClientOriginalName());
        $filename      = $this->getFilename($request, $mediaFileInfo);
        $cleanFilename = $this->checkFileExisting ( $filename, $mediaFileInfo['extension'], $folder );
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
