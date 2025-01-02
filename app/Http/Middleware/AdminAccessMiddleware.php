<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAccessMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Memeriksa apakah pengguna terautentikasi
        if ($request->user() !== null) {
            // Memeriksa apakah pengguna tidak memiliki peran 'admin' atau 'organizer'
            if (!auth()->check() || (!auth()->user()->hasRole('admin') && !auth()->user()->hasRole('organizer'))) {
                abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
            }
        }

        return $next($request);
    }
}
