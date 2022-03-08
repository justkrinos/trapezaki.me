<?php

namespace App\Http\Middleware;

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

            return '/login';

            // if(str_contains($request->url(),'admin')){
            //     return '/login';
            // }

            // if(str_contains($request->url(),'www')){
            //     return '/make-a-reservation';
            // }

            // if(str_contains($request->url(),'business')){
            //     return '/login';
            // }


        }


    }
}
