<?php

/**
 * SystemName: Dost International S&T Linkages Database System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
class Remittances extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('Fpdf_gen');
		$this->fpdf = new FPDF();
	}

	function generate()
	{
		$this->fpdf->AddPage('P');

		# Begin Header
		$this->fpdf->Image('assets/images/logo.png',10,10,20,20);
		$this->fpdf->SetFont('Times','',12);
		$this->fpdf->Cell(25);
		$this->fpdf->Cell(0,10,'Republic of the Philippines',0,0,'L');
		$this->fpdf->Ln(7);
		$this->fpdf->SetFont('Arial','B',14);
		$this->fpdf->Cell(25);
		$this->fpdf->Cell(0,8,'DOST',0,0,'L');
		$this->fpdf->SetTextColor(0,0,0);

		$this->fpdf->SetFont('Arial','B',12);
		$this->fpdf->Ln(15);
		$this->fpdf->Cell(0, 6,"Remittance List", 0, 1, "C");
		$this->fpdf->SetFont('Arial','B',10);
		$this->fpdf->Cell(0, 6,"[Report title]", 0, 1, "C");
		$this->fpdf->SetFont('Arial','');
		$this->fpdf->Cell(0, 6,"From [year] to [year]", 0, 1, "C");
		$this->fpdf->Ln(2);

		$this->fpdf->SetFont('Arial','B');
		$this->fpdf->Cell(15, 5,"Name :",0,0,"L");
		$this->fpdf->SetFont('Arial','');
		$this->fpdf->Cell(160, 5,"[name]",0,0,"L");
		$this->fpdf->Ln(10);
		# End Header

		# Begin Table header
		$this->fpdf->SetFont('Arial','B');
		$this->fpdf->Cell(20, 5,"No",1,0,"C");
		$this->fpdf->Cell(53, 5,"Month",1,0,"C");
		$this->fpdf->Cell(53, 5,"Year",1,0,"C");
		$this->fpdf->Cell(60, 5,"Amount",1,1,"C");
		# End Table header

		# Begin Table Footer
		$this->fpdf->SetFont('Arial','B');
		$this->fpdf->Cell(126, 5,"Grand Total",1,0,"R");
		$this->fpdf->Cell(60, 5,"[Total]",1,0,"L");

		$this->fpdf->SetFont('Arial','',11);
		$this->fpdf->Ln(15);
		$this->fpdf->Cell(0,5,'CERTIFIED CORRECT:',0,0,'L');
		$this->fpdf->Ln(15);
		$this->fpdf->SetFont('Arial','B');
		$this->fpdf->Cell(0,5,'[ HELEN V. GIANAN ]',0,1,'L');
		$this->fpdf->Cell(0,5,'[ Chief Accountant ]',0,0,'L');
		# End Table Footer

		$this->fpdf->Output();
	}

}