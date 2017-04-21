<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param  string|null $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		if (Auth::check()) {
			$user = Auth::user();
			switch ($user->isAdmin) {
				case true:
					return redirect(route('admin.home'));
					break;
				default:
					return redirect(route('home'));
					break;
			}
		}
		return $next($request);
	}
}
