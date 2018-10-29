<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Notifications extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/Hr_model','Compensation_model'));
        $this->arrData = array();
    }

	public function npayroll()
	{
		$arrEmployees = array();
		$employees = $this->Hr_model->getData('','','');
		foreach($employees as $employee):
			if($employee['payrollSwitch'] == 'Y' && ($employee['detailedfrom'] == '0' || $employee['detailedfrom'] == '2')):
				array_push($arrEmployees, $employee);
			endif;
		endforeach;
		$this->arrData['arrEmployees'] = $arrEmployees;
		$this->template->load('template/template_view','finance/notifications/npayroll/view_employees',$this->arrData);
	}

	public function nlongi()
	{
		$this->load->model('Longevity_model');
		$arrEmployees = array();
		$this->arrData['arrEmployees'] = $this->Longevity_model->getLongevityFactor();
		$this->template->load('template/template_view','finance/notifications/nlongi/view_employees',$this->arrData);
	}

	public function updateLongevityFactor()
	{
		$this->load->model(array('libraries/Position_model','Benefit_model'));

		# update longifactor
		$arrData = array('longiFactor'		=> 	$_POST['txtlongefactor'],
						 'longevitySwitch' 	=> 	'Y');
		$this->Position_model->editPosition($arrData, array('empNumber' => $_POST['txtempnumber']));

		$empPost = $this->Position_model->getDataByFields('empNumber', $_POST['txtempnumber']);
		$longiPay = $empPost[0]['actualSalary'];
		$arrData = array('incomeAmount'		=> 	$_POST['txtlongefactor'],
						 'period1'		 	=> 	'Y');
		$this->Benefit_model->editByFields($arrData, array('empNumber' => $_POST['txtempnumber'], 'incomeCode' => 'LONGI'));
		
		$this->session->set_flashdata('strSuccessMsg', 'Employee factor updated successfully.');
		redirect('finance/notifications/nlongi');
	}

}
/* End of file Notifications.php
 * Location: ./application/modules/finance/controllers/notifications/Notifications.php */