<?php

namespace App\Services;

class ResumePdfService extends PdfService
{
	public function generateResumePdf($data)
	{
		// Логика создания резюме с использованием TCPDF
		$this->tcpdf->AddPage();
		$this->tcpdf->SetFont('Arial', 'B', 16);
		$this->tcpdf->Cell(40, 10, 'Resume');

		// Возвращаем содержимое PDF-документа в виде строки
		return $this->tcpdf->Output('resume.pdf', 'I'); //I to F
	}
}
