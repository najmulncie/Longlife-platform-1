<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('admin')->check()) {
            return $next($request);
        }

        return redirect()->route('admin.login')->with('error', 'Access denied.');
    }
}
