<?php

namespace App\Http\Middleware;

use App\Http\Controllers\BitacoraController;
use App\Models\Invitado;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            $var='Bienvenido user';
            dd($var);
            return route('login'); 
             
        }
    }
}
