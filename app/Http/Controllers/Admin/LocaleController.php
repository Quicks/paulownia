<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LocaleController extends Controller{
  public function setLocale(Request $request){
    $locale = $request->newLocale;
    if (! in_array($locale, ['en', 'es', 'ru'])) {
        abort(400);
    }

    $request->session()->put('locale', $locale);
    return redirect()->back();
  }
}