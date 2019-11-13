<?php

namespace App\Http\Middleware;

use Closure;
use phpDocumentor\Reflection\Types\Self_;
use Request;
use Illuminate\Support\Facades\App;

class LocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public static $mainLanguage = null;
    public static $languages = ['en', 'es', 'fr', 'ru', 'pl', 'ar'];

    public static function getLocale()
    {
        $uri = Request::path();
        $segmentsURI = explode('/',$uri);
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], self::$languages)) {

            return $segmentsURI[0];

        } else {
            return  self::$mainLanguage;
        }
    }

    public function handle($request, Closure $next)
    {
        $locale = self::getLocale();
        if($locale) {
            App::setLocale($locale);
        }
        return $next($request);
    }
}
