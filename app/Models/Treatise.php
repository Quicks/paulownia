<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatise extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\TreatiseTranslation';

    public $translatedAttributes = ['title', 'text', 'keywords'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'treatises';

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
    protected $fillable = ['name', 'active', 'publish_date'];

    public function files()
    {
        return $this->morphMany('App\Models\File', 'fileable');
    }
}
