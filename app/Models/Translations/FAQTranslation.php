<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class FAQTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['question', 'answer'];
}
