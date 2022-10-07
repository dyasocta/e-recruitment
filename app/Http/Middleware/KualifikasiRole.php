<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class KualifikasiRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$rolekualifikasi)
    {
        if (in_array($request->user()->kualifikasi, $rolekualifikasi)) {
            return $next($request);
        }


        // } elseif (Auth::user()->kualifikasi == 'magang') {
        //     return Redirect::to('/dashboard');
        // } elseif (Auth::user()->kualifikasi == 'mobile') {
        //     return Redirect::to('/dashboard');
        // } elseif (Auth::user()->kualifikasi == 'juniorweb') {
        //     return Redirect::to('/dashboard');
        // } elseif (Auth::user()->kualifikasi == 'seniorweb') {
        //     return Redirect::to('/dashboard');
        // }
    }
}
