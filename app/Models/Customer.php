<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['first_name', 'channel_id', 'last_name', 'gender', 'date_of_birth', 'email', 'phone', 'password', 'customer_group_id', 'subscribed_to_news_letter', 'is_verified', 'token', 'notes', 'status'];

    protected $hidden = ['password', 'remember_token'];

    public function orders ()
    {
        return $this->hasMany('App\Models\Order', 'customer_id');
    }

    public function fullName(){
        return $this->first_name . ' ' . $this->last_name;
    }
}
