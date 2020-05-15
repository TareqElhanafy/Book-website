<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
// use Cache;
// use Auth;

class UserOnline
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
      if (Auth::check()) {
        $expieredAt=Carbon::now()->addMinutes(2);
        Cache::put('user-is-online-'.Auth::user()->id,true,$expieredAt);
      }
        return $next($request);
    }
}
