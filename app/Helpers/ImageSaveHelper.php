<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageSaveHelper
{
    public static function saveImageWithThumbnail ($requestImageFile, $imageModelName, 
        $imageModelId, $watermark = false, $imgNum = 0)
    {
        if($watermark) {
            $height = Image::make($requestImageFile)->height();
            $width = Image::make($requestImageFile)->width();
            $watermark = Image::make('images/watermark.png')->resize($width,$height);
            $preparedImage = Image::make($requestImageFile)->insert($watermark, 'center')->encode('jpg');
        } else {
             $preparedImage = Image::make($requestImageFile)->encode('jpg');
        }
        $thumbnail = Image::make($requestImageFile)->fit(150)->encode('jpg');
        $fileName = 'uploads/'.$imageModelName.'/'.$imageModelId.'/'.now()->timestamp.$imgNum;
        Storage::put($fileName.'.jpg', $preparedImage->__toString());
        Storage::put($fileName.'-tmb.jpg', $thumbnail->__toString());
        return $fileName.'.jpg';
    }

    public static function saveImageWithThumbnailNotEncoded ($requestImageFile, $imageModelName, 
        $imageModelId, $watermark = false, $imgNum = 0)
    {
        $thumbnail = Image::make($requestImageFile)->fit(150)->encode('jpg');
        $fileDir = 'uploads/'.$imageModelName.'/'.$imageModelId.'/';
        $fileName = now()->timestamp.$imgNum;
        $extensionName = $requestImageFile->getClientOriginalExtension();

        Storage::putFileAs($fileDir, $requestImageFile, $fileName.'.'.$extensionName);
        Storage::put($fileDir.$fileName.'-tmb.jpg', $thumbnail->__toString());
        return $fileDir.$fileName.'.'.$extensionName;
    }

    public static function saveProductImage ($requestImageFile, $imageModelId, $watermark = false)
    {
        if($watermark) {
            $height = Image::make($requestImageFile)->height();
            $width = Image::make($requestImageFile)->width();
            $watermark = Image::make('images/watermark.png')->resize($width,$height);
            $preparedImage = Image::make($requestImageFile)->insert($watermark, 'center')->encode('jpg');
        } else {
             $preparedImage = Image::make($requestImageFile)->encode('jpg');
        }
        $fileName = 'product/'.$imageModelId.'/'.now()->timestamp;
        Storage::put($fileName.'.jpg', $preparedImage->__toString());
        return $fileName.'.jpg';
    }

        public static function deleteAllModelImages ($modelInstance)
    {
        foreach ($modelInstance->images()->get() as $image) {
            Storage::delete($image->image);
            Storage::delete($image->thumbnail);
            $image->delete();
        }
    }
}