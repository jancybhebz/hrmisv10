<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrollupdate extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Payrollupdate_model','Deduction_model','libraries/Appointment_status_model','pds/Pds_model','Payroll_process_model','hr/Attendance_summary_model','employee/Leave_model','finance/Income_model','finance/Benefit_model','hr/Hr_model','Computation_instance_model'));
        $this->load->helper('payroll_helper');
        $this->arrData = array();
    }

	public function index()
	{
		$process_name = $this->uri->segment(4);
		$_GET['selemployment'] = isset($_GET['selemployment']) ? $_GET['selemployment'] : 'P';
		$_GET['mon'] = isset($_GET['mon']) ? $_GET['mon'] : date('n');
		$_GET['yr'] = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$_GET['period'] = isset($_GET['period']) ? $_GET['period'] : 'Period 1';
		
		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getAppointmentJointPermanent(true);
		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function select_benefits_perm()
	{
		$arrPost = $this->input->post();
		echo '<pre>';
		print_r($arrPost);
		echo '</pre>';
		if(!empty($arrPost)):
			// if($arrPost['selemployment'] != 'P'):
			// 	redirect('finance/payroll_update/process');	
			// endif;
		else:
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

	public function compute_benefits_perm()
	{
		$arrPost = $this->input->post();

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
								'no_empty_lb'		 => $computed_benefits['no_empty_lb']);

		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function save_benefits_perm()
	{
		$arrPost = $this->input->post();
		$arremp_computations = array();
		if(!empty($arrPost)):
			if(gettype($arrPost['chkbenefit']) == 'string'):
				$arrPost['chkbenefit'] = json_decode($arrPost['chkbenefit'],true);
			endif;
			if(gettype($arrPost['txtjson']) == 'string'):
				$arremp_computations = json_decode($arrPost['txtjson'],true);
			else:
				$arremp_computations = $arrPost['txtjson'];
			endif;
			if(isset($arrPost['txtprocess'])):
				$process_data = json_decode($arrPost['txtprocess'],true);
			else:
				$process_data = $arrPost['txtprocess'];
			endif;
			$computed_benefits = $this->Payrollupdate_model->compute_benefits($arrPost, $process_data);

			# clean computation tables
			$fk_id = 0;
			$code_id = array();
			$comp_instance_id = $this->Computation_instance_model->getData($process_data['mon'],$process_data['yr'],$process_data['selemployment']);
			if(count($comp_instance_id) > 0):
				foreach($comp_instance_id as $cid):
					$this->Computation_instance_model->del_computation_instance($cid['id']);
					$this->Computation_instance_model->del_computation($cid['id']);
					$this->Computation_instance_model->del_computation_details($cid['id']);
				endforeach;
			endif;
			# clean delete empbenefit
			$arremp_numbers = $this->Payroll_process_model->getEmployees($process_data['selemployment']);
			$this->Benefit_model->delete_empbenefit_byempNumber($process_data['selemployment'],array_column($arremp_numbers,'empNumber'));

			# insert in computation instance
			$arrrData_comp_instance = array('month' 			=> $process_data['data_fr_mon'],
											'year'				=> $process_data['data_fr_yr'],
											'appointmentCode'  	=> $process_data['selemployment'],
											'pmonth' 			=> $process_data['mon'],
											'pyear' 			=> $process_data['yr'],
											'totalNumDays' 		=> $computed_benefits['workingdays']);
			# tablename : tblComputationInstance
			$fk_id = $this->Computation_instance_model->insert_computation_instance($arrrData_comp_instance);

			# insert computation and computation details
			$arr_computations = array();
			foreach($arremp_computations as $emp_comp):
				# insert computation
				$arrComputation_codes = array(array('code' => 'HAZARD', 'amount' => $emp_comp['hp']),
											  array('code' => 'LAUNDRY','amount' => $emp_comp['laundry']),
											  array('code' => 'LONGI',  'amount' => $emp_comp['longevity'] == '' ? 0.00 : $emp_comp['longevity']),
											  array('code' => 'SUBSIS', 'amount' => $emp_comp['subsis']),
											  array('code' => 'SALARY', 'amount' => $emp_comp['emp_detail']['actualSalary']),
											  array('code' => 'RA', 	'amount' => $emp_comp['rata']['ra_amount']),
											  array('code' => 'TA', 	'amount' => $emp_comp['rata']['ta_amount']));
				foreach($arrComputation_codes as $comp_code):
					$arrData_computation = array('fk_id' 	 => $fk_id,
												 'empNumber' => $emp_comp['emp_detail']['empNumber'],
												 'code' 	 => $comp_code['code'],
												 'amount' 	 => $comp_code['amount']);
					# tablename : tblComputation
					$code_id[$comp_code['code']] = $this->Computation_instance_model->insert_computation($arrData_computation);	
				endforeach;

				# insert computation details
				$arrData_comp_details = array('fk_id'			=> $fk_id,
											  'empNumber'		=> $emp_comp['emp_detail']['empNumber'],
											  'periodMonth'		=> $process_data['mon'],
											  'periodYear'		=> $process_data['yr'],
											  'workingDays'		=> $computed_benefits['workingdays'],
											  'nodaysPresent'	=> $emp_comp['actual_days_present'],
											  'nodaysAbsent'	=> $emp_comp['actual_days_absent'],
											  'hpFactor'		=> $emp_comp['emp_detail']['hpFactor'],
											  'ctr_8h'			=> $emp_comp['emp_leavebal']['ctr_8h'],
											  'ctr_6h'			=> $emp_comp['emp_leavebal']['ctr_6h'],
											  'ctr_5h'			=> $emp_comp['emp_leavebal']['ctr_5h'],
											  'ctr_4h'			=> $emp_comp['emp_leavebal']['ctr_4h'],
											  'ctr_wmeal'		=> $emp_comp['emp_leavebal']['ctr_wmeal'],
											  'ctr_diem'		=> $emp_comp['emp_leavebal']['ctr_diem'],
											  'ctr_laundry'		=> $emp_comp['emp_leavebal']['ctr_laundry'],
											  'rataAmount'		=> $emp_comp['rata_amt'],
											  'rataVehicle'		=> $emp_comp['emp_detail']['RATAVehicle'] == '' ? 'N' : $emp_comp['emp_detail']['RATAVehicle'],
											  'rataCode'		=> $emp_comp['emp_detail']['RATACode'] == '' ? '' : $emp_comp['emp_detail']['RATACode'],
											  'daysWithVehicle'	=> $emp_comp['emp_detail']['RATAVehicle'] == 'Y' ? $computed_benefits['workingdays'] : 0,
											  'raPercent'		=> $emp_comp['rata']['ra_percent'],
											  'taPercent'		=> $emp_comp['rata']['ta_percent'],
											  'latest'			=> count($emp_comp['emp_leavebal']) > 0 ? 'Y' : 'N',
											  'hazardCode'		=> count($code_id) > 0 ? $code_id['HAZARD'] : 0,
											  'hazard'			=> $emp_comp['hp'],
											  'laundryCode'		=> count($code_id) > 0 ? $code_id['LAUNDRY'] : 0,
											  'laundry'			=> $emp_comp['laundry'],
											  'subsisCode'		=> count($code_id) > 0 ? $code_id['SUBSIS'] : 0,
											  'subsistence'		=> $emp_comp['subsis'],
											  'salaryCode'		=> count($code_id) > 0 ? $code_id['SALARY'] : 0,
											  'salary'			=> $emp_comp['emp_detail']['actualSalary'],
											  'longi'			=> $emp_comp['longevity'] == '' ? 0.00 : $emp_comp['longevity'],
											  'ra'				=> $emp_comp['rata']['ra_amount'] == '' ? 0.00 : $emp_comp['rata']['ra_amount'],
											  'ta'				=> $emp_comp['rata']['ta_amount']);
				# tablename : tblComputationDetails
				$this->Computation_instance_model->insert_computation_details($arrData_comp_details);
				array_push($arr_computations,$arrData_comp_details);
				# tablename : empBenefits; insert benefits
				$payroll_process = $this->Payroll_process_model->process_with($process_data['selemployment']);
				$arrData_benefits = array();
				foreach($arrComputation_codes as $comp_code):
					$arrData_benefits = array('empNumber' 	=> $emp_comp['emp_detail']['empNumber'],
											  'incomeCode' 	=> $comp_code['code'],
											  'incomeMonth' => $process_data['data_fr_mon'],
											  'incomeAmount'=> round($comp_code['amount'],2),
											  'status' 		=> '1');
					if($comp_code['code'] == 'SALARY'):
						switch ($payroll_process['computation']):
							case 'Monthly':
								$arrData_benefits['period1'] = round($comp_code['amount'],2);
								break;
							case 'Semimonthly':
							case 'Bi-Monthly':
								$arrData_benefits['period1'] = round(($comp_code['amount']/2),2);
								$arrData_benefits['period2'] = round(($comp_code['amount']/2),2);
								break;
							case 'Weekly':
							case 'Daily':
								$arrData_benefits['period1'] = round(($comp_code['amount']/4),2);
								$arrData_benefits['period2'] = round(($comp_code['amount']/4),2);
								$arrData_benefits['period3'] = round(($comp_code['amount']/4),2);
								$arrData_benefits['period4'] = round(($comp_code['amount']/4),2);
								break;
						endswitch;
					else:
						$arrData_benefits['period1'] = round($comp_code['amount'],2);
					endif;
					# insert benefits; tablename : tblEmpBenefits
					$this->Benefit_model->add($arrData_benefits);
					# set previous computation instance staus as 0; then set it again as 1
					$this->Computation_instance_model->edit_computation_instance(array('status' => 0),$process_data['selemployment']);
					$this->Computation_instance_model->edit_computation_instance(array('status' => 1),$process_data['selemployment'],$process_data['mon'],$process_data['yr']);
				endforeach;
			endforeach;
			
			$this->session->set_flashdata('strSuccessMsg','Compute benefits saved successfully.');
		else:
			redirect('finance/payroll_update/process');
		endif;

		$this->arrData = array( 'employment_type'	 => $process_data['selemployment'],
								'payroll_date'		 => date('F Y',strtotime($process_data['yr'].'-'.$process_data['mon'].'-1')),
								'process_data_date'	 => date('F Y',strtotime($process_data['data_fr_yr'].'-'.$process_data['data_fr_mon'].'-1')),
								'process_data_workingdays' => $computed_benefits['workingdays'],
								'curr_period_workingdays'  => $computed_benefits['curr_workingdays'],
								'arrEmployees'		 => $computed_benefits['arremployees'],
								'no_empty_lb'		 => $computed_benefits['no_empty_lb'],
								'arr_computations'	 => $arr_computations);

		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function select_deductions_perm()
	{
		$arrPost = $this->input->post();
		$arrEmployees = array();
		if(!empty($arrPost)):
			if(gettype($arrPost['chkbenefit']) == 'string'):
				$arrPost['chkbenefit'] = json_decode($arrPost['chkbenefit'],true);
			endif;
			echo '<pre>';
			print_r($arrPost);
			echo '</pre>';
		endif;

		$this->arrData['arrEmployees'] = $arrPost['txtjson'];
		$this->arrData['arrLoan'] = $this->Deduction_model->getDeductionsByType('Loan');
		$this->arrData['arrContrib'] = $this->Deduction_model->getDeductionsByType('Contribution');
		$this->arrData['arrOthers'] = $this->Deduction_model->getDeductionsByType('Others');

		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function complete_process_perm()
	{
		$arrPost = $this->input->post();
		$arrComputations = isset($arrPost['txtjson_computations']) ? fixArray($arrPost['txtjson_computations']) : array();
		$process_data = isset($arrPost['txtprocess']) ? fixArray($arrPost['txtprocess']) : array();
		$arrEmployees = isset($arrPost['txtjson']) ? fixArray($arrPost['txtjson']) : array();
		$arrEmployees = array_column($arrEmployees,'emp_detail');
		$benefits = isset($arrPost['chkbenefit']) ? fixArray($arrPost['chkbenefit']) : array();
		$bonus = isset($arrPost['chkbonus']) ? fixArray($arrPost['chkbonus']) : array();
		$loans = isset($arrPost['chkloan']) ? fixArray($arrPost['chkloan']) : array();
		$process_exist = $this->Payroll_process_model->get_payroll_process($process_data['mon'],$process_data['yr'],$process_data['selemployment']);

		$process_code = array();
		if(isset($arrPost['chksalary'])):
			if($arrPost['chksalary'] != '') { array_push($process_code,'SALARY'); }
		endif;
		if(isset($arrPost['chkbenefit'])):
			if($arrPost['chkbenefit'] != ''):
				# check if salary exists in process
				if(in_array('SALARY',array_column($process_exist,'processCode'))):
					array_push($process_code,'BENEFITS');
				endif;
			endif;
		endif;
		if(isset($arrPost['chkbonus'])):
			if($arrPost['chkbonus'] != '') { array_push($process_code,'BONUS'); }
		endif;
		if(isset($arrPost['chkincome'])):
			if($arrPost['chkincome'] != '') { array_push($process_code,'ADDITIONAL'); }
		endif;

		$agency_info = $this->Deduction_model->getAgencyDeductionShare();
		$period = $process_data['selemployment'] == 'P' ? 4 : $process_data['period'];
		$arrProcess_id = array();
		foreach($process_code as $pcode):
			$arrData_process = array('employeeAppoint' => $process_data['selemployment'],
									 'empNumber' 	   => $this->session->userdata('sessEmpNo'),
									 'processDate'	   => date('Y-m-d'),
									 'processMonth'    => $process_data['mon'],
									 'processYear'     => $process_data['yr'],
									 'processCode'     => $pcode,
									 // 'payrollGroupCode'=> '',
									 'salarySchedule'  => $agency_info['salarySchedule'],
									 'period' 		   => $period,
									 'publish' 		   => 0);
			# insert process; tablename : tblProcess
			$proc_id = $this->Payroll_process_model->add_payroll_process($arrData_process);
			$arrProcess_id[] = array('proc_id' => $proc_id, 'code' => $pcode);
		endforeach;

		foreach($arrEmployees as $emp):
			# foreach payroll process
			foreach($arrProcess_id as $processid):
				if($processid['code'] == 'SALARY'):
					# get salary from tblEmpBenefits
					$emp_income = $this->Income_model->get_employee_income($emp['empNumber'],array('SALARY'));
					# insert income; tablename : tblempincome
					$arrData_empincome = array('processID' 		 => $processid['proc_id'],
											   'empNumber' 		 => $emp['empNumber'],
											   'incomeCode' 	 => $processid['code'],
											   'incomeYear' 	 => $process_data['yr'],
											   'incomeMonth' 	 => $process_data['mon'],
											   'actualSalary' 	 => $emp['actualSalary'],
											   'positionCode' 	 => $emp['positionCode'],
											   'officeCode' 	 => $emp['officeCode'],
											   'incomeAmount' 	 => $emp_income[0]['incomeAmount'] == '' ? 0 : $emp_income[0]['incomeAmount'],
											   'appointmentCode' => $emp['appointmentCode'],
											   'period1' 		 => $emp_income[0]['period1'],
											   'period2' 		 => $emp_income[0]['period2'],
											   'period3' 		 => $emp_income[0]['period3'],
											   'period4' 		 => $emp_income[0]['period4']);
					$this->Income_model->add_emp_income($arrData_empincome);

					// # Update Matured Loans
					$this->Income_model->update_loan($process_data['mon'],$process_data['yr']);

					# Pagibig; tablename: tblEmpDeductionRemit
					$pagibig_deduction = $this->Income_model->get_employee_deductions($emp['empNumber'],array('PAGIBIG'),'');
					foreach($pagibig_deduction as $pagibig):
						$arrData_pagibig = array('processID'	 => $processid['proc_id'],
												 'code'			 => $pagibig['deductCode'],
												 'empNumber'	 => $emp['empNumber'],
												 'deductionCode' => $pagibig['deductionCode'],
												 'deductAmount'	 => $pagibig['amountGranted'],
												 'period1'		 => $pagibig['period1'],
												 'period2'		 => $pagibig['period2'],
												 'period3'		 => $pagibig['period3'],
												 'period4'		 => $pagibig['period4'],
												 'deductMonth'	 => $process_data['mon'],
												 'deductYear'	 => $process_data['yr'],
												 'employerAmount' => $agency_info['pagibigEmprShare'],
												 'appointmentCode'=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_pagibig);
					endforeach;

					# Philhealth; tablename: tblEmpDeductionRemit
					$phrange = $this->Deduction_model->getPhilHealthRange($emp['actualSalary']);
					$ph_employer_amt = ($agency_info['philhealthEmprShare'] / 100) * $phrange['philMonthlyContri'];
					$ph_deduction = $this->Income_model->get_employee_deductions($emp['empNumber'],array('PHILHEALTH'),'');
					foreach($ph_deduction as $ph):
						$arrData_pagibig = array('processID'	 => $processid['proc_id'],
												 'code'			 => $ph['deductCode'],
												 'empNumber'	 => $emp['empNumber'],
												 'deductionCode' => $ph['deductionCode'],
												 'deductAmount'	 => $ph['amountGranted'],
												 'period1'		 => $ph['period1'],
												 'period2'		 => $ph['period2'],
												 'period3'		 => $ph['period3'],
												 'period4'		 => $ph['period4'],
												 'deductMonth'	 => $process_data['mon'],
												 'deductYear'	 => $process_data['yr'],
												 'employerAmount' => $ph_employer_amt,
												 'appointmentCode'=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_pagibig);
					endforeach;

					# GSIS; tablename: tblEmpDeductionRemit
					$gsis_employer_amt = ($agency_info['philhealthEmprShare'] / 100) * $emp['actualSalary'];
					$gsis_deduction = $this->Income_model->get_employee_deductions($emp['empNumber'],array('LIFE'),'');
					foreach($gsis_deduction as $gsis):
						$arrData_gsis = array('processID'	 	  => $processid['proc_id'],
												 'code'			  => $gsis['deductCode'],
												 'empNumber'	  => $emp['empNumber'],
												 'deductionCode'  => $gsis['deductionCode'],
												 'deductAmount'	  => $gsis['amountGranted'],
												 'period1'		  => $gsis['period1'],
												 'period2'		  => $gsis['period2'],
												 'period3'		  => $gsis['period3'],
												 'period4'		  => $gsis['period4'],
												 'deductMonth'	  => $process_data['mon'],
												 'deductYear'	  => $process_data['yr'],
												 'employerAmount' => $gsis_employer_amt,
												 'appointmentCode'=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_gsis);
					endforeach;

					# Other Regular Deductions; tablename: tblEmpDeductionRemit
					# OT AND REGULAR DEDUCTION HAS SAME CONDITIONS
					$regular_deduction = $this->Income_model->get_employee_deductions($emp['empNumber'],array(),'ot');
					foreach($regular_deduction as $reg):
						$arrData_reg = array('processID'	 => $processid['proc_id'],
												 'code'			 => $reg['deductCode'],
												 'empNumber'	 => $emp['empNumber'],
												 'deductionCode' => $reg['deductionCode'],
												 'deductAmount'	 => $reg['amountGranted'],
												 'period1'		 => $reg['period1'],
												 'period2'		 => $reg['period2'],
												 'period3'		 => $reg['period3'],
												 'period4'		 => $reg['period4'],
												 'deductMonth'	 => $process_data['mon'],
												 'deductYear'	 => $process_data['yr'],
												 'employerAmount' => $gsis_employer_amt,
												 'appointmentCode'=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_reg);
					endforeach;

				elseif($processid['code'] == 'BENEFITS'):
					# get benefits from tblEmpBenefits
					$emp_benefit = $this->Income_model->get_employee_income($emp['empNumber'],fixArray($benefits),'Benefit');
					# insert income; tablename : tblempincome
					foreach($emp_benefit as $emp_benefit):
						$allperiods = array($emp_benefit['period1'],$emp_benefit['period2'],$emp_benefit['period3'],$emp_benefit['period4']);
						if(count(array_unique($allperiods)) === 1 && end($allperiods) === 0.00):
							$arrData_empbenefit = array('processID' 	 => $processid['proc_id'],
													    'empNumber' 	 => $emp['empNumber'],
													    'incomeCode' 	 => $emp_benefit['incomeCode'],
													    'incomeYear' 	 => $process_data['yr'],
													    'incomeMonth' 	 => $process_data['mon'],
													    'actualSalary' 	 => $emp['actualSalary'],
													    'positionCode' 	 => $emp['positionCode'],
													    'officeCode' 	 => $emp['officeCode'],
													    'incomeAmount' 	 => $emp_benefit['incomeAmount'] == '' ? 0 : $emp_benefit['incomeAmount'],
													    'appointmentCode'=> $emp['appointmentCode'],
													    'period1' 		 => $emp_benefit['period1'],
													    'period2' 		 => $emp_benefit['period2'],
													    'period3' 		 => $emp_benefit['period3'],
													    'period4' 		 => $emp_benefit['period4']);
							$this->Income_model->add_emp_income($arrData_empbenefit);
						endif;
					endforeach;
				elseif($processid['code'] == 'BONUS'):
					# get bonus from tblEmpBenefits
					$emp_bonus = $this->Income_model->get_employee_income($emp['empNumber'],fixArray($bonus),'Bonus');
					# insert income; tablename : tblempincome
					foreach($emp_bonus as $emp_bonus):
						$arrData_empbonus = array('processID' 	 => $processid['proc_id'],
												  'empNumber' 	 => $emp['empNumber'],
												  'incomeCode' 	 => $emp_bonus['incomeCode'],
												  'incomeYear' 	 => $process_data['yr'],
												  'incomeMonth'  => $process_data['mon'],
												  'actualSalary' => $emp['actualSalary'],
												  'positionCode' => $emp['positionCode'],
												  'officeCode' 	 => $emp['officeCode'],
												  'incomeAmount' => $emp_bonus['incomeAmount'] == '' ? 0 : $emp_bonus['incomeAmount'],
												  'appointmentCode'=> $emp['appointmentCode'],
												  'period1' 	 => $emp_bonus['period1'],
												  'period2' 	 => $emp_bonus['period2'],
												  'period3' 	 => $emp_bonus['period3'],
												  'period4' 	 => $emp_bonus['period4']);
						$this->Income_model->add_emp_income($arrData_empbonus);
					endforeach;
				else:
					# ADDITIONAL
					# get bonus from tblEmpBenefits
					$emp_addtl = $this->Income_model->get_employee_income($emp['empNumber'],fixArray($bonus),'Others');
					// # insert income; tablename : tblempincome
					foreach($emp_addtl as $emp_addtl):
						$arrData_emp_addtl = array('processID' 	 => $processid['proc_id'],
												  'empNumber' 	 => $emp['empNumber'],
												  'incomeCode' 	 => $emp_addtl['incomeCode'],
												  'incomeYear' 	 => $process_data['yr'],
												  'incomeMonth'  => $process_data['mon'],
												  'actualSalary' => $emp['actualSalary'],
												  'positionCode' => $emp['positionCode'],
												  'officeCode' 	 => $emp['officeCode'],
												  'incomeAmount' => $emp_addtl['incomeAmount'] == '' ? 0 : $emp_addtl['incomeAmount'],
												  'appointmentCode'=> $emp['appointmentCode'],
												  'period1' 	 => $emp_addtl['period1'],
												  'period2' 	 => $emp_addtl['period2'],
												  'period3' 	 => $emp_addtl['period3'],
												  'period4' 	 => $emp_addtl['period4']);
						$this->Income_model->add_emp_income($arrData_emp_addtl);
					endforeach;
				endif;

				# insert deductions - Loans; tablename : tblEmpDeductionRemit
				$empLoans = $this->Income_model->get_employee_deductions($emp['empNumber'],$loans,'Loan');
				foreach($empLoans as $loan):
					$arrData_loan = array('processID'	 => $processid['proc_id'],
										  'code'		 => $loan['deductCode'],
										  'empNumber'	 => $emp['empNumber'],
										  'deductionCode'=> $loan['deductionCode'],
										  'deductAmount' => $loan['amountGranted'],
										  'period1'		 => $loan['period1'],
										  'period2'		 => $loan['period2'],
										  'period3'		 => $loan['period3'],
										  'period4'		 => $loan['period4'],
										  'deductMonth'	 => $process_data['mon'],
										  'deductYear'	 => $process_data['yr'],
										  'appointmentCode'	=> $emp['appointmentCode']);
					$this->Income_model->add_deduction_remit($arrData_loan);
				endforeach;
				# taxes in benefits
				# LONGI - LPTAX; tablename: tblEmpDeductionRemit
				if(in_array('LONGI',$benefits)):
					$lp_tax = $this->Income_model->get_employee_deductions($emp['empNumber'],array('LPTAX'),'Regular');
					if(count($lp_tax) > 0):
						$arrData_lptax = array('processID'	 => $processid['proc_id'],
											  'code'		 => $lp_tax[0]['deductCode'],
											  'empNumber'	 => $emp['empNumber'],
											  'deductionCode'=> $lp_tax[0]['deductionCode'],
											  'deductAmount' => $lp_tax[0]['amountGranted'],
											  'period1'		 => $lp_tax[0]['period1'],
											  'period2'		 => $lp_tax[0]['period2'],
											  'period3'		 => $lp_tax[0]['period3'],
											  'period4'		 => $lp_tax[0]['period4'],
											  'deductMonth'	 => $process_data['mon'],
											  'deductYear'	 => $process_data['yr'],
											  'appointmentCode'	=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_lptax);
					endif;
				endif;
				# HAZARD - LPTAX; tablename: tblEmpDeductionRemit
				if(in_array('HAZARD',$benefits)):
					$hp_tax = $this->Income_model->get_employee_deductions($emp['empNumber'],array('HPTAX'),'Regular');
					if(count($hp_tax) > 0):
						$arrData_hptax = array('processID'	 => $processid['proc_id'],
											  'code'		 => $hp_tax[0]['deductCode'],
											  'empNumber'	 => $emp['empNumber'],
											  'deductionCode'=> $hp_tax[0]['deductionCode'],
											  'deductAmount' => $hp_tax[0]['amountGranted'],
											  'period1'		 => $hp_tax[0]['period1'],
											  'period2'		 => $hp_tax[0]['period2'],
											  'period3'		 => $hp_tax[0]['period3'],
											  'period4'		 => $hp_tax[0]['period4'],
											  'deductMonth'	 => $process_data['mon'],
											  'deductYear'	 => $process_data['yr'],
											  'appointmentCode'	=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_hptax);
					endif;
				endif;
				# OT; tablename: tblEmpDeductionRemit
				if(in_array('OT',$benefits) && $processid['code'] != 'SALARY'):
					$ot = $this->Income_model->get_employee_deductions($emp['empNumber'],array(),'ot');
					if(count($ot) > 0):
						$arrData_ot = array('processID'	 => $processid['proc_id'],
											  'code'		 => $ot[0]['deductCode'],
											  'empNumber'	 => $emp['empNumber'],
											  'deductionCode'=> $ot[0]['deductionCode'],
											  'deductAmount' => $ot[0]['amountGranted'],
											  'period1'		 => $ot[0]['period1'],
											  'period2'		 => $ot[0]['period2'],
											  'period3'		 => $ot[0]['period3'],
											  'period4'		 => $ot[0]['period4'],
											  'deductMonth'	 => $process_data['mon'],
											  'deductYear'	 => $process_data['yr'],
											  'appointmentCode'	=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_ot);
					endif;
				endif;
				# Other Deductions; tablename: tblEmpDeductionRemit
				if(isset($arrPost['chkothrs'])):
					$others_deductions = $this->Income_model->get_employee_deductions($emp['empNumber'],fixArray($arrPost['chkothrs']),'Others');
					foreach($others_deductions as $oth_d):
						$arrData_others = array('processID'	 => $processid['proc_id'],
											  'code'		 => $oth_d['deductCode'],
											  'empNumber'	 => $emp['empNumber'],
											  'deductionCode'=> $oth_d['deductionCode'],
											  'deductAmount' => $oth_d['amountGranted'],
											  'period1'		 => $oth_d['period1'],
											  'period2'		 => $oth_d['period2'],
											  'period3'		 => $oth_d['period3'],
											  'period4'		 => $oth_d['period4'],
											  'deductMonth'	 => $process_data['mon'],
											  'deductYear'	 => $process_data['yr'],
											  'appointmentCode'	=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_others);
					endforeach;
				endif;

				# Contributions; tablename: tblEmpDeductionRemit
				$check_deductions = $this->Income_model->check_empdeductions($process_data['mon'],$process_data['yr'],$emp['appointmentCode']);
				if(count($check_deductions) > 0):
					$contri_deductions = $this->Income_model->get_employee_deductions($emp['empNumber'],array(),'Contribution');
					foreach($contri_deductions as $contri):
						$arrData_others = array('processID'	 => $processid['proc_id'],
											  'code'		 => $contri['deductCode'],
											  'empNumber'	 => $emp['empNumber'],
											  'deductionCode'=> $contri['deductionCode'],
											  'deductAmount' => $contri['amountGranted'],
											  'period1'		 => $contri['period1'],
											  'period2'		 => $contri['period2'],
											  'period3'		 => $contri['period3'],
											  'period4'		 => $contri['period4'],
											  'deductMonth'	 => $process_data['mon'],
											  'deductYear'	 => $process_data['yr'],
											  'appointmentCode'	=> $emp['appointmentCode']);
						$this->Income_model->add_deduction_remit($arrData_others);
					endforeach;
				endif;
			endforeach;
		endforeach;

		$this->session->set_flashdata('strSuccessMsg','Payroll saved successfully.');
		redirect('finance/payroll_update/reports?processid='.implode(';',array_column($arrProcess_id,'proc_id')));
	}

	public function reports()
	{
		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function update_or()
	{
		$this->arrData['arrpayroll'] = $this->Payroll_process_model->get_payroll_process(currmo(),curryr());
		$this->arrData['arremployees'] = $this->Hr_model->getData();
		$this->arrData['deduction_list'] = isset($_GET['processid']) && isset($_GET['empno']) ? $this->Deduction_model->getDeductionByProcess($_GET['processid'],$_GET['empno']) : array();
		$this->template->load('template/template_view','finance/payroll/process_view',$this->arrData);
	}

	public function fieldsinPayroll()
	{
		$arrPayrollFields['arrBenefit'] = $this->Payrollupdate_model->getPayrollUpdate($_GET['employment'], $_GET['month'], $_GET['year'], $_GET['period'], 'Benefit');
		$arrPayrollFields['arrBonus'] = $this->Payrollupdate_model->getPayrollUpdate($_GET['employment'], $_GET['month'], $_GET['year'], $_GET['period'], 'Bonus');
		$arrPayrollFields['arrIncome'] = $this->Payrollupdate_model->getPayrollUpdate($_GET['employment'], $_GET['month'], $_GET['year'], $_GET['period'], 'Additional');

		echo json_encode($arrPayrollFields);
	}
	
	public function getListofEmployee()
	{
		// $this->load->model(array('libraries/Appointment_status_model','pds/Pds_model'));
		// $appt = $this->Appointment_status_model->getData($_GET['selemployment'],$_GET['selmon'],$_GET['selyr']);
		// $arrData['appt'] = $appt[0]['appointmentDesc'];
		// $arrWhere = array('appointmentCode' => $_GET['selemployment'], 'month' => $_GET['selmon'], 'year' => $_GET['selyr']);
		// $arrData['arrEmployees'] = $this->Pds_model->getDataByField($arrWhere,'P');

		// echo json_encode($arrData);
	}

	public function process_history()
	{
		$this->arrData['arrprocess'] = $this->Payroll_process_model->getall_process(currmo(),curryr());
		$this->template->load('template/template_view','finance/payroll/process_history',$this->arrData);
	}

	public function publish_process()
	{
		$empid = $this->uri->segment(4);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array('publish' => $arrPost['txtpulish_val']);
			$this->Payroll_process_model->edit_payroll_process($arrData, $arrPost['txtprocess_id']);
			$this->session->set_flashdata('strSuccessMsg','Process '.($arrPost['txtpulish_val'] == 1 ? 'published' : 'unpublished').' successfully.');
			redirect('finance/payroll_update/process_history?month='.currmo().'&yr='.curryr());
		endif;
	}

	public function process_reports()
	{
		$this->template->load('template/template_view','finance/payroll/process_history',$this->arrData);
	}

	public function testingtesting()
	{
		echo '<pre>';
		$process_data = json_decode('{"selemployment":"GIA","mon":"2","yr":"2019","period":"1","data_fr_mon":"1","data_fr_yr":"2019","txt_dtfrom":"2019-03-25","txt_dtto":"2019-04-05"}',true);
		$process_data['selemployment'] = 'GIA';
		print_r($process_data);
		$emp = $this->Payrollupdate_model->compute_benefits(null, $process_data,$_GET['id']);
		echo '<br></br>';
		print_r($emp);
	}
	

}
/* End of file Payrollupdate.php
 * Location: ./application/modules/finance/controllers/payroll_update/Payrollupdate.php */