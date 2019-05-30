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
        $this->load->model(array('Payrollupdate_model','Deduction_model','libraries/Appointment_status_model','pds/Pds_model','Payroll_process_model','hr/Attendance_summary_model','employee/Leave_model','finance/Income_model','finance/Benefit_model'));
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
		
		$arrPost = $this->input->post();
		switch ($process_name):
			case 'index':
				$this->arrData['arrAppointments'] = $this->Appointment_status_model->getAppointmentJointPermanent(true);
				break;

			case 'select_benefits':
				if(!empty($arrPost)):
					// echo '<pre>';
					// print_r($arrPost);
					// echo '</pre>';
					// die();
					if($arrPost['selemployment'] != 'P'):
						redirect('finance/payroll_update/process/index');	
					endif;
					$this->arrData['arrBenefit'] = $this->Payrollupdate_model->getPayrollUpdate('Benefit');
					$this->arrData['arrBonus'] = $this->Payrollupdate_model->getPayrollUpdate('Bonus');
					$this->arrData['arrIncome'] = $this->Payrollupdate_model->getPayrollUpdate('Additional');
					$this->arrData['arrLoan'] = $this->Deduction_model->getDeductionsByType('Loan');
					$this->arrData['arrContrib'] = $this->Deduction_model->getDeductionsByType('Contribution');
					$this->arrData['arrOthers'] = $this->Deduction_model->getDeductionsByType('Others');
				else:
					redirect('finance/payroll_update/process/index');
				endif;
				break;

			case 'compute_benefits':

				if(!empty($arrPost)):
					if(gettype($arrPost['chkbenefit']) == 'string'):
						$arrPost['chkbenefit'] = json_decode($arrPost['chkbenefit'],true);
					endif;
					if(isset($arrPost['txtprocess'])):
						$process_data = json_decode($arrPost['txtprocess'],true);
					else:
						$process_data = $arrPost;
					endif;
					// echo '<pre>';
					// print_r($arrPost);
					// echo '</pre>';
					// die();
					$computed_benefits = $this->Payrollupdate_model->compute_benefits($arrPost, $process_data);

					$this->arrData = array( 'employment_type'	 => $process_data['selemployment'],
											'payroll_date'		 => date('F Y',strtotime($process_data['yr'].'-'.$process_data['mon'].'-1')),
											'process_data_date'	 => date('F Y',strtotime($process_data['data_fr_yr'].'-'.$process_data['data_fr_mon'].'-1')),
											'process_data_workingdays' => $computed_benefits['workingdays'],
											'curr_period_workingdays'  => $computed_benefits['curr_workingdays'],
											'arrEmployees'		 => $computed_benefits['arremployees'],
											'no_empty_lb'		 => $computed_benefits['no_empty_lb']);
					// $this->arrData['total_empnolb'] = $total_empnolb;
				else:
					redirect('finance/payroll_update/process/index');
				endif;
				break;
			case 'save_benefits':
				$arr_amt = 0;
				$amount = 0;
				$itw = 0;
				$period_amt = 0;
				$stat = 1;
				if(!empty($arrPost)):
					// echo '<pre>';
					// print_r($arrPost);
					// echo '<hr>';
					$process_details = json_decode($arrPost['txtprocess'],true);
					$total_periods = periods(agency_paryoll_process());
					$trdetail = json_decode($arrPost['txtjson'],true);
					# income code - benefits
					$incomecodes = $this->Income_model->getDataByType('Benefit');
					// foreach($incomecodes as $income):
					// 	$incomedetails = $this->Payrollupdate_model->setamount_benefits($income);
					// 	print_r($incomedetails);
					// endforeach;
					// $incomecodes = array('HAZARD','LAUNDRY', 'SUBSIS', 'LONGI', 'TA', 'RA', 'SALARY');
					$arrinc_ids = array();
					foreach($trdetail as $tr):
						$income_data = array();
						$income_data = $this->Income_model->currentIncome_data($tr['emp_detail']['empNumber']);
						$arrinc_ids = array_merge($arrinc_ids, array_column($income_data,'benefitCode'));

						foreach($incomecodes as $income):
							$incomedetails = $this->Benefit_model->setamount_benefits($income,$tr,$process_details['mon'],$process_details['yr'],$income_data);
							$this->Benefit_model->add($incomedetails);
						endforeach;
						# Add Salary
						$key = array_search('SALARY', array_column($income_data, 'incomeCode'));
						if($key!=''):
							$arr_amt = $income_data[$key];
							$itw = $arr_amt['ITW']; $stat = $arr_amt['status'];
						endif;
						$period_amt = fixFloat($tr['period_salary']) / count($total_periods);

						$arrData = array('empNumber' 	=> $tr['emp_detail']['empNumber'],
											'incomeCode' 	=> 'SALARY',
											'incomeMonth' 	=> $process_details['mon'],
											'incomeYear'	=> $process_details['yr'],
											'incomeAmount' => $tr['period_salary'],
											'ITW' 			=> $itw,
											'period1' 		=> $period_amt,
											'period2' 		=> $period_amt,
											'period3' 		=> $period_amt,
											'period4' 		=> $period_amt,
											'status' 		=> $stat);
						if(count($total_periods) == 1):
							$arrData = array_merge($arrData, array('period1' => $period_amt, 'period2' => 0, 'period3' => 0, 'period4' => 0));
						elseif(count($total_periods) == 4):
							$arrData = array_merge($arrData, array('period1' => $period_amt, 'period2' => $period_amt, 'period3' => $period_amt, 'period4' => $period_amt));
						else:
							$arrData = array_merge($arrData, array('period1' => $period_amt, 'period2' => $period_amt, 'period3' => 0, 'period4' => 0));
						endif;
						$this->Benefit_model->add($arrData);
						// print_r($arrData);
						// print_r($tr);
						// echo '<hr>';
						// endif;
					endforeach;
					# delete previous benefits
					$this->Benefit_model->multiple_delete($arrinc_ids);
					// die();
					// print_r(json_decode($trdetail,true));die();
					$this->arrData = array( 'employment_type'	 => $process_details['selemployment'],
											'payroll_date'		 => date('F Y',strtotime($process_details['yr'].'-'.$process_details['mon'].'-1')),
											'process_data_date'	 => date('F Y',strtotime($process_details['data_fr_yr'].'-'.$process_details['data_fr_mon'].'-1')),
											'process_data_workingdays' => $arrPost['txtdata_wdays'],
											'curr_period_workingdays'  => $arrPost['txtper_wdays'],
											'arrEmployees'		 => $trdetail,
											'no_empty_lb'		 => $arrPost['txtno_empty_lb']);
					// die();
				endif;
			case 'select_deductions':
				if(!empty($arrPost)):
					if(gettype($arrPost['chkbenefit']) == 'string'):
						$arrPost['chkbenefit'] = json_decode($arrPost['chkbenefit'],true);
					endif;
					echo '<pre>';
					print_r($arrPost);
					echo '</pre>';
					$this->arrData['arrEmployees'] = $arrPost['txtjson'];
					$this->arrData['arrBenefit'] = $this->Payrollupdate_model->getPayrollUpdate('Benefit');
					$this->arrData['arrBonus'] = $this->Payrollupdate_model->getPayrollUpdate('Bonus');
					$this->arrData['arrIncome'] = $this->Payrollupdate_model->getPayrollUpdate('Additional');
					$this->arrData['arrLoan'] = $this->Deduction_model->getDeductionsByType('Loan');
					$this->arrData['arrContrib'] = $this->Deduction_model->getDeductionsByType('Contribution');
					$this->arrData['arrOthers'] = $this->Deduction_model->getDeductionsByType('Others');
				else:
					redirect('finance/payroll_update/process/index');
				endif;
				break;

			case 'process_complete':
				if(!empty($arrPost)):
					if(gettype($arrPost['txtjson']) == 'string'):
						$arrEmployees = json_decode($arrPost['txtjson'],true);
						$arrEmployees = array_column($arrEmployees,'emp_detail');
					endif;
					echo '<pre>';
					$process_data = json_decode($arrPost['txtprocess'],true);
					
					$deduction_code = '';
					$deduct_code = '';

					// $shares = explode(',',$_ENV['shares']);
					// print_r($shares);
					// print_r($arrPost);
					$agency_shares = $this->Deduction_model->getAgencyDeductionShare();
					$arrRegular_deductions = $this->Deduction_model->getDeductionsByType('Regular');
					$arrDeductions = array_merge(isset($arrPost['chkloan']) ? $arrPost['chkloan'] : array(),isset($arrPost['chkcont']) ? $arrPost['chkcont'] : array(),isset($arrPost['chkothrs']) ? $arrPost['chkothrs'] : array());
					print_r($arrDeductions);
					// $deductions = $this->Deduction_model->getDeductionsByStatus(0);
					foreach(array_column($arrEmployees,'empNumber') as $emp):
						echo $emp;
						# get employee deduction detail
						// $empdeducts = $this->Deduction_model->getDeductionByEmployee($emp,$process_data['data_fr_mon'],$process_data['data_fr_yr']);

						# get employee regular deductions
						$empreg_deducts = $this->Deduction_model->getEmployee_regular_deduction($emp);
						// print_r($empreg_deducts);
						# get Regular Deductions
						foreach($arrRegular_deductions as $reg):
							if($reg['is_mandatory'] == 1):
								# no need to check in empdeduct
								if($reg['deduction_id'] == 29): # PAGIBIG
									// print_r($empreg_deducts);
									$regKey = array_search($reg['deductionCode'], array_column($empreg_deducts, 'deductionCode'));
									echo 'Regkey = '.$regKey;
									if($regKey!=''):
									else:
										print_r($empreg_deducts);
									endif;
									// $deduction_code = $reg['deductionCode'];
									// $deduct_code = $reg['deductCode'];
								endif;
							else:

							endif;
						endforeach;

						// print_r($deductions);
						# get all deductions
						// foreach($arrDeductions as $deduction):
						// 	print_r(array_column($empdeducts,'deductionCode'));
						// 	$deduction = json_decode($deduction,true);
						// 	// if($deduction['deductionCode'])
						// endforeach;

						// # get regular deductions
						// # check if data has shares
						// if(in_array($ededuct['deductionCode'],array_column($shares,'deductionCode'))):
						// 	echo '<br>=='.$ededuct['deductCode'];
						// endif;

						// foreach($empdeducts as $ededuct):
						// 	# data for deductionremit
							
						// endforeach;
						// print_r($empdeducts);

						// $arrData_remit = array('processID'		=> 0,
						// 					   'empNumber'		=> $emp,
						// 					   'code'			=> $ededuct['deductCode'],
						// 					   'deductionCode'	=> $ededuct['deductionCode'],
						// 					   'deductMonth'	=> $process_data['data_fr_mon'],
						// 					   'deductYear'		=> $process_data['data_fr_yr'],
						// 					   'period1'		=> $ededuct['period1'],
						// 					   'period2'		=> $ededuct['period2'],
						// 					   'period3'		=> $ededuct['period3'],
						// 					   'period4'		=> $ededuct['period4'],
						// 					   // 'orNumber'		=> ''
						// 					   // 'orDate'			=> ''
						// 					   // 'TYPE'			=> ''
						// 					   'appointmentCode'=> $process_data['selemployment'],
						// 					   'employerAmount' => 0
						// 					 );

						$arrData_remit = array('processID'		=> 0,
											   'empNumber'		=> $emp,
											   'code'			=> $deduct_code,
											   'deductionCode'	=> $deduction_code,
											   'deductMonth'	=> '',
											   'deductYear'		=> '',
											   'period1'		=> '',
											   'period2'		=> '',
											   'period3'		=> '',
											   'period4'		=> '',
											   // 'orNumber'		=> ''
											   // 'orDate'			=> ''
											   // 'TYPE'			=> ''
											   'appointmentCode'=> '',
											   'employerAmount' => 0
											 );
						echo '<hr>';
					endforeach;


					echo '</pre>';

					die();
				else:
					redirect('finance/payroll_update/process/index');
				endif;
				break;
				
			default:
				# code...
				break;
		endswitch;
		
		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function update_or()
	{
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
		$this->template->load('template/template_view','finance/payroll/process_history',$this->arrData);
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