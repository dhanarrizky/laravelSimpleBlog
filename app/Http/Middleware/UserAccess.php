<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $role): Response
    {
        // jika role pada user tidak sama dengan role yang di definisikan pada middleware web.php (route)
        // maka middle ware akan  mengeluarkan kode 403
        if(auth()->user()->role != $role)
        {
            abort(403);
        }
        return $next($request);
    }
}
