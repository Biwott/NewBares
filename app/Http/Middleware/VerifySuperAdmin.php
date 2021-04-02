<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifySuperAdmin
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
        if ($request->user()->active > 1) {
            return redirect('admin/dashboard');
        }
        return $next($request);
    }
}
