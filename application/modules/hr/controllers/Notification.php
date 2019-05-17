<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/Request_model','employee/Notification_model'));
    }

	public function index()
	{
		$arrRequest = array();
		$forhr_requests = array();
		
		# Notification Menu
		$active_menu = isset($_GET['status']) ? $_GET['status']=='' ? 'All' : $_GET['status'] : 'All';
		$menu = array('All','Pending','Certified','Cancelled');
		unset($menu[array_search($active_menu, $menu)]);

		$notif_icon = array('All' => 'list', 'Pending' => 'file-text-o', 'Certified' => 'check', 'Cancelled' => 'ban');

		# HR Notification
		if($this->session->userdata('sessUserLevel') == 1):
			# get request flow
			// echo '<pre>';
			// $requestflow = $this->Notification_model->gethr_requestflow($this->Request_model->getRequestFlow());
			// print_r($requestflow);

			$requestFlow = $this->Request_model->getRequestFlow('HR');
			$emp_requests = $this->Request_model->employee_request(curryr(),currmo(),0,$active_menu == 'All' ? '' : $active_menu);
			$requests = $this->Notification_model->check_request_flow_and_signatories($requestFlow,$emp_requests);

			$forhr_requests = $this->Notification_model->gethr_requestflow($requests);
			
		endif;
		
		$this->arrData['arrRequest'] = $forhr_requests;
		$this->arrData['arrNotif_menu'] = $menu;
		$this->arrData['active_menu'] = $active_menu;
		$this->arrData['notif_icon'] = $notif_icon;
		// $this->arrData['arrhr_request'] = count($this->Notification_model->check_request_flow_and_signatories($requestFlow,$emp_requests,1));
		$this->template->load('template/template_view', 'hr/notification/notification_view', $this->arrData);
	}


}
