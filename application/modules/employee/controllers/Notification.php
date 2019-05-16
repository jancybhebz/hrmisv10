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

		# Employee Notification
		if($this->session->userdata('sessUserLevel') == 5):
			$strEmpNo = $_SESSION['sessEmpNo'];
			$arrempRequest = array();
			
			$requestFlow = $this->Request_model->getRequestFlow('HR');
			$arremp_request = $this->Request_model->getEmployeeRequest($strEmpNo);
			$arrRequest = $this->Notification_model->check_request_flow_and_signatories($requestFlow,$arremp_request);
		endif;

		# HR Notification
		if($this->session->userdata('sessUserLevel') == 1):
			# get request flow
			// echo '<pre>';
			// $requestflow = $this->Notification_model->gethr_requestflow($this->Request_model->getRequestFlow());
			// print_r($requestflow);

			$requestFlow = $this->Request_model->getRequestFlow('HR');
			$emp_requests = $this->Request_model->employee_request();
			$requests = $this->Notification_model->check_request_flow_and_signatories($requestFlow,$emp_requests);

			$forhr_requests = $this->Notification_model->gethr_requestflow($requests);
			
			// die();
			// $requestType = 
		endif;

		$this->arrData['arrRequest'] = $forhr_requests;
		// $this->arrData['arrhr_request'] = count($this->Notification_model->check_request_flow_and_signatories($requestFlow,$emp_requests,1));
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
	}


}
