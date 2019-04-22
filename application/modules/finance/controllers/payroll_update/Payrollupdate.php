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
        $this->load->model(array('Payrollupdate_model','Deduction_model'));
        $this->arrData = array();
    }

	public function index()
	{
		$this->load->model(array('libraries/Appointment_status_model','pds/Pds_model'));
		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getAppointmentJointPermanent(true);
		
		$_GET['selemployment'] = isset($_GET['selemployment']) ? $_GET['selemployment'] : 'P';
		$_GET['mon'] = isset($_GET['mon']) ? $_GET['mon'] : date('n');
		$_GET['yr'] = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$_GET['period'] = isset($_GET['period']) ? $_GET['period'] : 'Period 1';
		
		$this->arrData['arrBenefit'] = $this->Payrollupdate_model->getPayrollUpdate($_GET['selemployment'], $_GET['mon'], $_GET['yr'], $_GET['period'], 'Benefit');
		$this->arrData['arrBonus'] = $this->Payrollupdate_model->getPayrollUpdate($_GET['selemployment'], $_GET['mon'], $_GET['yr'], $_GET['period'], 'Bonus');
		$this->arrData['arrIncome'] = $this->Payrollupdate_model->getPayrollUpdate($_GET['selemployment'], $_GET['mon'], $_GET['yr'], $_GET['period'], 'Additional');

		$this->arrData['arrLoan'] = $this->Deduction_model->getDeductionsByType('Loan');
		$this->arrData['arrContrib'] = $this->Deduction_model->getDeductionsByType('Contribution');
		$this->arrData['arrOthers'] = $this->Deduction_model->getDeductionsByType('Others');

		$arrWhere = array('appointmentCode' => $_GET['selemployment'], 'month' => $_GET['mon'], 'year' => $_GET['yr']);
		$arrData['arrEmployees'] = $this->Pds_model->getDataByField($arrWhere,'P');
		
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			print_r($arrPost);
		endif;

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
		$this->load->model(array('libraries/Appointment_status_model','pds/Pds_model'));
		$appt = $this->Appointment_status_model->getData($_GET['selemployment'],$_GET['selmon'],$_GET['selyr']);
		$arrData['appt'] = $appt[0]['appointmentDesc'];
		$arrWhere = array('appointmentCode' => $_GET['selemployment'], 'month' => $_GET['selmon'], 'year' => $_GET['selyr']);
		$arrData['arrEmployees'] = $this->Pds_model->getDataByField($arrWhere,'P');

		echo json_encode($arrData);	
	}

	public function process_history()
	{
		$this->template->load('template/template_view','finance/payroll/process_history',$this->arrData);
	}


	

}
/* End of file Payrollupdate.php
 * Location: ./application/modules/finance/controllers/payroll_update/Payrollupdate.php */