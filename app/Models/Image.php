<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\ImageTranslation';

    public $translatedAttributes = ['title', 'desc'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'images';

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
    protected $fillable = ['image', 'imageable_id', 'imageable_type'];

    public function imageable()
    {
        return $this->morphTo();
    }

    public function getThumbnailAttribute()
    {
        return str_replace('.jpg', '-tmb.jpg', $this->image);
    }
    public function getImage230Attribute()
    {
        return str_replace('.jpg', '-230.jpg', $this->image);
    }
    public function getImage1200Attribute()
    {
        return str_replace('.jpg', '-1200.jpg', $this->image);
    }

    public function getImageVersion($version)
    {
        return str_replace('.jpg', '_'.$version.'.jpg', $this->image);
    }

}
