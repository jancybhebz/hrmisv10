<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/Request_model','Notification_model'));
    }

	public function index()
	{
		$arrRequest = array();
		$forhr_requests = array();
		
		# Employee Notification
		if($this->session->userdata('sessUserLevel') == 5):
			$strEmpNo = $_SESSION['sessEmpNo'];
			$arrempRequest = array();
			
			$requestFlow = $this->Request_model->getRequestFlow('HR');
			$arremp_request = $this->Request_model->getEmployeeRequest($strEmpNo);
			$arrRequest = $this->Notification_model->check_request_flow_and_signatories($requestFlow,$arremp_request);
		endif;

		$this->arrData['arrRequest'] = $forhr_requests;
		// $this->arrData['arrhr_request'] = count($this->Notification_model->check_request_flow_and_signatories($requestFlow,$emp_requests,1));
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
	}


}
