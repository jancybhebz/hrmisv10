<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/Request_model'));
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
				$sign_request = $this->checksignatory1($requestFlow, $request);
				if($sign_request=='done'):
					$arrRequest[] = array('emp_request' => $request, 'next_sign' => '');
				else:
					$arrRequest[] = array('emp_request' => $request, 'next_sign' => $this->getDestination($sign_request));
				endif;
			else:
				$arrRequest[] = array('emp_request' => $request, 'next_sign' => '');
			endif;
		endforeach;
		$this->arrData['arrRequest'] = $arrRequest;
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
	}

	function signatoryflow($next_sign, $flow_sign, $req_sign)
	{
		switch ($next_sign):
		    case 'Signatory2':
		        $this->checksignatory2($flow_sign, $req_sign);
		        break;
		    case 'Signatory3':
		        $this->checksignatory3($flow_sign, $req_sign);
		        break;
		    case 'Signatory4':
		        $this->checksignatory4($flow_sign, $req_sign);
		        break;
		    default:
		    	$this->checksignatory1($flow_sign, $req_sign);
		        break;
		endswitch;
	}

	function checksignatory1($flow_sign, $req_sign)
	{
		if($flow_sign['Signatory1'] != ''):
			if($req_sign['Signatory1'] != ''):
				$this->signatoryflow('Signatory2', $flow_sign, $req_sign);
			else:
				return $flow_sign['Signatory1'];
			endif;
		else:
			$this->signatoryflow('Signatory2', $flow_sign, $req_sign);
		endif;
	}

	function checksignatory2($flow_sign, $req_sign)
	{
		if($flow_sign['Signatory2'] != ''):
			if($req_sign['Signatory2'] != ''):
				$this->signatoryflow('Signatory3', $flow_sign, $req_sign);
			else:
				return $flow_sign['Signatory2'];
			endif;
		else:
			$this->signatoryflow('Signatory3', $flow_sign, $req_sign);
		endif;
	}

	function checksignatory3($flow_sign, $req_sign)
	{
		if($flow_sign['Signatory3'] != ''):
			if($req_sign['Signatory3'] != ''):
				$this->signatoryflow('Signatory4', $flow_sign, $req_sign);
			else:
				return $flow_sign['Signatory3'];
			endif;
		else:
			$this->signatoryflow('Signatory4', $flow_sign, $req_sign);
		endif;
	}

	function checksignatory4($flow_sign, $req_sign)
	{
		if($flow_sign['SignatoryFin'] != ''):
			if($req_sign['SignatoryFin'] != ''):
				return 'done';
			else:
				return $flow_sign['SignatoryFin'];
			endif;
		else:
			return 'done';
		endif;
	}

	function getDestination($desti)
	{
		$desti = explode(';', $desti);
		if(count($desti) > 1):
			$empdesti = employee_name($desti[2]);
			switch ($desti[0]):
			    case 'RECOMMENDED':
			        return 'for Recommendation by '.$empdesti;
			        echo 'for Recommendation by '.$empdesti;
			        break;
			    case 'APPROVED':
			        return 'for Approval by '.$empdesti;
			        echo 'for Approval by '.$empdesti;
			        break;
			    case 'CERTIFIED':
			        return 'for Certification by '.$empdesti;
			        echo 'for Certification by '.$empdesti;
			        break;
			    default:
			    	return '';
			        break;
			endswitch;
		endif;
	}

}
