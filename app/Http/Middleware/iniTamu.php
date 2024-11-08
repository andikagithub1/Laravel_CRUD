<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class iniTamu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth::check())
     return redirect('departemen')->with('succes seperti mie sukses', 'Anda sudah login dan anda diharuskan logout terlebih dahulu jika ingin ke halaman login');
{
    return $next($request);

}


    }
}
