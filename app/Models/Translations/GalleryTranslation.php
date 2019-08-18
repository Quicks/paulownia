<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class GalleryTranslation extends Model {

    protected $table = 'galleries_translations';
    public $timestamps = true;
    protected $fillable = ['title', 'desc', 'keywords'];

}