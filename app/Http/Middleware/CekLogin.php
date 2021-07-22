<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekLogin
{
    public function handle(Request $request, Closure $next)
    {
        $cek_users = session('data_login');
        // $cookie = Cookie::get('remember_me');
        if ($cek_users) {
            return $next($request);
        // } elseif (!$cookie == null) {
        //     session(['data_login' => $cookie]);
        //     return $next($request);
        } else {
            return redirect()->route('login');
        }
    }
}
