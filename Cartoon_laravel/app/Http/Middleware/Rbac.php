<?php

namespace App\Http\Middleware;

use App\Admin_user;
use Closure;
use Illuminate\Support\Facades\Route;

class Rbac
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $route = Route::current()->uri();
        $user = Admin_user::find(6);
        if(!$user->can($route)){
            return back();
        }
        return $next($request);
    }
}
