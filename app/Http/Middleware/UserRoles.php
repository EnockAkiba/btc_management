<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserRoles
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
        if(Auth::user()){
            if (!Auth::user()->email_verified_at) {
                
                auth()->logout();
    
                return redirect()->route('sendEmail')
                ->with('message', 'You need to confirm your account. We have sent you an activation code, please check your email.');
            }
            
            if(Auth::user()->statut	=="2")
                return \redirect(route('page404'));
        }
        
        return $next($request);
    }
}
