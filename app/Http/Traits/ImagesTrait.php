<?php
namespace App\Http\Traits;

use App\Models\Image;
use App\Helpers\ImageSaveHelper;

trait ImagesTrait {
    protected function saveImages($id, $type, $images, $watermark){
        if(empty($images)){
            return;
        }
        $imageAtributes = [];
        $imageAtributes['imageable_id'] = $id;
        $imageAtributes['imageable_type'] = 'App\Models\\'.$type;
        foreach ($images as $key => $image) {
            if(isset($image['_destroy'])){
                Image::destroy($image['id']);
            }elseif(empty($image['id'])){
                $imageAtributes['image'] = ImageSaveHelper::saveImageWithThumbnail(
                    $image['image'], $type, $id, $watermark, $key);
                Image::create($imageAtributes);
            }elseif(!empty($image['id'])){
                if(strpos($image['image'], ';base64')){
                    $imageModel = Image::find($image['id']);
                    $imageModel->image = ImageSaveHelper::saveImageWithThumbnail(
                        $image['image'], $type, $id, $watermark, $key);
                    $imageModel->save();
                }
            }
        }
    }
    protected function deleteAllModelImages($object){
        ImageSaveHelper::deleteAllModelImages($object);
    }
}