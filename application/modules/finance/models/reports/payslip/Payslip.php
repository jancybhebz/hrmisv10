<?php

/**
 * SystemName: Dost International S&T Linkages Database System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
class Payslip extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('finance_reports/payslip/Payslip_template');
		$this->fpdf = new Payslip_template();
	}

	function generate()
	{
		$this->fpdf->AddPage('P');
		
		$this->payslip_header();

		# employee details
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(28,5,'Employee No.:',0,0,'L');
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->cell(162,5,'[ employee number ]',0,1,'L');

		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(28,5,'Employee Name:',0,0,'L');
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->cell(107,5,'[ employee name ]',0,0,'L');
		
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(25,5,'Basic Monthly:',0,0,'R');
		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->cell(30,5,'[ basic monthly ]',0,1,'L');
		
		$this->fpdf->ln(5);

		# payroll header
		$this->fpdf->SetFillColor(153,153,153);
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->SetTextColor(255,255,255);

		$this->fpdf->cell(56,5,'EARNINGS',0,0,'C',1);
		$this->fpdf->cell(7,5,'',0,0,'C');
		$this->fpdf->cell(60,5,'BENEFITS DETAIL',0,0,'C',1);
		$this->fpdf->cell(7,5,'',0,0,'C');
		$this->fpdf->cell(60,5,'DEDUCTIONS DETAIL',0,1,'C',1);
		
		$this->fpdf->SetTextColor(0,0,0);
		$this->fpdf->SetFillColor(204,204,204);
		$this->fpdf->SetFont('Arial','',9);

		$this->fpdf->cell(56,5,'',0,0,'L');
		$this->fpdf->cell(7,5,'',0,0,'L');
		$this->fpdf->cell(35,5,'Description',0,0,'C',1);
		$this->fpdf->cell(5,5,'',0,0,'L');
		$this->fpdf->cell(20,5,'Amount ',0,0,'R',1);
		$this->fpdf->cell(7,5,'',0,0,'L');
		$this->fpdf->cell(35,5,'Description',0,0,'C',1);
		$this->fpdf->cell(5,5,'',0,0,'L');
		$this->fpdf->cell(20,5,'Amount ',0,0,'R',1);

		# payroll details


		
		$this->fpdf->ln(5);
		$this->fpdf->cell(0,5,'..................................................................................................................................................................................................................................................', 0, 1, 'C');

		$this->fpdf->Output();
	}


	// payslip header
	function payslip_header()
	{
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(0,5,'DEPARTMENT OF SCIENCE AND TECHNOLOGY',0,1,'L');

		$this->fpdf->SetFont('Arial','i',8);
		$this->fpdf->cell(95,5,'[ department name ]',0,0,'L');

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->cell(95,5,'Employee\'s Copy',0,1,'R');

		$this->fpdf->ln(8);
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(0,5,'DEPARTMENT OF SCIENCE AND TECHNOLOGY',0,1,'C');

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->cell(0,5,'For Pay Period: [October 1 - 15, 2017]',0,1,'C');

		$this->fpdf->ln(5);

	}

}