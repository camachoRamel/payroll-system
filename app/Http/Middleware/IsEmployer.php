<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsEmployer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in
        if (!Auth::check()) {
            return redirect()->route('loginForm')->with('error', 'Please login first.');
        }

        // Check if user is an employer
        if (Auth::user()->role !== 1) {
            return redirect()->route('loginForm')->with('error', 'Unauthorized Access.');
        }
        return $next($request);
    }
}
