<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PdfService;
use App\Services\ResumePdfService;
use App\Services\ExperiencePdfService;

class PdfController extends Controller
{
	protected $pdfService;

	public function __construct(PdfService $pdfService)
	{
		$this->pdfService = $pdfService;
	}

	public function generateResumePdf(Request $request)
	{
		// Логика получения данных из запроса

		// Логика создания резюме с использованием сервиса
		$pdfContent = $this->pdfService->generateResumePdf($request);

		// Логика возврата PDF-документа в ответе
		return response($pdfContent)
			->header('Content-Type', 'application/pdf');
	}

	public function generateExperiencePdf(Request $request)
	{
		// Логика получения данных из запроса

		// Логика создания описания опыта работы с использованием сервиса
		$pdfContent = $this->pdfService->generateExperiencePdf($request);

		// Логика возврата PDF-документа в ответе
		return response($pdfContent)
			->header('Content-Type', 'application/pdf');
	}
}

