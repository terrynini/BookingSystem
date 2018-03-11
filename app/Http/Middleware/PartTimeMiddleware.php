<?php

namespace App\Http\Middleware;

use Closure;

class PartTimeMiddleware
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
            else if(strpos($request->url(),'cpr') !== false)
                return redirect('cpr');
            else    
                return redirect('');
        }
        return $next($request);
    }
}
