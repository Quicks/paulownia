<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\NewsTranslation';

    public $translatedAttributes = ['title', 'text', 'keywords'];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'news';

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
    protected $fillable = ['name', 'active', 'publish_date', 'admin_id', 'video', 'type'];

    public function images()
    {
        return $this->morphMany('App\Models\Image', 'imageable');
    }
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'commentable');
    }
}
