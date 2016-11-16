<?php

namespace App\Http\Middleware;

use Closure;

class checkAge
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
        if ($request->name != 'bb') {
//        if ($request->age <= 21) {
//            flash()->error("Why aren't you in in your bed?!?!!!!");
        }

        return $next($request);
    }
}
