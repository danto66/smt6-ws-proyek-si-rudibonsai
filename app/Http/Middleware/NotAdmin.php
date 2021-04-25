<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class NotAdmin
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
        if (auth()->check()) {
            if (auth()->user()->role_id < 3) {
                return redirect()->route('admin.dashboard');
            }
        }

        return $next($request);
    }
}
