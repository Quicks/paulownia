<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class SliderTranslation extends Model
{
    public $timestamps = true;
    protected $fillable = ['title', 'text', 'keywords'];
}
