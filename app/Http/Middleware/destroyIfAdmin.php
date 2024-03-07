<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;

class destroyIfAdmin
{
    public function handle(Request $request, Closure $next): Response {
        if($request->session()->get('role') !== 2 && $request->session()->get('role') !== 3) {
            session::flush();
            session::save();
            return redirect('/home');
        }
        return $next($request);
    }
}