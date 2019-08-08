<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model {

    public $timestamps = false;
    protected $fillable = ['title', 'text'];

}