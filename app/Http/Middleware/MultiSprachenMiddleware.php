<?php

namespace App\Http\Middleware;

use App\Models\Sprache;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class MultiSprachenMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		$sprachen = Sprache::all();
		$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		/**
		 * Abfrage einbauen wenn Benutzer eingeloggt nicht die Server Locale Ziehen sondern die eingestellte
		 */
		if(!empty($request->language))
		{
			session()->put('language', $request->language);
			App::setLocale($request->language);
		}
		App::setlocale(session('language')?? $language);


		view::share('sprachen', $sprachen);
		return $next($request);
	}
}
