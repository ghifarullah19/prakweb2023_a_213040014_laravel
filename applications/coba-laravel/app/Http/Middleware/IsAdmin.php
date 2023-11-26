<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Menangani jika user tidak login atau bukan admin maka akan diarahkan ke halaman 403
        // if (auth()->guest() || auth()->user()->username !== 'ghifarullah') {
            //     abort(403);
            // }
            
        // Menangani jika user tidak login atau bukan admin maka akan diarahkan ke halaman 403
        if (!auth()->check() || !auth()->user()->is_admin) {
            abort(403);
        }

        return $next($request);
    }
}
