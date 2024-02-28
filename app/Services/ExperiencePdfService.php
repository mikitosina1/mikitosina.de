<?php

namespace App\Services;

class ExperiencePdfService extends PdfService
{
	public function generateExperiencePdf($data)
	{
		// Логика создания описания опыта работы с использованием TCPDF
		$this->tcpdf->AddPage();
		$this->tcpdf->SetFont('Arial', 'B', 16);
		$this->tcpdf->Cell(40, 10, 'Experience');

		// Возвращаем содержимое PDF-документа в виде строки
		return $this->tcpdf->Output('experience.pdf', 'I');//I to S
	}
}
