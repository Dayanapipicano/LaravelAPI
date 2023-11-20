<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Spatie\Permission\Guard;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role, $guard = null)
    {
        $authGuard = Auth::guard($guard);
        $user = $authGuard->user();
       
        if (!in_array($role, $user->getRoleNames()->toArray())) {
            throw UnauthorizedException::forRoles([$role]);
        }
    
        return $next($request);
    }
    
    
    
}
