<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */

    public function handle($request, Closure $next, $role)
    {
        // Check admin role
        if ($role === 'admin' && Auth::guard('admin')->check()) {
            return redirect('/admin-dashboard');
        }

        // Check  user role
        if ($role === 'user' && Auth::guard('web')->check()) {
            // Jika pengguna adalah user, lanjutkan ke middleware berikutnya
            return redirect('/halamanutama');
        }

        // Redirect jika tidak diautentikasi
        if ($role === 'admin') {
            return redirect('/admin-dashboard');
        }

        return redirect('/log');
    }

}


