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

	public function select_benefits()
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
		$this->arrData['salary'] = $this->Payrollupdate_model->check_salary_exist($arrPost['mon'],$arrPost['yr'],$arrPost['selemployment']);
		$this->arrData['arrLoan'] = $this->Deduction_model->getDeductionsByType('Loan');
		$this->arrData['arrContrib'] = $this->Deduction_model->getDeductionsByType('Contribution');
		$this->arrData['arrOthers'] = $this->Deduction_model->getDeductionsByType('Others');

		$this->template->load('template/template_view','finance/payroll/process_step',$this->arrData);
	}

	public function compute_benefits()
	{
		$arrPost = $this->input->post();

		if(!empty($arrPost)):
			if(gettype($arrPost['chkbenefit']) == 'string'):
				$arrPost['chkbenefit'] = json_decode($arrPost['chkbenefit'],true);
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

	public function save_compute_benefits()
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
								'no_empty_lb'		 => $computed_benefits['no_empty_lb']);

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