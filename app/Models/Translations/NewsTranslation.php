<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class NewsTranslation extends Model {

    public $timestamps = true;
    protected $fillable = ['title', 'text'];

}