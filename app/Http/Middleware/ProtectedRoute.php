<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProtectedRoute
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
			if ($user->role_id == 2) {
                return redirect('/guru');
			} elseif ($user->role_id != 1) {
                return redirect('/');
			}
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
