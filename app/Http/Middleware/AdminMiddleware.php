<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (Auth::check()) {
			$user = Auth::user();
			switch ($user->isAdmin) {
				case true:
					return $next($request);
					break;
				default:
					return redirect(route('home'));
					break;
			}
		}
		return redirect()->route('login');
	}
}
