<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\SliderTranslation';

    public $translatedAttributes = ['title', 'text', 'keywords'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sliders';

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
    protected $fillable = ['channel_id', 'link'];

    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

}
