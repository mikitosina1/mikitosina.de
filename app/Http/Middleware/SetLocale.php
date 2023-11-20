<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class SetLocale
{
	public function handle($request, Closure $next)
	{
		if (!$request->session()->has('locale')) {
			$request->session()->put('locale', 'en'); // Язык по умолчанию, если нет сохраненного в сессии
		}

		$locale = $request->session()->get('locale');

		if (in_array($locale, ['en', 'ru', 'de'])) {
			App::setLocale($locale);
		}

		return $next($request);
	}
}
