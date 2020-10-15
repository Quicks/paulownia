<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\CustomPageTranslation';

    public $translatedAttributes = ['title', 'description', 'keywords'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['link', 'position', 'parent_id'];

    public function children(){
      return $this->hasMany(CustomPage::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(CustomPage::class, 'parent_id');
    }

    public function scopeParents($query){
        return $query->whereNull('parent_id');
    }

    public function parentLink(){
        $res = '';
        if(!empty($this->parent)){
            $res = $this->parent->link;
        }
        return $res;
    }

}
