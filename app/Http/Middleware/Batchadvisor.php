<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Batchadvisor
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
        if(Auth::user()->admin!=3)
        {
            //Session::flash('info','You donot have permission to perform this action!');
            return redirect()->back();
        }
        return $next($request);
    }
}
