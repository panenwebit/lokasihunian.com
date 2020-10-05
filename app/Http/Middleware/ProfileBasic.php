<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ProfileBasic
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(auth()->user()->profile->fullname == ''){
            return redirect('profile/create');
        }
        return $next($request);
    }
}
