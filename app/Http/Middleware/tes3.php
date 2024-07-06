<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAnnouncementShown
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->has('announcement_shown')) {
            return $next($request);
        }

        return redirect()->route('announcement.show')->with('announcement_shown', true);
    }
}
