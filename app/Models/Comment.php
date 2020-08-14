<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['owner', 'email', 'website', 'text', 'commentable_type', 'commentable_id', 'parent_id' ];

    public function commentable()
    {
        return $this->morphTo();
    }

    public function childs ()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }

    public function scopeParents($query){
        return $query->where('parent_id', 0);
    }

}
