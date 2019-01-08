<?php
class ReportOB_rpt_model extends CI_Model {

	var $widths;
	var $aligns;

	public function __construct()
	{
		$this->load->database();		
		//$this->load->model('Reports_model');
	}

	function generate($arrData)
	{
		$this->fpdf->SetTitle('Travel Summary Report');
		$this->fpdf->SetLeftMargin(20);
		$this->fpdf->SetRightMargin(20);
		$this->fpdf->SetTopMargin(20);
		$this->fpdf->SetAutoPageBreak("on",20);
		$this->fpdf->AddPage('L','','A4');
		
		// $this->fpdf->Image($image, 19, 20.5, 9);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Republic of the Philippines','',0,'L');
		$this->fpdf->Ln(5);
		$this->fpdf->Cell(0,6,'       DEPARTMENT OF SCIENCE AND TECHNOLOGY','',0,'L');
		$this->fpdf->Ln(10);
		$this->fpdf->Cell(0,6,'TRAVEL REPORT','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',10);

				
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->Cell(10,5,'NO.','LTRB',0,'C');
		$this->fpdf->Cell(50,5,'NAME','LTRB',0,'C');
		$this->fpdf->Cell(20,5,'AGENCY','LTRB',0,'C');
		$this->fpdf->Cell(30,5,'DESIGNATION','LTRB',0,'C');
		$this->fpdf->Cell(30,5,'DESTINATION','LTRB',0,'C');
		$this->fpdf->Cell(48,5,'TRAVEL DATES','LTRB',0,'C');
		$this->fpdf->Cell(55,5,'PURPOSE','LTRB',0,'C');
		$this->fpdf->SetFont('Arial','B',8);
		$this->fpdf->Cell(25,5,'WORKING DAYS','LTRB',0,'C');
		$this->fpdf->SetFont('Arial','',8);
			
		$this->fpdf->Ln(5);
	
		
	
	}

	
}

	