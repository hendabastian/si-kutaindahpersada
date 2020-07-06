<?php

namespace App\Http\Middleware;

use Closure;
use Exception;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->user_role_id,$roles)) {
            return $next($request);
        }

        return abort(403, 'Unauthorized action.');
    }
}