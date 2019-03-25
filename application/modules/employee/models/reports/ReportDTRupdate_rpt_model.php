<?php
class ReportDTRupdate_rpt_model extends CI_Model {

	var $widths;
	var $aligns;

	public function __construct()
	{
		$this->load->database();		
		//$this->load->model('Reports_model');
	}

	function generate($arrData)
	{
		$this->fpdf->SetTitle('DTR Update');
		$this->fpdf->SetLeftMargin(20);
		$this->fpdf->SetRightMargin(20);
		$this->fpdf->SetTopMargin(20);
		$this->fpdf->SetAutoPageBreak("on",20);
		// $this->fpdf->Image($image, 19, 20.5, 9);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Republic of the Philippines','',0,'L');
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(0,6,'       DEPARTMENT OF SCIENCE AND TECHNOLOGY','',0,'L');
		$this->fpdf->Ln(10);
		$this->fpdf->Cell(0,6,'DTR UPDATE','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',10);
		// $this->fpdf->AddPage('L','','A4');
		$this->fpdf->Ln(5);
	
		
	
	}

	
}

	