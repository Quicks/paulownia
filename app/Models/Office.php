<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\OfficeTranslation';

    public $translatedAttributes = ['title', 'address', 'city', 'country'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'offices';

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
    protected $fillable = ['name', 'postcode', 'phone', 'email', 'website'];

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
}
