<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\FileTranslation';
    public $translatedAttributes = ['title', 'desc'];

    protected $table = 'files';
    protected $primaryKey = 'id';
    protected $fillable = ['file', 'fileable_id', 'fileable_type'];

    public function fileable()
    {
        return $this->morphTo();
    }
}
