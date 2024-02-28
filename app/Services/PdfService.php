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

	public function generateResumePdf($data)
	{
		// Логика создания резюме с использованием TCPDF
		$this->tcpdf->AddPage();
		$this->tcpdf->SetFont('Arial', 'I', 16);
		$this->tcpdf->Cell(40, 10, 'Resume');

		// Возвращаем содержимое PDF-документа в виде строки
		return $this->tcpdf->Output('resume.pdf', 'S');
	}

	public function generateExperiencePdf($data)
	{
		// Логика создания описания опыта работы с использованием TCPDF
		$this->tcpdf->AddPage();
		$this->tcpdf->SetFont('Arial', 'B', 16);
		$this->tcpdf->Cell(40, 10, 'Experience');

		// Возвращаем содержимое PDF-документа в виде строки
		return $this->tcpdf->Output('experience.pdf', 'S');
	}
}

