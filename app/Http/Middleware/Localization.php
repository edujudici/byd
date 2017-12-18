<?php

namespace App\Http\Middleware;

use Closure;

class Localization
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (session()->has('locale')) {
            $locale = session()->get('locale');
            app()->setLocale($locale);
        } 
        
        return $next($request);
    }
}
