<?php

namespace App\Http\Middleware;

use Closure;

class isOwner
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
        if ($request->user()->id !== $request->links->user_id) {
            flash()->error('You don\'t have permission to edit or delete this link, because your not the owner of it.');
            return redirect()->route('home');
        }

        return $next($request);
    }
}
