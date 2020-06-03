<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\MenuTranslation';

    public $translatedAttributes = ['title', 'keywords'];
    //

    protected $fillable = ['link', 'position'];

    public function children(){
        return $this->hasMany(Menu::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(Menu::class, 'parent_id');
    }

    public function scopeParents($query){
        return $query->whereNull('parent_id');
    }

    public function deepLevel(){
        if(!empty($this->parent_id)){
            if(!empty($this->parent->parent_id)){
                return 2;
            }
            return 1;
        }
        return 0;
    }
}
