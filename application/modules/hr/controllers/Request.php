<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/Request_model','employee/Notification_model','employee/Leave_model'));
    }

	public function leave_request()
	{
		$emp_session = $_SESSION;
		$arrPost = $this->input->post();

		if(!empty($arrPost)):
			$leave_details = json_decode($arrPost['txtleave_json'],true);
			$request_details = explode(';',$leave_details['req_details']);

			$arrLeave_details = array(
							'dateFiled'	 	=> $leave_details['req_date'],
							'empNumber'	 	=> $leave_details['req_emp'],
							'requestID' 	=> $leave_details['req_id'],
							'leaveCode' 	=> $leave_details['req_type'],
							'specificLeave' => $arrPost['txtreq_patient'],
							'reason'		=> $request_details[4],
							'leaveFrom' 	=> $request_details[2],
							'leaveTo' 		=> $request_details[3],
							'certifyHR' 	=> (strpos($leave_details['req_nextsign'], 'HR') !== false) ? 'Y' : '',
							'remarks' 		=> $leave_details['req_remarks'],
							'inoutpatient'	=> $arrPost['txtreq_patient'],
							'vllocation'	=> $request_details[9],
							'commutation'	=> $request_details[10]);
			# add in empleave
			$this->Leave_model->add_employeeLeave($arrLeave_details);

			$arrsignatory = array(
							'SignatoryFin'	 => $arrPost['selreq_stat'].';'.$emp_session['sessName'].';'.employee_office($emp_session['sessEmpNo']).';'.$emp_session['sessEmpNo'], # action;name;divion;empnumber
							'SigFinDateTime' => date('Y-m-d H:i:s'));
			# update request
			$this->Leave_model->save($arrsignatory, $leave_details['req_id']);

			$this->session->set_flashdata('strSuccessMsg','Employee request has been '.strtolower($arrPost['selreq_stat']));
			redirect('hr/notification');
		endif;

	}


}
