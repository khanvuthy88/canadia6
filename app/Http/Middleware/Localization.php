<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;
use Session;

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
        // if(\Session::has('locale')){
        //     \App::setlocale(\Session::get('locale'));
        // }
        App::setLocale(Session::has('locale') ? Session::get('locale') : Config::get('app.locale'));
        return $next($request);
    }
}
