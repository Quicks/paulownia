<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\FAQTranslation';

    public $translatedAttributes = ['question', 'answer'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'f_a_qs';

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
    protected $fillable = ['content_id'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }
}
