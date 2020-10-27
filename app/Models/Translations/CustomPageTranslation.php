<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class CustomPageTranslation extends Model
{
    public $timestamps = true;
    protected $fillable = ['title', 'description', 'keywords', 'page_title'];
}
