<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Owner
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
        $link = $request->links;
        
        if (!Auth::user()->own($link)) return $next($request);

        flash()->error('You can\'t vote your own link.');

        return redirect()->route('home');
    }
}
