<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthBack
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()) {
            if(Auth::user()->role == 'admin') {
                return redirect()->route('admin#homePage');
            }else{
                return redirect()->route('user#homePage');
            }
            if(url()->current() == route('auth#loginPage') || url()->current() == route('auth#registerPage')) {

                return abort(404);
            }
        }
        return $next($request);
    }
}
