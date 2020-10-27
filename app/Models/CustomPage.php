<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomPage extends Model
{
    use \Dimsav\Translatable\Translatable;

    public $translationModel = 'App\Models\Translations\CustomPageTranslation';

    public $translatedAttributes = ['title', 'description', 'keywords', 'page_title'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['link', 'position', 'parent_id', 'sort'];

    public function children(){
      return $this->hasMany(CustomPage::class, 'parent_id');
    }

    public function parent(){
        return $this->belongsTo(CustomPage::class, 'parent_id');
    }

    public function scopeParents($query){
        return $query->where('parent_id', 0);
    }
    public function siblings()
    {
        return $this->belongsToMany(CustomPage::class, 'custom_page_siblings', 'custom_page_id', 'custom_page_sibling_id');
    }

    public function asSibling(){
        return $this->belongsToMany(CustomPage::class, 'custom_page_siblings', 'custom_page_sibling_id', 'custom_page_id');
    }

    public function allSiblings(){
        return $this->siblings->merge($this->asSibling)->merge([$this])->sortByDesc('created_at');
    }
    // public function parentLink(){
    //     $res = '';
    //     if(!empty($this->parent)){
    //         $res = $this->parent->link;
    //     }
    //     return $res;
    // }

}
