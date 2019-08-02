<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class ImageTranslation extends Model {

    protected $table = 'images_translations';
    public $timestamps = true;
    protected $fillable = ['title', 'desc'];

}