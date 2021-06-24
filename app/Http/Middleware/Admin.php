<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\AppController;

class Admin
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
        if(AppController::ehAdmin()){
            return $next($request);
        } else {
            return redirect()->route('lista_ecommerce');
        }
    }
}