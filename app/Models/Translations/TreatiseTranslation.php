<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class TreatiseTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'text'];
}
