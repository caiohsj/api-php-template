<?php

namespace App\Http\Middleware;

use Closure;

class Locale
{
    public function handle($request, Closure $next)
    {
        $locales = [
            'en',
            'pt-BR',
        ];

        if ($request->has('locale') && in_array($request->locale, $locales)) {
            app()->setLocale($request->locale);
        }
        return $next($request);
    }
}
