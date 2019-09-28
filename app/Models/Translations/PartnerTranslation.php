<?php

namespace App\Models\Translations;

use Illuminate\Database\Eloquent\Model;

class PartnerTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = ['title', 'address', 'city', 'country'];
}
