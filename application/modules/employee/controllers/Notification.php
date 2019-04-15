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
		$strEmpNo = $_SESSION['sessEmpNo'];
		$arrempRequest = array();
		$arremp_request = $this->Request_model->getEmployeeRequest($strEmpNo);
		$arrRequest = array();

		foreach($arremp_request as $request):
			if($request['requestCode'] == 'Leave'):
				$reqdetails = explode(';', $request['requestDetails']);
				$request['requestCode'] = $reqdetails[0];
			endif;
			$requestFlow = $this->Request_model->getRequestFlow($request['requestCode']);
			if($request['SignatoryFin'] ==''):
				$sign_request = $this->Notification_model->checksignatory1($requestFlow, $request);
				if($sign_request=='done'):
					$arrRequest[] = array('emp_request' => $request, 'next_sign' => '');
				else:
					$arrRequest[] = array('emp_request' => $request, 'next_sign' => $this->Notification_model->getDestination($sign_request));
				endif;
			else:
				$arrRequest[] = array('emp_request' => $request, 'next_sign' => '');
			endif;
		endforeach;
		$this->arrData['arrRequest'] = $arrRequest;
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
	}

}
