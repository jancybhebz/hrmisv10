<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/Request_model','employee/Notification_model'));
    }

	public function leave_request()
	{
		$arrPost = $this->input->post();
		echo '<pre>';
		print_r($arrPost);
		if(!empty($arrPost)):
			$leave_details = json_decode($arrPost['txtleave_json'],true);
			print_r($leave_details);
			$request_details = explode(';',$leave_details['req_details']);

			print_r($request_details);
			echo 'here';
			die();
			$arrLeave_details = array(
							'dateFiled'	 	=> $leave_details['req_date'],
							'empNumber'	 	=> $leave_details['req_emp'],
							'requestID' 	=> $leave_details['req_id'],
							'leaveCode' 	=> $leave_details['req_type'],
							'specificLeave' => $leave_details['ob_datefrom'],
							'reason'		=> $leave_details['ob_datefrom'],
							'leaveFrom' 	=> $leave_details['ob_datefrom'],
							'leaveTo' 		=> $leave_details['ob_datefrom'],
							'certifyHR' 	=> $leave_details['ob_datefrom'],
							'remarks' 		=> $leave_details['ob_datefrom'],
							'inoutpatient'	=> $leave_details['ob_datefrom'],
							'vllocation'	=> $leave_details['ob_datefrom'],
							'commutation'	=> $leave_details['ob_datefrom']);
			if($sign == ''):
				$arrsignatory = array(
							'Signatory1'	 => date('Y-m-d'),
							'Sig1DateTime'	 => $emps);
			elseif($sign == ''):
				$arrsignatory = array(
							'Signatory2'	 => date('Y-m-d'),
							'Sig2DateTime'	 => $emps);
			elseif($sign == ''):
				$arrsignatory = array(
							'Signatory3'	 => date('Y-m-d'),
							'Sig3DateTime'	 => $emps);
			else:
				$arrsignatory = array(
							'SignatoryFin'	 => date('Y-m-d'),
							'SigFinDateTime' => $emps);
			endif;

			die();
			// $this->Attendance_summary_model->add_ob($arrData);
			// $this->session->set_flashdata('strSuccessMsg','Override OB added successfully.');
		endif;

		redirect('hr/attendance/override/ob');
	}


}
