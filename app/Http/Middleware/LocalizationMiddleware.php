<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class LocalizationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(session('locale') !== null)
        {
            $locale=session()->get('locale');
            App::setLocale($locale);
            
        }
        else
        {
            App::setLocale('en');
        }
        return $next($request);
    }
}
