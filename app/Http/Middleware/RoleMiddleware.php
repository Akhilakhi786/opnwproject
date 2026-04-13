<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // If not logged in → redirect login
        if (!Auth::check()) {
            return redirect('/login');
        }

        // If role does not match
        if (Auth::user()->role !== $role) {

            // Redirect based on role
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard');
            }

            return redirect('/employee/dashboard');
        }

        return $next($request);
    }
}