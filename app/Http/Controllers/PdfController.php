<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PdfController extends Controller
{
	public function generatePdf(Request $request)
	{
		// Получаем тип сервиса из запроса (предположим, что тип передается в запросе)
		$serviceType = $request->input('type');

		// Получаем экземпляр сервиса из контейнера зависимостей
		$pdfService = app()->make('App\\Services\\' . $serviceType . 'PdfService');

		// Логика создания PDF-документа с использованием выбранного сервиса
		$pdfContent = $pdfService->generatePdf($request);

		// Логика возврата PDF-документа в ответе
		return response($pdfContent)
			->header('Content-Type', 'application/pdf');
	}
}

