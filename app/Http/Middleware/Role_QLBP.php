<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class Role_QLBP
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
        //role 1 la quan ly bo phan
        $user = Auth::user();
        if ($user->role == 1){
            return $next($request);
        }
        else 
            return redirect()->back();
    }
}
