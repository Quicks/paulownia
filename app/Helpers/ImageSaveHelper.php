<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageSaveHelper
{
    public static function saveImageWithThumbnail ($requestImageFile, $watermark = false)
    {   
        if($watermark) {
            $watermark = Image::make('images/watermark.png');
            $preparedImage = Image::make($requestImageFile)->insert($watermark, 'center')->encode('jpg');
        } else {
             $preparedImage = Image::make($requestImageFile)->encode('jpg');
        }
        $thumbnail = Image::make($requestImageFile)->fit(150)->encode('jpg');
        $fileName = 'uploads/'.now()->timestamp;
        Storage::put($fileName.'.jpg', $preparedImage->__toString());
        Storage::put($fileName.'-tmb.jpg', $thumbnail->__toString());
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