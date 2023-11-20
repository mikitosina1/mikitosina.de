<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;

class LocalizationController extends Controller
{
	public function switch(Request $request, $locale)
	{
		// Проверяем, что выбранный язык поддерживается
		if (!in_array($locale, ['en', 'ru', 'de'])) {
			abort(400, 'Invalid language');
		}
		// Устанавливаем новую локаль
		App::setLocale($locale);
		// Сохраняем язык в сессии, чтобы он сохранялся между запросами
		$request->session()->put('locale', $locale);
		// Редиректим обратно на предыдущую страницу или куда-то еще
		return redirect()->back();
	}
}

