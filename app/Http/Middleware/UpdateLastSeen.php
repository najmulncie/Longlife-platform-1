<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UpdateLastSeen
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       if (Auth::check()) {
            $user = Auth::user();

            $user->last_seen = now();
            $user->save();

            \Log::info("Updated last_seen for user ID: {$user->id} at " . now());
        }

        // \Log::info("LastSeen middleware updated last_seen for user ID: {$user->id}");

        return $next($request);
    }
}

