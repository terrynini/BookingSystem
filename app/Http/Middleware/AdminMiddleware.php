<?php

namespace App\Http\Middleware;

use Closure;
use \App\Userinfo;
class AdminMiddleware
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
        if (Userinfo::MatchAdmin()->count() == 0) {
            if(strpos($request->url(),'ioi') !== false)
                return redirect('ioi');
            else
                return redirect('cpr');
        }

        return $next($request);
    }
}
