<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->level === '1') {
            return $next($request);
        }

        return redirect()->route('LoginPage')->with('error', 'คุณไม่มีสิทธิ์เข้าถึงระบบ');

    }
}
