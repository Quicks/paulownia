<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class ArticleTranslation extends Model
{
    public $timestamps = true;
    protected $fillable = ['title', 'text', 'keywords'];
}
