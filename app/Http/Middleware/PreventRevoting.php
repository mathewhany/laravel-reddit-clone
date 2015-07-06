<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class PreventRevoting
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
        
        if (!Auth::user()->getVotingValue($link)) return $next($request);

        flash()->error('You can\'t vote twice.');

        return redirect()->route('home');
    }
}
