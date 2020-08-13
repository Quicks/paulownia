<?php

namespace App\Http\Middleware;

use Closure;
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

    public static function getLocale()
    {
        $mainLanguage = config('translatable.locale');
        $languages = config('translatable.locales');
        $uri = Request::path();
        $segmentsURI = explode('/',$uri);
        if (!empty($segmentsURI[0]) && in_array($segmentsURI[0], $languages)) {
            return $segmentsURI[0];
        }
        else {
            return $mainLanguage;
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
