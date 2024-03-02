<?php

namespace App\Services;

use TCPDF;

class PdfService
{
	protected TCPDF $tcpdf;

	public function __construct()
	{
		$this->tcpdf = new TCPDF();
	}

	public function generatePdf($data)
	{
		// Логика создания резюме с использованием TCPDF
		$this->tcpdf->AddPage();
		$this->tcpdf->SetFont('times', 'I', 16);
		$this->tcpdf->Cell(40, 10, 'Resume');

		// Возвращаем содержимое PDF-документа в виде строки
		return $this->tcpdf->Output('resume.pdf', 'I');
	}
}

