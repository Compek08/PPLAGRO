<?php

namespace App\Http\Middleware;
// use App\User;
use Closure;
use Auth;
class user
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
        $user = $request->user();
        if (Auth::check()) {
            return $next($request);
        }

        return abort(404);
    }
}
