<?php

namespace Webkul\API\Http\Resources\Catalog;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomProductImage extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            // 'path' => $this->path,
            // 'url' => $this->url,
            'original_image_url' => $this->image,
            'small_image_url' => $this->getThumbnailAttribute(),
            'medium_image_url' => $this->getImage230Attribute(),
            'large_image_url' => $this->getImage1200Attribute(),
        ];
    }
}