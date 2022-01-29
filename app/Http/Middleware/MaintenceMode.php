<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class MaintenceMode
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
        $user = Auth::user();

        if( !($user->hasRole('admin') === true || $user->hasRole('test') === true) ){
            return redirect(route('maintence') );
        }

        return $next($request);
    }
}
