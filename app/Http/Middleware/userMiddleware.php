<?php

namespace App\Http\Middleware;
use App\User;
use Closure;
use Auth;
class userMiddleware
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
        // dd(Auth::check());
        // $user = $request->user();
        if (Auth::check()) {
            // dd('masuk');
            return $next($request);
        }else{
        return redirect('/login');
        }
        abort(404);
    }
}
