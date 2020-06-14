<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurService extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\OurServiceTranslation';

    public $translatedAttributes = ['title', 'text', 'keywords'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'our_services';

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
    protected $fillable = ['active'];

    public function scopeActive($query){
        return $query->where('active', true);
    }
}
