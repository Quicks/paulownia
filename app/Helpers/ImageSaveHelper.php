<?php
namespace App\Helpers;

use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ImageSaveHelper
{
    public static function saveImageWithThumbnail($requestImageFile, $imageModelName,
        $imageModelId, $watermark = false, $imgNum = 0)
    {
        if($watermark) {
            $height = Image::make($requestImageFile)->height();
            $width = Image::make($requestImageFile)->width();
            $watermark = Image::make('images/watermark.png')->resize($width,$height);
            $preparedImage = Image::make($requestImageFile)->insert($watermark, 'center')->encode('png');
        } else {
             $preparedImage = Image::make($requestImageFile)->encode('png');
        }
        $fileName = 'uploads/'.$imageModelName.'/'.$imageModelId.'/'.now()->timestamp.$imgNum;

        $thumbnail = Image::make($requestImageFile)->resize(360, 240)->encode('png');
        $image230 = Image::make($requestImageFile)->resize(230, 160)->encode('png');
        $image1200 = Image::make($requestImageFile)->resize(1200, 800)->encode('png');
        $fullClassName = ("\App\Models\\".$imageModelName);
        $instance = new $fullClassName;
        if($instance->image_versions){
            foreach($instance->image_versions as $imageSizeKey => $imageSize){
                $image_resize = Image::make($requestImageFile)->resize($imageSize[0], $imageSize[1])->encode('png');
                Storage::put($fileName.'_'.$imageSizeKey.'.png', $image_resize->__toString());
            }
        }
        Storage::put($fileName.'.png', $preparedImage->__toString());
        Storage::put($fileName.'-tmb.png', $thumbnail->__toString());
        Storage::put($fileName.'-230.png', $image230->__toString());
        Storage::put($fileName.'-1200.png', $image1200->__toString());
        return $fileName.'.png';
    }

    public static function saveImageWithThumbnailNotEncoded ($requestImageFile, $imageModelName,
        $imageModelId, $watermark = false, $imgNum = 0)
    {
        $thumbnail = Image::make($requestImageFile)->fit(150)->encode('png');
        $fileDir = 'uploads/'.$imageModelName.'/'.$imageModelId.'/';
        $fileName = now()->timestamp.$imgNum;
        $extensionName = $requestImageFile->getClientOriginalExtension();

        Storage::putFileAs($fileDir, $requestImageFile, $fileName.'.'.$extensionName);
        Storage::put($fileDir.$fileName.'-tmb.png', $thumbnail->__toString());
        return $fileDir.$fileName.'.'.$extensionName;
    }

    public static function saveProductImage($requestImageFile, $imageModelId, $watermark = false)
    {
        if($watermark) {
            $height = Image::make($requestImageFile)->height();
            $width = Image::make($requestImageFile)->width();
            $watermark = Image::make('images/watermark.png')->resize($width,$height);
            $preparedImage = Image::make($requestImageFile)->insert($watermark, 'center')->encode('png');
        } else {
             $preparedImage = Image::make($requestImageFile)->encode('png');
        }
        $fileName = 'product/'.$imageModelId.'/'.now()->timestamp;
        Storage::put($fileName.'.png', $preparedImage->__toString());

        $thumbnail = Image::make($requestImageFile)->fit(443, 316)->encode('png');
        Storage::put($fileName.'-tmb.png', $thumbnail->__toString());

        return ['image' => $fileName.'.png', 'thumbnail' => $fileName.'-tmb.png'];
    }

    public static function deleteAllModelImages($modelInstance)
    {
        foreach ($modelInstance->images()->get() as $image) {
            Storage::delete($image->image);
            Storage::delete($image->thumbnail);
            $image->delete();
        }
    }
}