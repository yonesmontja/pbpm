<?php

namespace App\Http\Middleware;

use Auth;
use Cache;
use Closure;
use App\Models\User;
use Illuminate\Http\Request;


class UserActivity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::check()){
            $expiresAt = now()->addMinutes(2); /* keep online for 2 min */
            Cache::put('user-is-online-'. Auth::user()->id, true, $expiresAt);

            /* last seen */
            User::where('id', Auth::user() -> id)-> update(['last_seen' => now()]);

        }
        return $next($request);
    }
}
