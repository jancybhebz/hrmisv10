<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrollupdate_nonperm_daily extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Payrollupdate_model','Deduction_model','libraries/Appointment_status_model','pds/Pds_model','Payroll_process_model','hr/Attendance_summary_model','employee/Leave_model','finance/Income_model','finance/Benefit_model','hr/Hr_model','Computation_instance_model'));
        $this->load->helper('payroll_helper');
        $this->arrData = array();
    }

	public function select_benefits_nonperm_trc()
	{
		$arrPost = $this->input->post();
		echo '<pre>';
		print_r($arrPost);
		echo '</pre>';
		if(empty($arrPost)):
			redirect('finance/payroll_update/process');
		endif;

		$this->arrData['arrBenefit'] = $this->Payrollupdate_model->payroll_select_income_process($arrPost['mon'],$arrPost['yr'],$arrPost['selemployment'],'Benefit');
		$this->arrData['arrBonus'] = $this->Payrollupdate_model->payroll_select_income_process($arrPost['mon'],$arrPost['yr'],$arrPost['selemployment'],'Bonus');
		$this->arrData['arrIncome'] = $this->Payrollupdate_model->payroll_select_income_process($arrPost['mon'],$arrPost['yr'],$arrPost['selemployment'],'Others');
		// $this->arrData['salary'] = $this->Payrollupdate_model->check_salary_exist($arrPost['mon'],$arrPost['yr'],$arrPost['selemployment']);
		$this->arrData['process'] = $this->Payroll_process_model->get_process_by_appointment($arrPost['selemployment'],$arrPost['mon'],$arrPost['yr']);
		$this->arrData['arrLoan'] = $this->Deduction_model->getDeductionsByType('Loan');
		$this->arrData['arrContrib'] = $this->Deduction_model->getDeductionsByType('Contribution');
		$this->arrData['arrOthers'] = $this->Deduction_model->getDeductionsByType('Others');

		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function compute_benefits_nonperm_trc()
	{
		$arrPost = $this->input->post();
		echo '<pre>';
		print_r($arrPost);
		echo '</pre>';
		if(!empty($arrPost)):
			if(isset($arrPost['chkbenefit'])):
				if(gettype($arrPost['chkbenefit']) == 'string'):
					$arrPost['chkbenefit'] = json_decode($arrPost['chkbenefit'],true);
				endif;
			endif;
			if(isset($arrPost['txtprocess'])):
				$process_data = json_decode($arrPost['txtprocess'],true);
			else:
				$process_data = $arrPost;
			endif;
		else:
			redirect('finance/payroll_update/process');
		endif;

		$computed_benefits = $this->Payrollupdate_model->compute_benefits($arrPost, $process_data);

		$this->arrData = array( 'employment_type'	 => $process_data['selemployment'],
								'payroll_date'		 => date('F Y',strtotime($process_data['yr'].'-'.$process_data['mon'].'-1')),
								'process_data_date'	 => date('F Y',strtotime($process_data['data_fr_yr'].'-'.$process_data['data_fr_mon'].'-1')),
								'process_data_workingdays' => $computed_benefits['workingdays'],
								'curr_period_workingdays'  => $computed_benefits['curr_workingdays'],
								'arrEmployees'		 => $computed_benefits['arremployees'],
								'no_empty_lb'		 => $computed_benefits['no_empty_lb'],
								'period'		 	 => $process_data['period'],
								'process_data_datediff'=> $computed_benefits['process_data_datediff']);

		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	// public function save_computation_nonperm()
	// {
	// 	$arrPost = $this->input->post();
	// 	$process_data = fixArray($arrPost['txtprocess'],true);
	// 	$arrEmployees = fixArray($arrPost['txtjson_computations'],true);
	// 	$salary_period = 'period'.$process_data['period'];
		
	// 	# insert tablename: tblNonPermComputationInstance
	// 	$arrData_comp_instance = array('startDate'		  => $process_data['txt_dtfrom'],
	// 								   'endDate' 		  => $process_data['txt_dtto'],
	// 								   'appointmentCode'  => $process_data['selemployment'],
	// 								   'pmonth' 		  => $process_data['mon'],
	// 								   'pyear' 			  => $process_data['yr'],
	// 								   'period' 		  => $process_data['period']
	// 								   /*'payrollGroupCode' => $process_data['txt_dtto']*/);
	// 	$comp_instance_id = $this->Computation_instance_model->insert_nonpem_computation_instance($arrData_comp_instance);
	// 	$oth_periods = array();
	// 	for($i=1;$i<=4;$i++){ if($process_data['period'] != $i){array_push($oth_periods,'period'.$i);}}

	// 	foreach($arrEmployees as $emp_comp):
	// 		$tardy_mins = $emp_comp['total_late'] + $emp_comp['total_ut'];
	// 		$tardy = explode(':', date('H:i', mktime(0, $tardy_mins)));
	// 		# insert tablename: tblNonPermComputation
	// 		$sal_perday =  $emp_comp['emp_detail']['actualSalary'] / SALARY_DAYS;
	// 		$sal_perhr = $sal_perday / 8;
	// 		$sal_permins = $sal_perhr / 60;

	// 		$arrData_comp_instance = array('fk_id'		  	  => $comp_instance_id,
	// 									   'empNumber' 		  => $emp_comp['emp_detail']['empNumber'],
	// 									   'salary' 		  => $emp_comp['emp_detail']['actualSalary'] / 2,
	// 									   'basicSalary' 	  => $emp_comp['emp_detail']['actualSalary'],
	// 									   'nodays_absent' 	  => $emp_comp['actual_days_absent'],
	// 									   'nodays_present'   => $emp_comp['actual_days_present'],
	// 									   'totalTardyHour'   => $tardy[0],
	// 									   'totalTardyMinute' => $tardy[1],
	// 									   'no_workingdays'   => $process_data['selemployment'],
	// 									   'lateamount' 	  => round($tardy_mins * $sal_permins,2),
	// 									   'dayabsentamount'  => round($emp_comp['actual_days_absent'] * $sal_perday,2),
	// 									   'tardyhouramount'  => round($tardy[0] * $sal_perhr,2),
	// 									   'tardyminuteamount'=> round($tardy[1] * $sal_permins,2));
	// 		$this->Computation_instance_model->insert_nonperm_computation($arrData_comp_instance);

	// 		# check for Philhealth and Pagibig deductions
	// 		$emp_deductions = $this->Deduction_model->get_employee_deductions($emp_comp['emp_detail']['empNumber'],array('PAGIBIG','PHILHEALTH'));
	// 		$total_deductions = 0;
	// 		foreach($emp_deductions as $emp_deduct):
	// 			$total_deductions = $total_deductions + $emp_deduct[$salary_period];
	// 		endforeach;
	// 		$total_period_salary = ($emp_comp['emp_detail']['actualSalary'] / 2) - $total_deductions - round($tardy_mins * $sal_permins,2);

	// 		# check employee tax switch and get tax amount
	// 		if($emp_comp['emp_detail']['taxSwitch'] == 'Y'):
	// 			$tax_amount = ($total_period_salary - $total_deductions) * TAX_PERCENT;
	// 		else:
	// 			$tax_amount = amt_tax_nonperm($total_period_salary - $total_deductions);
	// 		endif;

	// 		# get income tax and update
	// 		$emp_income_tax = $this->Deduction_model->get_employee_deductions($emp_comp['emp_detail']['empNumber'],array('ITW'));
	// 		if(count($emp_income_tax) > 0):
	// 			# update tblEmpDeductions
	// 			$arrData_emp_deductions = array($salary_period => round($tax_amount,2));
	// 			$this->Deduction_model->edit_empdeduction_byempnumber($arrData_emp_deductions,'ITW',$emp_comp['emp_detail']['empNumber']);
	// 		else:
	// 			# insert tblEmpDeductions
	// 			$arrData_emp_deductions = array('empNumber' 	=> $emp_comp['emp_detail']['empNumber'],
	// 										'deductionCode' => 'ITW',
	// 										'monthly' 		=> '0',
	// 										$salary_period  => ROUND('$taxamount',2),
	// 										'status' 		=> '1');
	// 			$this->Deduction_model->add_emp_deductions($arrData_emp_deductions);
	// 		endif;
			
	// 		# fetch empbenefits; tablename: tblEmpBenefits
	// 		$emp_benefits = $this->Income_model->get_employee_income($emp_comp['emp_detail']['empNumber'],array('SALARY'));
	// 		if(count($emp_benefits) > 0):
	// 			# update benefits
	// 			$arrData_emp_benefits = array($salary_period  => ($emp_comp['emp_detail']['actualSalary'] / 2),
	// 										  $oth_periods[0] => 0,
	// 										  $oth_periods[1] => 0,
	// 										  $oth_periods[2] => 0);
	// 			$this->Benefit_model->edit($arrData_emp_benefits,'SALARY',$emp_comp['emp_detail']['empNumber']);
	// 		else:
	// 			# insert benefits
	// 			$arrData_emp_benefits = array('empNumber' 	  => $emp_comp['emp_detail']['empNumber'],
	// 										  'incomeCode' 	  => 'SALARY',
	// 										  'incomeAmount'  => $emp_comp['emp_detail']['actualSalary'],
	// 										  $salary_period  => ($emp_comp['emp_detail']['actualSalary'] / 2),
	// 										  'status'		  => 1);
	// 			$this->Benefit->add($arrData_emp_benefits);
	// 		endif;

	// 		# insert late and absents; tablename: tblEmpDeductions
	// 		$emp_deductions_tardy = $this->Deduction_model->get_employee_deductions($emp_comp['emp_detail']['empNumber'],array('UNDABS'));
	// 		if(count($emp_deductions_tardy) > 0):
	// 			# update deductions
	// 			$arrData_emp_tardy = array($salary_period  => round($tardy_mins * $sal_permins,2),
	// 									   $oth_periods[0] => 0,
	// 									   $oth_periods[1] => 0,
	// 									   $oth_periods[2] => 0);
	// 			$this->Deduction_model->edit_empdeduction_byempnumber($arrData_emp_tardy,'UNDABS',$emp_comp['emp_detail']['empNumber']);
	// 		else:
	// 			# insert deductions
	// 			$arrData_emp_tardy = array('empNumber' 	   => $emp_comp['emp_detail']['empNumber'],
	// 									   'deductionCode' => 'UNDABS',
	// 									   $salary_period  => round($tardy_mins * $sal_permins,2),
	// 									   'status'		   => 1);
	// 			$this->Deduction_model->add_emp_deductions($arrData_emp_tardy);
	// 		endif;
	// 	endforeach;

	// 	# update tablename: tblNonPermComputation
	// 	$arrData_comp = array('status' => 0);

	// 	# PROCESS
	// 	$process_code = array();
	// 	if(isset($arrPost['chksalary'])):
	// 		if($arrPost['chksalary'] != '') { array_push($process_code,'SALARY'); }
	// 	endif;
	// 	if(isset($arrPost['chkbenefit'])):
	// 		if($arrPost['chkbenefit'] != ''):
	// 			# check if salary exists in process
	// 			if(in_array('SALARY',array_column($process_exist,'processCode'))):
	// 				array_push($process_code,'BENEFITS');
	// 			endif;
	// 		endif;
	// 	endif;
	// 	if(isset($arrPost['chkbonus'])):
	// 		if($arrPost['chkbonus'] != '') { array_push($process_code,'BONUS'); }
	// 	endif;
	// 	if(isset($arrPost['chkincome'])):
	// 		if($arrPost['chkincome'] != '') { array_push($process_code,'ADDITIONAL'); }
	// 	endif;

	// 	$agency_info = $this->Deduction_model->getAgencyDeductionShare();
	// 	$period = $process_data['selemployment'] == 'P' ? 4 : $process_data['period'];
	// 	$arrProcess_id = array();
	// 	foreach($process_code as $pcode):
	// 		$arrData_process = array('employeeAppoint' => $process_data['selemployment'],
	// 								 'empNumber' 	   => $this->session->userdata('sessEmpNo'),
	// 								 'processDate'	   => date('Y-m-d'),
	// 								 'processMonth'    => $process_data['mon'],
	// 								 'processYear'     => $process_data['yr'],
	// 								 'processCode'     => $pcode,
	// 								 // 'payrollGroupCode'=> '',
	// 								 'salarySchedule'  => $agency_info['salarySchedule'],
	// 								 'period' 		   => $period,
	// 								 'publish' 		   => 0);
	// 		# insert process; tablename : tblProcess
	// 		$proc_id = $this->Payroll_process_model->add_payroll_process($arrData_process);
	// 		$arrProcess_id[] = array('proc_id' => $proc_id, 'code' => $pcode);
	// 	endforeach;

	// 	# update tblNonPermComputationInstance
	// 	$this->Computation_instance_model->update_nonpem_computation_instance(array('status' => 1),$process_data['selemployment'],$process_data['mon'],$process_data['yr'],$process_data['period']);

	// 	$bonus = isset($arrPost['chkbonus']) ? fixArray($arrPost['chkbonus']) : array();
	// 	foreach($arrEmployees as $emp):
	// 		# foreach payroll process
	// 		foreach($arrProcess_id as $processid):
	// 			# process others
	// 			$emp_income = $this->Income_model->get_employee_income($emp['emp_detail']['empNumber'],fixArray($bonus),'Others');
	// 			# insert income; tablename : tblempincome
	// 			$arrData_empincome = array('processID' 		 => $processid['proc_id'],
	// 									   'empNumber' 		 => $emp['emp_detail']['empNumber'],
	// 									   'incomeCode' 	 => count($emp_income) > 0 ? $emp_income[0]['incomeCode'] == '' ? 0 : $emp_income[0]['incomeCode'] : 0,
	// 									   'incomeYear' 	 => $process_data['yr'],
	// 									   'incomeMonth' 	 => $process_data['mon'],
	// 									   'actualSalary' 	 => $emp['emp_detail']['actualSalary'],
	// 									   'incomeAmount' 	 => count($emp_income) > 0 ? $emp_income[0]['incomeAmount'] == '' ? 0 : $emp_income[0]['incomeAmount'] : 0,
	// 									   'appointmentCode' => $emp['emp_detail']['appointmentCode'],
	// 									   'positionCode' 	 => $emp['emp_detail']['positionCode'],
	// 									   'officeCode' 	 => $emp['emp_detail']['officeCode'],
	// 									   'period1' 		 => count($emp_income) > 0 ? $emp_income[0]['period1'] : 0,
	// 									   'period2' 		 => count($emp_income) > 0 ? $emp_income[0]['period2'] : 0,
	// 									   'period3' 		 => count($emp_income) > 0 ? $emp_income[0]['period3'] : 0,
	// 									   'period4' 		 => count($emp_income) > 0 ? $emp_income[0]['period4'] : 0);
	// 			$this->Income_model->add_emp_income($arrData_empincome);

	// 			# process bonus
	// 			# get bonus from tblEmpBenefits
	// 			$emp_bonus = $this->Income_model->get_employee_income($emp['emp_detail']['empNumber'],fixArray($bonus),'Bonus');
	// 			# insert income; tablename : tblempincome
	// 			foreach($emp_bonus as $emp_bonus):
	// 				$arrData_empbonus = array('processID' 	 => $processid['proc_id'],
	// 										  'empNumber' 	 => $emp['emp_detail']['empNumber'],
	// 										  'incomeCode' 	 => $emp_bonus['incomeCode'],
	// 										  'incomeYear' 	 => $process_data['yr'],
	// 										  'incomeMonth'  => $process_data['mon'],
	// 										  'actualSalary' => $emp['emp_detail']['actualSalary'],
	// 										  'positionCode' => $emp['emp_detail']['actualSalary'],
	// 										  'officeCode' 	 => $emp['emp_detail']['actualSalary'],
	// 										  'incomeAmount' => $emp_bonus['incomeAmount'] == '' ? 0 : $emp_bonus['incomeAmount'],
	// 										  'appointmentCode'=> $emp['emp_detail']['actualSalary'],
	// 										  'period1' 	 => $emp_bonus['period1'],
	// 										  'period2' 	 => $emp_bonus['period2'],
	// 										  'period3' 	 => $emp_bonus['period3'],
	// 										  'period4' 	 => $emp_bonus['period4']);
	// 				$this->Income_model->add_emp_income($arrData_empbonus);

	// 				# also insert to deduction remit: ref: class/SystemRecord.php:466
	// 				$arrData_deduction = array('processID'	 	=> $processid['proc_id'],
	// 									  	   'code'		 	=> 0,
	// 									  	   'empNumber'	 	=> $emp['emp_detail']['empNumber'],
	// 									  	   'deductionCode'	=> $emp_bonus['incomeCode'].'TAX',
	// 									  	   'deductAmount' 	=> $emp_bonus['ITW'],
	// 									  	   'period1'		=> $emp_bonus['ITW'],
	// 									  	   'period2'		=> 0,
	// 									  	   'period3'		=> 0,
	// 									  	   'period4'		=> 0,
	// 									  	   'deductMonth'	=> $process_data['mon'],
	// 									  	   'deductYear'	 	=> $process_data['yr'],
	// 									  	   'employerAmount' => 0);
	// 				$this->Deduction_model->add_deduction_remit($arrData_deduction);
	// 			endforeach;

	// 		endforeach;
	// 	endforeach;

	// 	$this->session->set_flashdata('strSuccessMsg','Payroll saved successfully.');
	// 	redirect('finance/payroll_update/reports?processid='.implode(';',array_column($arrProcess_id,'proc_id')));
	// }


}
/* End of file Payrollupdate.php
 * Location: ./application/modules/finance/controllers/payroll_update/Payrollupdate.php */