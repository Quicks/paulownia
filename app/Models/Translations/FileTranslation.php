<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class FileTranslation extends Model
{
    protected $table = 'files_translations';
    public $timestamps = true;
    protected $fillable = ['title', 'desc'];
}
