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
		$this->load->helper('payroll_helper');
		$this->load->model(array('reports/payslip/Payslip_model','hr/Hr_model','finance/Payroll_process_model'));
		$this->fpdf = new Payslip_template();
	}

	function generate()
	{
		foreach(array("Employee's Copy","Cashier's Copy") as $copy):
			$origin_y = 1;
			$benefits = $this->Payslip_model->income_list($_GET['empno'], $_GET['pgroup']);
			$deductions = $this->Payslip_model->deduction_list($_GET['empno'], $_GET['pgroup']);
			$process_details = $this->Payroll_process_model->getData($_GET['pgroup']);
			$period = salary_schedule($process_details[0]['salarySchedule'],$_GET['period']);
			$period_range = salary_schedule($process_details[0]['salarySchedule'],$_GET['period'],1);
			$period_range = payroll_date($process_details[0]['salarySchedule'],$_GET['period']);

			#Period pay
			$arrperiod_pay = $this->Payslip_model->get_employee_salary($_GET['pgroup'],$_GET['empno']);
			$period_pay = $arrperiod_pay != '' ? $arrperiod_pay[$period] : 0;
			#Undertime Late
			$arrut_abs = $this->Payslip_model->get_employee_undabs($_GET['pgroup'],$_GET['empno']);
			$ut_abs = $arrut_abs != '' ? $arrut_abs[$period] : 0;
			#Overtime pay
			$arrot = $this->Payslip_model->get_employee_overtime($_GET['pgroup'],$_GET['empno']);
			$ot = $arrot != '' ? $arrot[$period] : 0;

			$process_codes = $this->Payroll_process_model->get_process_code($_GET['pgroup']);
			// echo '<pre>';
			// echo '<br>period_range = ';print_r($period_range);
			// echo '<br>period = ';print_r($period);
			// echo '<br>_GET<br>';print_r($_GET);
			// echo '<br>process_details<br>';print_r($process_details);
			// echo '<br>benefits<br>';print_r($benefits);
			// echo '<br>deductions<br>';print_r($deductions);
			// die();
			$this->fpdf->AddPage('P');
			$this->payslip_header($copy);
			$this->fpdf->SetFont('Arial','',9);
			$this->fpdf->cell(0,5,'For Pay Period: '.date('F', mktime(0, 0, 0, currmo(), 10)).' '.$period_range.', '.$_GET['ps_yr'],0,1,'C');
			$this->fpdf->ln(5);

			# begin header
			$this->fpdf->SetFont('Arial','B',9);
			$this->fpdf->Cell(30,5,'Employee No.:',0,0,'L');
			$this->fpdf->SetFont('Arial','',9);
			$this->fpdf->Cell(30,5,$_GET['empno'],0,1,'L');
			$this->fpdf->SetFont('Arial','B',9);
			$this->fpdf->Cell(30,5,'Employee Name:',0,0,'L');
			$this->fpdf->SetFont('Arial','',9);
			$this->fpdf->Cell(50,5,strtoupper(employee_name($_GET['empno'])),0,0,'L');
			$this->fpdf->SetFont('Arial','B',9);
			$this->fpdf->Cell(91,5,'Basic Monthly:',0,0,'R');
			$this->fpdf->SetFont('Arial','',9);
			$this->fpdf->Cell(20,5,number_format($arrperiod_pay['actualSalary'],2,'.',','),0,1,'R');
			# end header

			# begin column header
			$this->fpdf->Ln(1);
			
			$this->fpdf->SetFillColor(153,153,153);
			$this->fpdf->SetFont('Arial','B',9);
			$this->fpdf->SetTextColor(255,255,255);
			$this->fpdf->Cell(57,5,'EARNINGS', 0, 0, 'C',1);
			$this->fpdf->Cell(10,5,'', 0, 0, 'C');
			$this->fpdf->Cell(57,5,'BENEFITS DETAIL', 0, 0, 'C', 1);
			$this->fpdf->Cell(10,5,'', 0, 0, 'C');
			$this->fpdf->Cell(57,5,'DEDUCTIONS DETAIL', 0, 1, 'C', 1);
			
			$this->fpdf->SetTextColor(0,0,0);
			$this->fpdf->SetFillColor(204,204,204);
			$this->fpdf->SetFont('Arial','',8);
			$this->fpdf->Cell(57,5,'', 0, 0, 'C');
			$this->fpdf->Cell(10,5,'', 0, 0, 'C');
			$this->fpdf->Cell(36,5,'Description', 0, 0, 'C', 1);
			$this->fpdf->Cell(3,5,'', 0, 0, 'C');
			$this->fpdf->Cell(18,5,'Amount', 0, 0, 'C', 1);
			$this->fpdf->Cell(10,5,'', 0, 0, 'C');
			$this->fpdf->Cell(37,5,'Description', 0, 0, 'C', 1);
			$this->fpdf->Cell(3,5,'', 0, 0, 'C');
			$this->fpdf->Cell(17,5,'Amount', 0, 1, 'C',1);
			
			$this->fpdf->SetFont('Arial','',8); 
			# end column header

			# begin benefits
			$ben_y = 64;
			$total_benefits = 0;
			foreach($benefits as $benefit):
				$period_amt = $benefit[$period];
				if($period_amt!='0.00'):
					$this->fpdf->SetXY(76,$ben_y + $origin_y);   
					$this->fpdf->Cell(35,5,$benefit['incomeDesc'], 0, 0, 'L');
					$this->fpdf->Cell(3,5,'', 0, 0, 'C');
					$this->fpdf->Cell(20,5,number_format($period_amt, 2,'.',','), 0, 1, 'R');
					$ben_y += 4;
					$total_benefits = $total_benefits + $period_amt;
				endif;
			endforeach;
			if($total_benefits > 0):
				$this->fpdf->SetFont('Arial','B',8);
				$this->fpdf->SetXY(76,$ben_y+$origin_y+3);   
				$this->fpdf->Cell(35,5,'Total Benefits - ', 0, 0, 'L');
				$this->fpdf->Cell(3,5,'', 0, 0, 'C');
				$this->fpdf->Cell(20,5,number_format($total_benefits, 2,'.',','), 'T', 1, 'R');
				$this->fpdf->SetXY(76,$ben_y+$origin_y+10);			
			else:
				$this->fpdf->SetXY(76,$ben_y+$origin_y+3);   
			endif;
			$this->fpdf->SetFont('Arial','',8);
			$this->fpdf->Cell(60,5,'*** Nothing Follows ***', 0, 0, 'C');
			# end benefits

			# begin deductions
			$ded_y = 64;
			$total_deductions = 0;
			foreach($deductions as $deduction):
				$period_amt = $deduction[$period];
				if($period_amt!='0.00'):				
					$this->fpdf->SetXY(143,$ded_y + $origin_y);   
					$this->fpdf->Cell(37,5,$deduction['deductionDesc'], 0, 0, 'L');
					$this->fpdf->Cell(3,5,'', 0, 0, 'C');
					$this->fpdf->Cell(18,5,number_format($period_amt, 2,'.',','), 0, 1, 'R');
					$ded_y += 4;
					$total_deductions = $total_deductions + $period_amt;
				endif;
			endforeach;
			if($total_deductions > 0):
				$this->fpdf->SetFont('Arial','B',8);
				$this->fpdf->SetXY(143,$ded_y + $origin_y +3);   
				$this->fpdf->Cell(37,5,'Total Deductions - ', 0, 0, 'L');
				$this->fpdf->Cell(3,5,'', 0, 0, 'C');
				$this->fpdf->Cell(18,5,number_format($total_deductions, 2,'.',','), 'T', 1, 'R');
				$this->fpdf->SetXY(143,$ded_y + $origin_y +10);   
			else:
				$this->fpdf->SetXY(143,$ded_y + $origin_y +3);   
			endif;
			$this->fpdf->SetFont('Arial','',8);
			$this->fpdf->Cell(60,5,'*** Nothing Follows ***', 0, 0, 'C');
			# end deductions

			# begin earnings
			$gross_pay = $period_pay - $ut_abs + $ot;
			$net_pay = $gross_pay + $total_benefits - $total_deductions;

			$this->fpdf->SetXY(9,64 + $origin_y); 
			$this->fpdf->SetFont('Arial','',9);
			$this->fpdf->Cell(34,5,'Period Pay:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($period_pay,2,'.',','), 0, 1, 'R');
			$this->fpdf->SetX(9);
			$this->fpdf->Cell(34,5,'Undertime/Abs.:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($ut_abs, 2,'.',','), 0, 1, 'R');
			$this->fpdf->SetX(9);
			$this->fpdf->Cell(34,5,'Overtime:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($ot, 2,'.',','), 0, 1, 'R');
			$this->fpdf->SetX(9);
			$this->fpdf->Cell(34,5,'Gross Pay:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($gross_pay, 2,'.',','), 0, 1, 'R');		
			$this->fpdf->Ln(8);
			$this->fpdf->SetX(9);
			$this->fpdf->Cell(34,5,'Benefits:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($total_benefits, 2,'.',','), 0, 1, 'R');		
			$this->fpdf->SetX(9);
			$this->fpdf->Cell(34,5,'Deductions:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($total_deductions, 2,'.',','), 0, 1, 'R');		
			$this->fpdf->Ln(8);
			$this->fpdf->SetFont('Arial','BU',10);
			$this->fpdf->Cell(34,5,'Net Pay:', 0, 0, 'L');
			$this->fpdf->Cell(25,5,number_format($net_pay, 2,'.',','), 0, 1, 'R');		
			$this->fpdf->Ln(2);
			# end earnings

			# begin signature and below details
			$this->fpdf->SetFont('Arial','',8);
			$this->fpdf->Cell(120,5,'', 0, 0, 'C');
			$this->fpdf->Cell(71,5,'', 'B', 1, 'C');
			$this->fpdf->Cell(120,5,'', 0, 0, 'C');
			$this->fpdf->Cell(70,5,'SIGNATURE', 0, 1, 'C');
			$this->fpdf->Cell(120,5,'', 0, 0, 'C');
			$this->fpdf->Cell(70,5,'RECEIVED FULL AMOUNT STATED BELOW', 0, 1, 'C');
			$this->fpdf->SetFont('Arial','BU',9);
			$this->fpdf->Cell(120,5,'', 0, 0, 'C');
			$this->fpdf->Cell(70,5,number_format($net_pay, 2,'.',','), 0, 1, 'C');
			# end signature

			if($process_details[0]['employeeAppoint'] == 'P' && $process_details[0]['processCode'] == 'SALARY'):
				$this->fpdf->SetX(9);
				$this->fpdf->SetFont('Arial','',9); 
				$this->fpdf->Cell(37,5,strtoupper(employee_name($_GET['empno'])), 0, 0, 'L');
				$this->fpdf->SetFont('Arial','I',8);
				$this->fpdf->Cell(0,5,'MC Benefits received herein are subject for refund if COA found it not in order.', 0, 1, 'R');
			endif;
			$this->fpdf->SetFont('Arial','B',10);
			$this->fpdf->ln(5);
			$this->fpdf->cell(0,5,'..................................................................................................................................................................................................................................................', 0, 1, 'C');
		endforeach;

		$this->fpdf->Output();
	}


	// payslip header
	function payslip_header($copy)
	{
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(0,5,'DEPARTMENT OF SCIENCE AND TECHNOLOGY',0,1,'L');

		$this->fpdf->SetFont('Arial','i',8);
		$this->fpdf->cell(95,5,office_name(employee_office($_GET['empno'])),0,0,'L');

		$this->fpdf->SetFont('Arial','',9);
		$this->fpdf->cell(95,5,$copy,0,1,'R');

		$this->fpdf->ln(8);
		$this->fpdf->SetFont('Arial','B',9);
		$this->fpdf->cell(0,5,'EMPLOYEE PAY SLIP',0,1,'C');

	}

}