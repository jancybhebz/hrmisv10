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
        $this->load->model(array('Payrollupdate_model','Deduction_model','libraries/Appointment_status_model','pds/Pds_model','Payroll_process_model','hr/Attendance_summary_model'));
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
					echo '</pre>';
					$this->load->helper('payroll_helper');

					$process_data = json_decode($arrPost['txtprocess'],true);
					$process_employees = $this->Payroll_process_model->getEmployees($process_data['selemployment'],$process_data['data_fr_yr'],$process_data['data_fr_mon']);
					$arrEmployees = array();
					foreach($process_employees as $emp):
						$emp_dtr = $this->Attendance_summary_model->getemp_dtr($emp['empNumber'],$process_data['data_fr_mon'],$process_data['data_fr_yr']);
						$hpfactor = hpfactor($emp_dtr['total_days_present'], $emp['hpFactor']);
						// $arrEmployees[]
						$arrEmployees[] = array( 'emp_detail' => $emp,
										'date_absents' => count($emp_dtr['date_absents']),
										'working_days' => $emp_dtr['total_workingdays'],
										'days_present' => $emp_dtr['total_days_present'],
										'hp' => $emp['actualSalary'] * $hpfactor);
						// print_r($empdd);
						// echo '<hr>';
					endforeach;
					// die();
					$this->arrData['arrEmployees'] = $arrEmployees;
				else:
					redirect('finance/payroll_update/process/index');
				endif;
				break;

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


	

}
/* End of file Payrollupdate.php
 * Location: ./application/modules/finance/controllers/payroll_update/Payrollupdate.php */