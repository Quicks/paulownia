<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\GalleryTranslation';
    
    public $translatedAttributes = ['title', 'desc', 'keywords'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'active'];

    public function images() {
        return $this->morphMany('App\Models\Image', 'imageable');
    }

    public function mainImage() {
        return $this->images()->first();
    }

}
