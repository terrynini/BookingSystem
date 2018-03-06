<?php

namespace App\Http\Middleware;

use Closure;
use \App\Admin;
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
        return redirect("/ioi");
        if (Admin::isadmin()->find() == NULL) {
            return redirect("/ioi");
        }

        return $next($request);
    }
}
