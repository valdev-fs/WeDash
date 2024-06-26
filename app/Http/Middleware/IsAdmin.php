<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.')->with('url.intended', url()->current());
        }

        if (!Auth::user()->is_admin) {
            return redirect()->route('embed.powerbi')->with('error', 'You do not have admin access.');
        }

        return $next($request);
    }
}

