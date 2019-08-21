<?php
//the file is to merge bagisto admin auth guard with Laravel Stats Tracker
namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class AdminAuthHelper extends Model
{
    public static function check()
    {
        return auth()->guard('admin')->check();
    }

    public static function user()
    {
        return auth()->guard('admin')->user();
    }
}