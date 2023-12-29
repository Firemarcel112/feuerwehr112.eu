<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Sprache;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class MultiSprachenMiddleware
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
	 */
	public function handle(Request $request, Closure $next): Response
	{
		$sprachen = Cache::rememberForever('sprachen', function () {
			return Sprache::all();
		});
		$language = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
		/**
		 * @todo Abfrage einbauen wenn Benutzer eingeloggt nicht die Server Locale Ziehen sondern die eingestellte
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
