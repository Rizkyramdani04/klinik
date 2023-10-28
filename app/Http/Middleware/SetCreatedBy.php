<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetCreatedBy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            // Set nilai 'created_by' dengan ID pengguna yang sedang login
            $request->request->add(['created_by' => auth()->user()->id]);
        }

        return $next($request);
    }
}
