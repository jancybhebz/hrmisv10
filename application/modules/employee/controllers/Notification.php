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
			$arremp_request = $this->Request_model->getEmployeeRequest($strEmpNo);
			$arrRequest = array();

			$requestFlow = $this->Request_model->getRequestFlow(employee_office($_SESSION['sessEmpNo']));
			foreach($arremp_request as $request):
				if($request['requestCode'] == 'Leave'):
					$reqdetails = explode(';', $request['requestDetails']);
					$request['requestCode'] = $reqdetails[0];
				endif;

				$rflow = $this->Notification_model->getrequestflow($requestFlow, $request['requestCode']);
				$next_sign = '';
				if($request['SignatoryFin'] == ''):
					# check signatory 1
					$sign1 = $this->Notification_model->validate_signature($rflow, $request, 'Signatory1');
					if($sign1):
						# signatory 1 is done -> check signatory 2
						$sign2 = $this->Notification_model->validate_signature($rflow, $request, 'Signatory2');
						if($sign2):
							# signatory 2 is done -> check signatory 3
							$sign3 = $this->Notification_model->validate_signature($rflow, $request, 'Signatory3');
							if($sign3):
								# signatory 3 is done -> check final signatory
								$sign4 = $this->Notification_model->validate_signature($rflow, $request, 'SignatoryFin');
								if(!$sign4):
									$next_sign = $rflow['SignatoryFin'];
								endif;
							else:
								$next_sign = $rflow['Signatory3'];
							endif;
						else:
							$next_sign = $rflow['Signatory2'];
						endif;
					else:
						# next destination is signatory 1
						$next_sign = $rflow['Signatory1'];
					endif;
				else:
					$next_sign = '';
				endif;

				$arrRequest[] = array('req_id' => $request['requestID'],
									  'req_date' => $request['requestDate'],
									  'req_type' => $request['requestCode'],
									  'req_status' => $request['requestStatus'],
									  'req_remarks' => $request['remarks'],
									  'req_nextsign' => $next_sign);
			endforeach;
		endif;

		# HR Notification
		if($this->session->userdata('sessUserLevel') == 1):
			# get request flow
			echo '<pre>';
			$requestflow = $this->Notification_model->gethr_requestflow($this->Request_model->getRequestFlow());
			print_r($requestflowt)
			$request_type = $this->Request_model->request_type();
			foreach($request_type as $type):
				print_r($type);
				echo '<hr>';
			endforeach;
			die();
			// $requestType = 
		endif;

		$this->arrData['arrRequest'] = $arrRequest;
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
	}


}
