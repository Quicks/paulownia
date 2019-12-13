<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class ContentTranslation extends Model
{
    public $timestamps = true;
    protected $fillable = ['text'];
}
