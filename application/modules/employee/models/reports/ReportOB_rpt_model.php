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
		$this->fpdf->SetTitle('Official Business');
		$this->fpdf->SetLeftMargin(20);
		$this->fpdf->SetRightMargin(20);
		$this->fpdf->SetTopMargin(20);
		$this->fpdf->SetAutoPageBreak("on",20);
		// $this->fpdf->AddPage('L','','A4');
		
		// $this->fpdf->Image($image, 19, 20.5, 9);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Republic of the Philippines','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','B',11);
		$this->fpdf->Cell(0,6,'       DEPARTMENT OF SCIENCE AND TECHNOLOGY','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Cell(0,6,'       Central Office','',0,'C');
		$this->fpdf->Ln(10);
		$this->fpdf->SetFont('Arial','B',11);
		$this->fpdf->Cell(0,6,'PERSONNEL TRAVEL PASS','',0,'C');
		$this->fpdf->Ln(5);
		$this->fpdf->SetFont('Arial','',10);
			
		$this->fpdf->Ln(5);
	
		
	
	}

	
}

	
	