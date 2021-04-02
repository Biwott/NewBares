<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyBanned
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
        if ($request->user()->status == 0) {
            return redirect('user/login');
        }
        return $next($request);
    }
}
