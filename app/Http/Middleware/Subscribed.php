<?php

namespace App\Http\Middleware;

use Closure;

class Subscribed
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
        
        if (!$request->user()->isSubscribed()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->view('.401',[],401);
            }
            return response()->view('.401',[],401);
//            return redirect('physician/subscription');
        }       
        return $next($request);
    }
}
