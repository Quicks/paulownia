<?php

namespace App\Models;

use Webkul\Product\Models\Product as WebkulProduct;
use Illuminate\Database\Eloquent\Model;

class Product extends WebkulProduct
{

    private $translatesCache = [];
    public $image_versions = ['default' => [360, 240], 'thumb' => [230, 160]];
    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
    public function parentComments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable')->where('parent_id', '=', 0);
    }

    public function translate($locale){
        if(empty($this->translatesCache[$locale])){
            $attributeValues = $this->attribute_values()
            ->where('locale', $locale)
            ->with('attribute')
            ->get();
            $stdClass = new \stdClass;
            foreach($attributeValues as $attributeValue){
                $field = $attributeValue->attribute->code;
                $stdClass->$field = $attributeValue->text_value;
            }
            $this->translatesCache[$locale] = $stdClass;
        }

        return $this->translatesCache[$locale];
    }

}



