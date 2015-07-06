<?php

namespace App\Http\Middleware;

use Closure;

class NotOwner
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

        if (\Auth::user()->own($link)) return $next($request);
        
        flash()->error('You don\'t have permission to edit or delete this link, because your not the owner of it.');
      
        return redirect()->route('home');
    }
}
