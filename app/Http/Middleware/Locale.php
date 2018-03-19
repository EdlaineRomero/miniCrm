<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App;
use Config;

class Locale
{
    public function handle($request, Closure $next){
    	$response=$next($request);

    	if(Session::has('locale')){

    		App::setLocale(Session::get('locale'));

    	}else{

    		App::setLocale(Config::get('app.fallback_lacale'));

    	}
    	 
    	return $response;
    }
}
