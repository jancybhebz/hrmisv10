<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller {

	var $arrData;

	function __construct()
	{
        parent::__construct();
        $this->load->model(array('libraries/Request_model','employee/Notification_model','employee/Leave_model','hr/Attendance_summary_model','employee/official_business_model','employee/leave_model','employee/travel_order_model','employee/leave_monetization_model'));
    }

    public function index()
	{
		$active_menu = isset($_GET['status']) ? $_GET['status']=='' ? 'Filed Request' : $_GET['status'] : 'Filed Request';
		$_GET['status'] = $active_menu;
		$menu = array('All','Filed Request','Certified','Cancelled','Disapproved');
		unset($menu[array_search($active_menu, $menu)]);
		$notif_icon = array('All' => 'list', 'Filed Request' => 'file-text-o', 'Certified' => 'check', 'Cancelled' => 'ban', 'Disapproved' => 'remove');

		$this->arrData['active_code'] = isset($_GET['code']) ? $_GET['code']=='' ? 'all' : $_GET['code'] : 'all';
		$this->arrData['arrNotif_menu'] = $menu;
		$this->arrData['active_menu'] = $active_menu;
		$this->arrData['notif_icon'] = $notif_icon;

		$request_type = $_GET['request'];

		if($request_type == 'ob'):
			# begin OB
			$arrob_request = $this->official_business_model->getall_request();

			if(isset($_GET['status'])):
				if(strtolower($_GET['status'])!='all'):
					$ob_request = array();
					foreach($arrob_request as $key=>$ob):
						$next_signatory = $this->Request_model->get_next_signatory($ob,'OB');
						$ob['next_signatory'] = $next_signatory;
						if(strtolower($_GET['status']) == strtolower($ob['requestStatus'])):
							if($active_menu == 'Filed Request'):
								if($ob['next_signatory']['display'] == 1):
									$ob_request[] = $ob;
								endif;
							else:
								$ob_request[] = $ob;
							endif;
						endif;
					endforeach;
					$arrob_request = $ob_request;
				else:
					foreach($arrob_request as $key=>$ob):
						$next_signatory = $this->Request_model->get_next_signatory($ob,'OB');
						$ob['next_signatory'] = $next_signatory;
						$ob_request[] = $ob;
					endforeach;
					$arrob_request = $ob_request;
				endif;
			endif;
			$this->arrData['arrob_request'] = $arrob_request;
			# end OB
		endif;

		if($request_type == 'leave'):
			# begin leave
			$arrleave_request = $this->leave_model->getall_request();

			if(isset($_GET['status'])):
				if(strtolower($_GET['status'])!='all'):
					$leave_request = array();
					foreach($arrleave_request as $key=>$leave):
						if($leave['requestDetails'] != ''):
							$requestDetails = explode(';',$leave['requestDetails']);
							$next_signatory = $this->Request_model->get_next_signatory($leave,strtoupper($requestDetails[0]));
							$leave['next_signatory'] = $next_signatory;
							if(strtolower($_GET['status']) == strtolower($leave['requestStatus'])):
								if($active_menu == 'Filed Request'):
									if($leave['next_signatory']['display'] == 1):
										$leave_request[] = $leave;
									endif;
								else:
									$leave_request[] = $leave;
								endif;
							endif;
						endif;
					endforeach;
					$arrleave_request = $leave_request;
				else:
					foreach($arrleave_request as $key=>$leave):
						if($leave['requestDetails'] != ''):
							$requestDetails = explode(';',$leave['requestDetails']);
							$next_signatory = $this->Request_model->get_next_signatory($leave,strtoupper($requestDetails[0]));
							$leave['next_signatory'] = $next_signatory;
							$leave_request[] = $leave;
						endif;
					endforeach;
					$arrleave_request = $leave_request;
				endif;
			endif;
			$this->arrData['arrleave_request'] = $arrleave_request;
			# end leave
		endif;

		if($request_type == 'to'):
			# begin TO
			$arrto_request = $this->travel_order_model->getall_request();

			if(isset($_GET['status'])):
				if(strtolower($_GET['status'])!='all'):
					$to_request = array();
					foreach($arrto_request as $key=>$to):
						$next_signatory = $this->Request_model->get_next_signatory($to,'TO');
						$to['next_signatory'] = $next_signatory;
						if(strtolower($_GET['status']) == strtolower($to['requestStatus'])):
							if($active_menu == 'Filed Request'):
								if($to['next_signatory']['display'] == 1):
									$to_request[] = $to;
								endif;
							else:
								$to_request[] = $to;
							endif;
						endif;
					endforeach;
					$arrto_request = $to_request;
				else:
					foreach($arrto_request as $key=>$to):
						$next_signatory = $this->Request_model->get_next_signatory($to,'TO');
						$to['next_signatory'] = $next_signatory;
						$to_request[] = $to;
					endforeach;
					$arrto_request = $to_request;
				endif;
			endif;
			$this->arrData['arrto_request'] = $arrto_request;
			# end TO
		endif;

		if($request_type == 'mone'):
			# begin Monetization
			$arrmone_request = $this->leave_monetization_model->getall_request();

			if(isset($_GET['status'])):
				if(strtolower($_GET['status'])!='all'):
					$mone_request = array();
					foreach($arrmone_request as $key=>$mone):
						$next_signatory = $this->Request_model->get_next_signatory($mone,'Monetization');
						$mone['next_signatory'] = $next_signatory;
						if(strtolower($_GET['status']) == strtolower($mone['requestStatus'])):
							if($active_menu == 'Filed Request'):
								if($mone['next_signatory']['display'] == 1):
									$mone_request[] = $mone;
								endif;
							else:
								$mone_request[] = $mone;
							endif;
						endif;
					endforeach;
					$arrmone_request = $mone_request;
				else:
					foreach($arrmone_request as $key=>$mone):
						$next_signatory = $this->Request_model->get_next_signatory($mone,'Monetization');
						$mone['next_signatory'] = $next_signatory;
						$mone_request[] = $mone;
					endforeach;
					$arrmone_request = $mone_request;
				endif;
			endif;
			$this->arrData['arrmone_request'] = $arrmone_request;
			# end Monetization
		endif;


		$this->template->load('template/template_view', 'hr/request/view_list', $this->arrData);
	}

	public function update_ob()
	{
		$arrPost = $this->input->post();

		$optstatus = isset($_GET['status']) ? $_GET['status'] : '';
		$txtremarks = '';
		if(!empty($arrPost)):
			$optstatus = $arrPost['optstatus'];
			$txtremarks = $arrPost['txtremarks'];
		endif;

		$req_id = $_GET['req_id'];
		$arrob = $this->official_business_model->getData($_GET['req_id']);
		$ob_details = explode(';',$arrob['requestDetails']);
			
		# signatories
		$arremp_signature = $this->Request_model->get_signature($arrob['requestCode']);
		if(strtoupper($optstatus) == 'CERTIFIED'):
			$arrob_data = array(
				'dateFiled'		=> $ob_details[1],
				'empNumber'		=> $arrob['empNumber'],
				'requestID'		=> $arrob['requestID'],
				'obDateFrom'	=> $ob_details[2],
				'obDateTo'		=> $ob_details[3],
				'obTimeFrom'	=> $ob_details[4],
				'obTimeTo'		=> $ob_details[5],
				'obPlace'		=> $ob_details[6],
				'obMeal'		=> $ob_details[8]==''?'N':$ob_details[8],
				'purpose'		=> $ob_details[7],
				'official'		=> strtolower($ob_details[0]) == 'official' ? 'Y' : '',
				'approveRequest'=> '',
				'approveChief'	=> '',
				'approveHR'		=> check_module()=='hr' ? strtolower($optstatus) == 'certified' ? 'Y' : '' : '',
				'is_override'	=> '',
				'override_id'	=> ''
			);

			$addreturn = $this->Official_business_model->add($arrob_data);
			if(count($addreturn)>0):
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Add Official Business',json_encode($arrob_data),'');
			endif;
		endif;

		$arrob_signatory = array(
			'requestStatus'	=> strtoupper($optstatus),
			'statusDate'	=> date('Y-m-d'),
			'remarks'		=> $txtremarks,
			'signatory'		=> $_SESSION['sessEmpNo']
		);

		$arrob_signatory = array_merge($arrob_signatory,$arremp_signature);
		$update_employeeRequest = $this->Request_model->update_employeeRequest($arrob_signatory, $arrob['requestID']);
		if(count($update_employeeRequest)>0):
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Update request',json_encode($arrob_signatory),'');
			$this->session->set_flashdata('strSuccessMsg','Request successfully '.strtolower($optstatus).'.');
		endif;

		redirect('hr/request?request=ob');
	}

	public function update_leave()
	{
		$arrPost = $this->input->post();

		$optstatus = isset($_GET['status']) ? $_GET['status'] : '';

		$txtremarks = '';
		if(!empty($arrPost)):
			$optstatus = $arrPost['opt_leave_stat'];
			$txtremarks = $arrPost['txtremarks'];
		endif;


		$req_id = $_GET['req_id'];
		$arrleave = $this->leave_model->getData($_GET['req_id']);
		$leave_details = explode(';',$arrleave['requestDetails']);
		
		# signatories
		$arremp_signature = $this->Request_model->get_signature($leave_details[0]);
		if(strtoupper($optstatus) == 'CERTIFIED'):
			$arrleave_data = array(
				'dateFiled'		=> $arrleave['requestDate'],
				'empNumber'		=> $arrleave['empNumber'],
				'requestID'		=> $arrleave['requestID'],
				'leaveCode'		=> strtoupper($leave_details[0]),
				'specificLeave'	=> $leave_details[7],
				'reason'		=> $leave_details[6],
				'leaveFrom'		=> $leave_details[1],
				'leaveTo'		=> $leave_details[2],
				'certifyHR'		=> 'Y',
				'approveRequest'=> 'Y'
			);

			$addreturn = $this->leave_model->add_employeeLeave($arrleave_data);
			if(count($addreturn)>0):
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Add Leave',json_encode($arrob_data),'');
			endif;
		endif;

		$arrleave_signatory = array(
			'requestStatus'	=> strtoupper($optstatus),
			'statusDate'	=> date('Y-m-d'),
			'remarks'		=> $txtremarks,
			'signatory'		=> $_SESSION['sessEmpNo']
		);

		$arrleave_signatory = array_merge($arrleave_signatory,$arremp_signature);
		$update_employeeRequest = $this->Request_model->update_employeeRequest($arrleave_signatory, $arrleave['requestID']);
		if(count($update_employeeRequest)>0):
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Update request',json_encode($arrleave_signatory),'');
			$this->session->set_flashdata('strSuccessMsg','Request successfully '.strtolower($optstatus).'.');
		endif;

		redirect('hr/request?request=leave');
	}

	public function update_to()
	{
		$arrPost = $this->input->post();

		$optstatus = isset($_GET['status']) ? $_GET['status'] : '';

		$txtremarks = '';
		if(!empty($arrPost)):
			$optstatus = $arrPost['opt_to_stat'];
			$txtremarks = $arrPost['txtremarks'];
		endif;

		$req_id = $_GET['req_id'];
		$arrto = $this->travel_order_model->getData($_GET['req_id']);
		$to_details = explode(';',$arrto['requestDetails']);
		
		# signatories
		$arremp_signature = $this->Request_model->get_signature('TO');
		if(strtoupper($optstatus) == 'CERTIFIED'):
			$arrto_data = array(
				'dateFiled'		=> $arrto['requestDate'],
				'empNumber'		=> $arrto['empNumber'],
				'toDateFrom'	=> $to_details[1],
				'toDateTo'		=> $to_details[2],
				'destination'	=> $to_details[0],
				'purpose'		=> $to_details[3],
				'wmeal'			=> $to_details[4]
			);
			
			$addreturn = $this->travel_order_model->add($arrto_data);
			if(count($addreturn)>0):
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Add TO ',json_encode($arrto_data),'');
			endif;
		endif;

		$arrto_signatory = array(
			'requestStatus'	=> strtoupper($optstatus),
			'statusDate'	=> date('Y-m-d'),
			'remarks'		=> $txtremarks,
			'signatory'		=> $_SESSION['sessEmpNo']
		);

		$arrto_signatory = array_merge($arrto_signatory,$arremp_signature);
		$update_employeeRequest = $this->Request_model->update_employeeRequest($arrto_signatory, $arrto['requestID']);
		if(count($update_employeeRequest)>0):
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Update request',json_encode($arrleave_signatory),'');
			$this->session->set_flashdata('strSuccessMsg','Request successfully '.strtolower($optstatus).'.');
		endif;

		redirect('hr/request?request=to');
	}

	public function update_mone()
	{
		$arrPost = $this->input->post();

		$optstatus = isset($_GET['status']) ? $_GET['status'] : '';

		$txtremarks = '';
		if(!empty($arrPost)):
			$optstatus = $arrPost['opt_mone_stat'];
			$txtremarks = $arrPost['txtremarks'];
		endif;
		
		$req_id = $_GET['req_id'];
		$arrmone = $this->leave_monetization_model->getrequest($_GET['req_id']);
		$mone_details = explode(';',$arrmone['requestDetails']);
		
		# signatories
		$arremp_signature = $this->Request_model->get_signature('TO');
		if(strtoupper($optstatus) == 'CERTIFIED'):
			$employee_details = employee_details($arrmone['empNumber']);
			$monetize_amt = ($mone_details[2] + $mone_details[3]) * AMT_MONETIZATION * $employee_details[0]['actualSalary'];
			$arrmone_data = array(
				'empNumber'		=> $arrmone['empNumber'],
				'vlMonetize'	=> isset($mone_details[2]) ? $mone_details[2] : '',
				'slMonetize'	=> isset($mone_details[3]) ? $mone_details[3] : '',
				'processMonth'	=> date('n'),
				'processYear'	=> date('Y'),
				'monetizeMonth'	=> isset($mone_details[4]) ? $mone_details[4] : '',
				'monetizeYear'	=> isset($mone_details[5]) ? $mone_details[5] : '',
				'monetizeAmount'=> $monetize_amt,
				'processBy'		=> $this->session->userdata('sessEmpNo'),
				'ip'			=> $this->input->ip_address(),
				'processDate'	=> date('Y-m-d h:i:s A')
			);

			$addreturn = $this->leave_monetization_model->addemp_monetized($arrmone_data);
			if(count($addreturn)>0):
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Add Leave Monetization ',json_encode($arrmone_data),'');
			endif;
		endif;

		$arrmone_signatory = array(
			'requestStatus'	=> strtoupper($optstatus),
			'statusDate'	=> date('Y-m-d'),
			'remarks'		=> $txtremarks,
			'signatory'		=> $_SESSION['sessEmpNo']
		);

		$arrmone_signatory = array_merge($arrmone_signatory,$arremp_signature);
		$update_employeeRequest = $this->Request_model->update_employeeRequest($arrmone_signatory, $arrmone['requestID']);
		if(count($update_employeeRequest)>0):
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Update request',json_encode($arrleave_signatory),'');
			$this->session->set_flashdata('strSuccessMsg','Request successfully '.strtolower($optstatus).'.');
		endif;

		redirect('hr/request?request=mone');
	}

	// public function leave_request()
	// {
	// 	$emp_session = $_SESSION;
	// 	$arrPost = $this->input->post();

	// 	if(!empty($arrPost)):
	// 		$leave_details = json_decode($arrPost['txtleave_json'],true);
	// 		$request_details = explode(';',$leave_details['req_details']);

	// 		$arrLeave_details = array(
	// 						'dateFiled'	 	=> $leave_details['req_date'],
	// 						'empNumber'	 	=> $leave_details['req_emp'],
	// 						'requestID' 	=> $leave_details['req_id'],
	// 						'leaveCode' 	=> $leave_details['req_type'],
	// 						'specificLeave' => $arrPost['txtreq_patient'],
	// 						'reason'		=> $request_details[4],
	// 						'leaveFrom' 	=> $request_details[2],
	// 						'leaveTo' 		=> $request_details[3],
	// 						'certifyHR' 	=> (strpos($leave_details['req_nextsign'], 'HR') !== false) ? 'Y' : '',
	// 						'remarks' 		=> $leave_details['req_remarks'],
	// 						'inoutpatient'	=> $arrPost['txtreq_patient'],
	// 						'vllocation'	=> $request_details[9],
	// 						'commutation'	=> $request_details[10]);
	// 		# add in empleave
	// 		$this->Leave_model->add_employeeLeave($arrLeave_details);

	// 		$arrsignatory = array(
	// 						'SignatoryFin'	 => $arrPost['selreq_stat'].';'.$emp_session['sessName'].';'.employee_office($emp_session['sessEmpNo']).';'.$emp_session['sessEmpNo'], # action;name;divion;empnumber
	// 						'requestStatus' => $arrPost['selreq_stat'],
	// 						'SigFinDateTime' => date('Y-m-d H:i:s'));
	// 		# update request
	// 		$this->Leave_model->save($arrsignatory, $leave_details['req_id']);

	// 		$this->session->set_flashdata('strSuccessMsg','Employee request has been '.strtolower($arrPost['selreq_stat']));
	// 		redirect('hr/notification?month='.currmo().'&yr='.curryr().'&status='.$_GET['status'].'&code='.$_GET['code']);
	// 	endif;
	// }

	public function ob_request()
	{
		$emp_session = $_SESSION;
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$request_details = fixArray($arrPost['txtob_json']);
			$ob_details = explode(';',$request_details['req_details']);
			$arrData=array(
				'dateFiled' 	 => date('Y-m-d'),
				'empNumber'	  	 => $request_details['req_emp'],
				'requestID' 	 => $request_details['req_id'],
				'obDateFrom' 	 => $ob_details[1],
				'obDateTo' 		 => $ob_details[2],
				'obTimeFrom' 	 => $ob_details[3],
				'obTimeTo' 		 => $ob_details[4],
				'obPlace' 		 => $ob_details[5],
				'obMeal' 		 => $ob_details[6] == '' ? 'Y' : 'N',
				'purpose' 		 => $ob_details[7],
				'official' 		 => $ob_details[0],
				'approveRequest' => 'Y',
				'approveChief' 	 => 'Y',
				'approveHR' 	 => 'Y');
			
			$this->Attendance_summary_model->add_ob($arrData);
			$arrsignatory = array(
							'SignatoryFin' => $arrPost['selob_stat'].';'.$emp_session['sessName'].';'.employee_office($emp_session['sessEmpNo']).';'.$emp_session['sessEmpNo'], # action;name;divion;empnumber
							'requestStatus' => $arrPost['selob_stat'],
							'SigFinDateTime' => date('Y-m-d H:i:s'));
			# update request

			$this->Leave_model->save($arrsignatory, $request_details['req_id']);
			$this->session->set_flashdata('strSuccessMsg','Employee request has been '.strtolower($arrPost['selob_stat']));
		endif;
		redirect('hr/notification?month='.currmo().'&yr='.curryr().'&status='.$_GET['status'].'&code='.$_GET['code']);
	}

	public function to_request()
	{
		// echo '<pre>';
		$emp_session = $_SESSION;
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			// print_r($arrPost);
			// $request_details = fixArray($arrPost['txtto_json']);
			// print_r($request_details);
			// $to_details = explode(';',$request_details['req_details']);
			// print_r($to_details);
			// $arrData=array(
			// 	'empNumber'	  	 => $request_details['req_emp'],
			// 	'dateFiled' 	 => $request_details['req_id'],
			// 	'toDateFrom' 	 => $ob_details[1],
			// 	'toDateTo' 		 => $ob_details[2],
			// 	'destination' 	 => $ob_details[3],
			// 	'purpose' 		 => $ob_details[4],
			// 	'obPlace' 		 => $ob_details[5],
			// 	'obMeal' 		 => $ob_details[6] == '' ? 'Y' : 'N',
			// 	'purpose' 		 => $ob_details[7],
			// 	'official' 		 => $ob_details[0],
			// 	'approveRequest' => 'Y',
			// 	'approveChief' 	 => 'Y',
			// 	'approveHR' 	 => 'Y');
			
			// $this->Attendance_summary_model->add_ob($arrData);
			// $arrsignatory = array(
			// 				'SignatoryFin' => $arrPost['selob_stat'].';'.$emp_session['sessName'].';'.employee_office($emp_session['sessEmpNo']).';'.$emp_session['sessEmpNo'], # action;name;divion;empnumber
			// 				'requestStatus' => $arrPost['selob_stat'],
			// 				'SigFinDateTime' => date('Y-m-d H:i:s'));
			// # update request

			// $this->Leave_model->save($arrsignatory, $request_details['req_id']);
			// $this->session->set_flashdata('strSuccessMsg','Employee request has been '.strtolower($arrPost['selob_stat']));
		endif;
		// die();
		redirect('hr/notification?month='.currmo().'&yr='.curryr().'&status='.$_GET['status'].'&code='.$_GET['code']);
	}

	public function dtr_request()
	{
		$emp_session = $_SESSION;
		$arrPost = $this->input->post();
		
		if(!empty($arrPost)):
			$request_details = fixArray($arrPost['txtdtr_json']);
			$dtr_details = explode(';',$request_details['req_details']);
			$empdtr = $this->Attendance_summary_model->getEmployee_dtr($request_details['req_emp'],$dtr_details[0],$dtr_details[0]);

			$arrData = array('empNumber'	=> $request_details['req_emp'],
							 'dtrDate'		=> $request_details['req_date'],
							 'inAM' 		=> $dtr_details[8],
							 'outAM' 		=> $dtr_details[9],
							 'inPM' 		=> $dtr_details[10],
							 'outPM' 		=> $dtr_details[11],
							 'inOT' 		=> $dtr_details[12],
							 'outOT' 		=> $dtr_details[13],
							 // TODO:: FIND PREVIOUS DATA
							 'name' 		=> $emp_session['sessEmpNo'],
							 'ip'			=> $this->input->ip_address(),
							 'editdate'		=> date('Y-m-d h:i:s A'),
							 'oldValue' 	=> '');
			
			if(count($empdtr) > 0):
				$this->Attendance_summary_model->edit_dtr($arrData, $request_details['req_emp']);
			else:
				$this->Attendance_summary_model->add_dtr($arrData);
			endif;

			$arrsignatory = array(
							'SignatoryFin' => $arrPost['seldtr_stat'].';'.$emp_session['sessName'].';'.employee_office($emp_session['sessEmpNo']).';'.$emp_session['sessEmpNo'], # action;name;divion;empnumber
							'requestStatus' => $arrPost['seldtr_stat'],
							'SigFinDateTime' => date('Y-m-d H:i:s'));
			# update request

			$this->Leave_model->save($arrsignatory, $request_details['req_id']);
			$this->session->set_flashdata('strSuccessMsg','Employee request has been '.strtolower($arrPost['selob_stat']));
		endif;
		redirect('hr/notification');
	}



}
