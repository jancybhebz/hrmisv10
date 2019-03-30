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
		$arrRequest = $this->Request_model->getEmployeeRequest($strEmpNo);
		// foreach($arrRequest as $request):
		// 	$arrsign = array();
		// 	$nextsign = '';
		// 	# if requestCode is "leave"
		// 	if($request['requestCode'] == 'Leave'):
		// 		$reqdetails = explode(';', $request['requestDetails']);
		// 		$request['requestCode'] = $reqdetails[0];
		// 	endif;
		// 	$requestFlow = $this->Request_model->getRequestFlow($request['requestCode']);

		// 	# check final signatory first
		// 	if($request['SignatoryFin']!=''):
		// 		# 0 means no next signature
		// 		// $nextsign = 0;
		// 	else:
		// 		# check signatory
		// 		$check_ifsign1 = $this->checksignatory('Signatory1', 'Signatory2', $requestFlow, $request);
		// 		if($check_ifsign1 != 1):
		// 			print_r($check_ifsign1);
		// 		else:
		// 			$check_ifsign2 = $this->checksignatory('Signatory2', 'Signatory3', $requestFlow, $request);
		// 			if($check_ifsign2 != 1):
		// 				print_r($check_ifsign2);
		// 			else:
		// 				$check_ifsign3 = $this->checksignatory('Signatory3', 'SignatoryFin', $requestFlow, $request);
		// 				if($check_ifsign3 != 1):
		// 					print_r($check_ifsign2);
		// 				endif;
		// 			endif;
		// 		endif;
		// 	endif;

		// 	// # check signatory 1
		// 	// if($requestFlow['Signatory1']!=''):
		// 	// 	if($request['Signatory1']==''):
		// 	// 		array_push($rflow, $requestFlow['Signatory1']);
		// 	// 	endif;
		// 	// else:
		// 	// 	array_push($rflow, 1);
		// 	// endif;

		// 	// # check signatory 2
		// 	// if($requestFlow['Signatory2']!=''):
		// 	// 	if($request['Signatory2']==''):
		// 	// 		array_push($rflow, $requestFlow['Signatory2']);
		// 	// 	endif;
		// 	// endif;

		// 	// # check signatory 3
		// 	// if($requestFlow['Signatory3']!=''):
		// 	// 	if($request['Signatory3']==''):
		// 	// 		array_push($rflow, $requestFlow['Signatory3']);
		// 	// 	endif;
		// 	// endif;

		// 	// # check signatory fin; if signatory fin is not empty; rflow will be completed
		// 	// if($request['SignatoryFin']!=''):
		// 	// 	echo '<br>count = '.count($rflow);
		// 	// 	# 4 stands for sig1,sig2,sig2 and sigfin
		// 	// 	for ($i=0; $i < 4 ; $i++) { 
		// 	// 		$rflow[$i] = 1;
		// 	// 	}
		// 	// 	array_push($rflow, $requestFlow['SignatoryFin']);
		// 	// endif;

		// 	print_r($requestFlow);
		// 	echo '<br>';
		// 	print_r($request);
		// 	echo '<br>';
		// 	print_r($arrsign);
		// 	echo '<hr>';
		// endforeach;
		
		// print_r($arrRequest);
		$this->arrData['arrRequest'] = $arrRequest;
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
	}
	
	# begin checking signatories
	function checksignatory($var, $var2, $requestflow, $request)
	{
		if($requestflow[$var] != ''):
			if($request[$var] != ''):
				return 1;
			else:
				return $requestflow[$var];
			endif;
		else:
			return 1; # signatory 1 is done
		endif;
	}


}
