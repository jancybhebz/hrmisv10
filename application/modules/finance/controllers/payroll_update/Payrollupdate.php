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
        $this->load->model(array('Payrollupdate_model','Deduction_model','libraries/Appointment_status_model','pds/Pds_model','Payroll_process_model','hr/Attendance_summary_model','employee/Leave_model'));
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
					
					echo '<pre>';
					print_r($arrPost);
					if(isset($arrPost['txtprocess'])):
						$process_data = json_decode($arrPost['txtprocess'],true);
					else:
						$process_data = $arrPost;
					endif;
					$computed_benefits = $this->Payrollupdate_model->compute_benefits($arrPost, $process_data);
					echo '</pre>';

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
				if(!empty($arrPost)):
					echo '<pre>';
					print_r($arrPost);
					echo '<hr>';
					$process_details = json_decode($arrPost['txtprocess'],true);
					$payroll_schedule = periods(agency_paryoll_process());
					print_r($payroll_schedule);
					$trdetail = json_decode($arrPost['txtjson'],true);
					foreach($trdetail as $tr):
						$arrtr = array_column($tr['tr'],'td');
						if(count($arrtr) > 0):
							print_r(array_column($tr['tr'],'td'));
						endif;
						echo '<hr>';
					endforeach;
					die();
				endif;
			case 'save_income':
				// if(!empty($arrPost)):
				// 	echo '<pre>';
				// 	// print_r($arrPost);
				// 	$trdetail = json_decode($arrPost['txtjson'],true);
				// 	foreach($trdetail as $tr):
				// 		$arrtr = array_column($tr['tr'],'td');
				// 		if(count($arrtr) > 0):
				// 			print_r(array_column($tr['tr'],'td'));
				// 		endif;
				// 		echo '<hr>';
				// 	endforeach;
				// 	die();
				// endif;
			case 'select_deductions':
				if(!empty($arrPost)):
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