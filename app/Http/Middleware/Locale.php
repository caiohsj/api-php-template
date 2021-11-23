<?php

namespace App\Http\Middleware;

use Closure;

class Locale
{
    public function handle($request, Closure $next)
    {
        if ($request->has('locale')) {
            app()->setLocale($request->get('locale'));
        }
        return $next($request);
    }
}
