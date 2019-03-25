<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('Hr_model','AttendanceSummary_model'));
    }

    public function conversion_table()
	{
		$this->load->library('Conversion_table/Conversion');
		$this->Conversion = new Conversion();

        $this->arrData['convii'] = $this->Conversion->conversion_ii();
        $this->arrData['conv8hrs'] = $this->Conversion->conversion_based8hrs();
        $this->arrData['conviii'] = $this->Conversion->conversion_iii();
        $this->arrData['conviv1'] = $this->Conversion->conversion_iv(1);
        $this->arrData['conviv2'] = $this->Conversion->conversion_iv();
		$this->template->load('template/template_view','attendance/conversion_table/_view', $this->arrData);
	}

	public function view_all()
	{
		$this->arrData['arrEmployees'] = $this->Hr_model->getData('','','all');
		$this->template->load('template/template_view','attendance/attendance_summary/_viewall',$this->arrData);
	}

	public function attendance_summary()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		// echo '<pre>';
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$this->arrData['arremp_dtr'] = $this->AttendanceSummary_model->getemp_dtr($empid, $month, $yr);
		// die();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$arremp_dtr = $this->AttendanceSummary_model->getemp_dtr($empid, $month, $yr);
		$this->arrData['arremp_dtr'] = $arremp_dtr['dtr'];
		
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function leave_balance()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance_update()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_monetization()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function filed_request()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	# Begin Broken Schedule
	public function dtr_broken_sched()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['schedules'] = $this->AttendanceSummary_model->getBrokenschedules($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_broken_sched()
	{
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			$arrData=array(
				'empNumber'	=> $this->uri->segment(5),
				'schemeCode'=> $arrpost['selscheme'],
				'dateFrom'	=> $arrpost['from'],
				'dateTo'	=> $arrpost['to']);
			$this->AttendanceSummary_model->add_brokensched($arrData);
			$this->session->set_flashdata('strSuccessMsg','Schedule added successfully.');
			redirect('hr/attendance_summary/dtr/broken_sched/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Attendance_scheme_model');
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';
			
		$arrtt_schemes = array();
		$arrAttSchemes = $this->Attendance_scheme_model->getData();
		foreach($arrAttSchemes as $as):
			if($as['schemeType'] == 'Sliding'):
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5).'-'.substr($as['amTimeinTo'],0,5).','.substr($as['pmTimeoutFrom'],0,5).'-'.substr($as['pmTimeoutTo'],0,5).')';
			else:
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5)."-".substr($as['pmTimeoutTo'],0,5).')';
			endif;
			$arrtt_schemes[] = $varas;
		endforeach;
		$this->arrData['arrAttSchemes'] = $arrtt_schemes;

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_edit_broken_sched()
	{
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			$arrData=array(
				'schemeCode'=> $arrpost['selscheme'],
				'dateFrom'	=> $arrpost['from'],
				'dateTo'	=> $arrpost['to']);
			$this->AttendanceSummary_model->edit_brokensched($arrData, $_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Schedule updated successfully.');
			redirect('hr/attendance_summary/dtr/broken_sched/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Attendance_scheme_model');
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';
			
		$arrtt_schemes = array();
		$arrAttSchemes = $this->Attendance_scheme_model->getData();
		foreach($arrAttSchemes as $as):
			if($as['schemeType'] == 'Sliding'):
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5).'-'.substr($as['amTimeinTo'],0,5).','.substr($as['pmTimeoutFrom'],0,5).'-'.substr($as['pmTimeoutTo'],0,5).')';
			else:
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5)."-".substr($as['pmTimeoutTo'],0,5).')';
			endif;
			$arrtt_schemes[] = $varas;
		endforeach;
		$this->arrData['arrAttSchemes'] = $arrtt_schemes;
		$sched = $this->AttendanceSummary_model->getSchedule($_GET['id']);
		$this->arrData['arrshedule'] = $sched[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_broken_sched()
	{
		$this->AttendanceSummary_model->delete_brokensched($_POST['txtdel_action']);
		$this->session->set_flashdata('strSuccessMsg','Schedule deleted successfully.');
		redirect('hr/attendance_summary/dtr/broken_sched/'.$this->uri->segment(4));
	}
	# End Broken Schedule

	# Begin Edit Mode
	public function dtr_edit_mode()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$this->arrData['arremp_dtr'] = $this->AttendanceSummary_model->getemp_dtr($empid, $month, $yr);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_edit()
	{
		$arrpost = $this->input->post();
		$dtr_json = json_decode($arrpost['txtjson'], true);
		foreach($dtr_json as $dtr):
			# check if row
			if(count($dtr) > 0):
				# check if body
				if(count($dtr['tr']) > 6):
					$dtrid = $dtr['tr'][1]['td'];
					$arrData = array('empNumber'	=> $arrpost['empnum'],
									 'dtrDate'		=> $arrpost['yr'].'-'.$arrpost['month'].'-'.$dtr['tr'][2]['td'],
									 'inAM' 		=> $dtr['tr'][3]['td'],
									 'outAM' 		=> $dtr['tr'][4]['td'],
									 'inPM' 		=> $dtr['tr'][5]['td'],
									 'outPM' 		=> $dtr['tr'][6]['td'],
									 'inOT' 		=> $dtr['tr'][7]['td'],
									 'outOT' 		=> $dtr['tr'][8]['td'],
									 // TODO:: OT field
									 // 'OT' => $arrpost['empnum'],
									 'name' 		=> $dtr['tr'][11]['td'].';'.$_SESSION['sessName'],
									 'ip'			=> $dtr['tr'][12]['td'].';'.$this->input->ip_address(),
									 'editdate'		=> $dtr['tr'][13]['td'].';'.date('Y-m-d h:i:s A'),
									 'oldValue' 	=> $dtr['tr'][14]['td']);
					if($dtrid != ''):
						$this->AttendanceSummary_model->edit_dtr($arrData, $dtrid);
					else:
						$this->AttendanceSummary_model->add_dtr($arrData);
					endif;
				endif;
			endif;
		endforeach;
		$this->session->set_flashdata('strSuccessMsg','DTR updated successfully.');
		redirect('hr/attendance_summary/dtr/edit_mode/'.$arrpost['empnum'].'?month='.$arrpost['month'].'&yr='.$arrpost['yr']);
	}
	# End Edit Mode

	# Begin Local Holiday
	public function dtr_local_holiday()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['arrHolidays'] = $this->AttendanceSummary_model->getLocalHolidays($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_local_holiday()
	{
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			$arrData=array(
				'empNumber'	  => $this->uri->segment(5),
				'holidayCode' => $arrpost['selholiday']);
			$this->AttendanceSummary_model->add_localholiday($arrData);
			$this->session->set_flashdata('strSuccessMsg','Local holiday added successfully.');
			redirect('hr/attendance_summary/dtr/local_holiday/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Holiday_model');
		$empid = $this->uri->segment(5);

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';
		
		$this->arrData['localHolidays'] = $this->Holiday_model->checkLocExist();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_edit_local_holiday()
	{
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			$arrData=array(
				'holidayCode' => $arrpost['selholiday']);
			$this->AttendanceSummary_model->edit_localholiday($arrData,$_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Local holiday updated successfully.');
			redirect('hr/attendance_summary/dtr/local_holiday/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Holiday_model');
		$empid = $this->uri->segment(5);

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$empholiday = $this->AttendanceSummary_model->getHoliday($_GET['id']);
		$this->arrData['arrempholiday'] = $empholiday[0];
		
		$this->arrData['localHolidays'] = $this->Holiday_model->checkLocExist();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_local_holiday()
	{
		$this->AttendanceSummary_model->delete_localholiday($_POST['txtdel_action']);
		$this->session->set_flashdata('strSuccessMsg','Local holiday deleted successfully.');
		redirect('hr/attendance_summary/dtr/local_holiday/'.$this->uri->segment(5));
	}
	# End Local Holiday

	# begin ob
	public function dtr_ob()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['arrObs'] = $this->AttendanceSummary_model->getobs($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_ob()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrData=array(
				'dateFiled' 	 => date('Y-m-d'),
				'empNumber'	  	 => $this->uri->segment(5),
				'requestID' 	 => '',
				'obDateFrom' 	 => $arrpost['txtob_dtfrom'],
				'obDateTo' 		 => $arrpost['txtob_dtto'],
				'obTimeFrom' 	 => $arrpost['txtob_tmin'],
				'obTimeTo' 		 => $arrpost['txtob_tmout'],
				'obPlace' 		 => $arrpost['txtob_place'],
				'obMeal' 		 => $arrpost['radob_wmeal'] ? 'Y' : 'N',
				'purpose' 		 => $arrpost['txtob_purpose'],
				'official' 		 => $arrpost['radob'] ? 'Y' : 'N',
				'approveRequest' => 'Y',
				'approveChief' 	 => 'Y',
				'approveHR' 	 => 'Y');
			$this->AttendanceSummary_model->add_ob($arrData);
			$this->session->set_flashdata('strSuccessMsg','OB added successfully.');
			redirect('hr/attendance_summary/dtr/ob/'.$this->uri->segment(5));
		endif;

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';
		
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_edit_ob()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrData=array(
				'obDateFrom' 	 => $arrpost['txtob_dtfrom'],
				'obDateTo' 		 => $arrpost['txtob_dtto'],
				'obTimeFrom' 	 => $arrpost['txtob_tmin'],
				'obTimeTo' 		 => $arrpost['txtob_tmout'],
				'obPlace' 		 => $arrpost['txtob_place'],
				'obMeal' 		 => $arrpost['radob_wmeal'] ? 'Y' : 'N',
				'purpose' 		 => $arrpost['txtob_purpose'],
				'official' 		 => $arrpost['radob'] ? 'Y' : 'N');
			$this->AttendanceSummary_model->edit_ob($arrData,$_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','OB updated successfully.');
			redirect('hr/attendance_summary/dtr/ob/'.$this->uri->segment(5));
		endif;

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$emp_ob = $this->AttendanceSummary_model->getOb($_GET['id']);
		$this->arrData['arrem_ob'] = $emp_ob[0];
		
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_ob()
	{
		$this->AttendanceSummary_model->delete_ob($_POST['txtdel_action']);
		$this->session->set_flashdata('strSuccessMsg','OB deleted successfully.');
		redirect('hr/attendance_summary/dtr/ob/'.$this->uri->segment(4));
	}
	# end ob

	# begin leave
	public function dtr_leave()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrLeaves'] = $this->AttendanceSummary_model->getleaves($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_leave()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrData=array(
				'dateFiled' 	=> date('Y-m-d'),
				'empNumber'	  	=> $empid,
				'leaveCode' 	=> $arrpost['sel_leavetype'],
				'specificLeave' => $arrpost['sel_spe_leave'],
				'reason'		=> $arrpost['txtleave_reason'],
				'leaveFrom' 	=> $arrpost['txtleave_dtfrom'],
				'leaveTo' 		=> $arrpost['txtleave_dtto'],
				'certifyHR' 	=> 'Y',
				'approveChief' 	=> 'Y',
				'approveRequest'=> 'N');
			$this->AttendanceSummary_model->add_leave($arrData);
			$this->session->set_flashdata('strSuccessMsg','Leave added successfully.');
			redirect('hr/attendance_summary/dtr/leave/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Leave_type_model');
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->arrData['arrleaveTypes'] = $this->Leave_type_model->getData();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_edit_leave()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrData=array(
				'leaveCode' 	=> $arrpost['sel_leavetype'],
				'specificLeave' => $arrpost['sel_spe_leave'],
				'reason'		=> $arrpost['txtleave_reason'],
				'leaveFrom' 	=> $arrpost['txtleave_dtfrom'],
				'leaveTo' 		=> $arrpost['txtleave_dtto']);
			$this->AttendanceSummary_model->edit_leave($arrData, $_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Leave updated successfully.');
			redirect('hr/attendance_summary/dtr/leave/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Leave_type_model');
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$emp_leave = $this->AttendanceSummary_model->getLeave($_GET['id']);
		$this->arrData['arremp_leave'] = $emp_leave[0];
		$this->arrData['noofdays'] = $this->AttendanceSummary_model->getTotalnoofdays($emp_leave[0]['leaveFrom'],$emp_leave[0]['leaveTo']);

		$this->arrData['arrleaveTypes'] = $this->Leave_type_model->getData();

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_leave()
	{
		$this->AttendanceSummary_model->delete_leave($_POST['txtdel_action']);
		$this->session->set_flashdata('strSuccessMsg','Leave deleted successfully.');
		redirect('hr/attendance_summary/dtr/leave/'.$this->uri->segment(4));
	}

	public function dtr_specific_leave()
	{
		$spe_leaves = $this->AttendanceSummary_model->getSpecificLeave($_GET['type']);
		if(count($spe_leaves) > 0):
			echo json_encode($spe_leaves);	
		else:
			echo 'empty';
		endif;
	}

	public function dtr_no_ofdays()
	{
		$days = $this->AttendanceSummary_model->getTotalnoofdays($_GET['leavefrom'],$_GET['leaveto']);
		echo $days;
	}
	# end leave

	# begin Compensatory Leave
	public function dtr_compensatory_leave()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrCompLeaves'] = $this->AttendanceSummary_model->getcomp_leaves($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_compensatory_leave()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$dtrEntry = $this->AttendanceSummary_model->checkEntry($empid, $arrpost['txtcompen_date']);
			$arrData=array(
				'empNumber' => $empid,
				'inAM' 		=> $arrpost['txtcl_am_timefrom'],
				'outAM'		=> $arrpost['txtcl_am_timeto'],
				'inPM' 		=> $arrpost['txtcl_pm_timefrom'],
				'outPM' 	=> $arrpost['txtcl_pm_timeto'],
				'remarks'	=> 'CL',
				'name'		=> $dtrEntry[0]['name'].';'.$_SESSION['sessName'],
				'ip'	    => $dtrEntry[0]['ip'].';'.$this->input->ip_address(),
				'editdate'  => $dtrEntry[0]['editdate'].';'.date('Y-m-d h:i:s A'));
			$this->AttendanceSummary_model->edit_comp_leave($arrData, $empid, $arrpost['txtcompen_date']);
			$this->session->set_flashdata('strSuccessMsg','Compensatory Leave added successfully.<br>DTR updated successfully.');
			redirect('hr/attendance_summary/dtr/compensatory_leave/'.$this->uri->segment(5));
		endif;
		
		$this->load->model('libraries/Leave_type_model');
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}
	# End Compensatory Leave

	# begin DTR Time
	public function dtr_time()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrdtrTime'] = $this->AttendanceSummary_model->getdtrTimes($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_time()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrdates = breakdates($arrpost['txtdtr_dtfrom'],$arrpost['txtdtr_dtto']);
			foreach($arrdates as $ddate):
				$dtrEntry = $this->AttendanceSummary_model->checkEntry($empid, $ddate);
				
				$amtimein = explode(' ',$arrpost['txtdtr_amtimein']);
				$amtimeout = explode(' ',$arrpost['txtdtr_amtimeout']);
				$pmtimein = explode(' ',$arrpost['txtdtr_pmtimein']);
				$pmtimeout = explode(' ',$arrpost['txtdtr_pmtimeout']);
				$ottimein = explode(' ',$arrpost['txtdtr_ottimein']);
				$ottimeout = explode(' ',$arrpost['txtdtr_ottimeout']);
				$arrData=array(
					'inAM' 		=> date('H:i:s', strtotime($amtimein[0])),
					'outAM'		=> date('H:i:s', strtotime($amtimeout[0])),
					'inPM' 		=> date('H:i:s', strtotime($pmtimein[0])),
					'outPM' 	=> date('H:i:s', strtotime($pmtimeout[0])),
					'inOT' 		=> date('H:i:s', strtotime($ottimein[0])),
					'outOT' 	=> date('H:i:s', strtotime($ottimeout[0])),
					'remarks'	=> '',
					'name'		=> $dtrEntry[0]['name'].';'.$_SESSION['sessName'],
					'ip'	    => $dtrEntry[0]['ip'].';'.$this->input->ip_address(),
					'editdate'  => $dtrEntry[0]['editdate'].';'.date('Y-m-d h:i:s A'));
				$this->AttendanceSummary_model->edit_dtrTime($arrData, $empid, $ddate);
			endforeach;
			$this->session->set_flashdata('strSuccessMsg','DTR updated successfully.');
			redirect('hr/attendance_summary/dtr/time/'.$this->uri->segment(5));
		endif;
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}
	# end DTR Time

	# begin Travel Order
	public function dtr_to()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrempTo'] = $this->AttendanceSummary_model->gettos($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_to()
	{
		$empid = $this->uri->segment(5);
		
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrData=array(
				'dateFiled' 	 => date('Y-m-d'),
				'empNumber'	  	 => $empid,
				'toDateFrom' 	 => $arrpost['dtfrom'],
				'toDateTo' 		 => $arrpost['dtto'],
				'destination' 	 => $arrpost['txtdestination'],
				'purpose' 		 => $arrpost['txtpurpose'],
				'fund' 		 	 => $arrpost['selfund'],
				'transportation' => $arrpost['seltranspo'],
				'perdiem' 		 => isset($arrpost['radperdiem']) ? $arrpost['radperdiem'] : 'N',
				'wmeal' 		 => isset($arrpost['radwmeal']) ? $arrpost['radwmeal'] : 'N');
			$this->AttendanceSummary_model->add_to($arrData);
			$this->session->set_flashdata('strSuccessMsg','Travel Order added successfully.');
			redirect('hr/attendance_summary/dtr/to/'.$this->uri->segment(5));
		endif;
		

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_edit_to()
	{
		$empid = $this->uri->segment(5);
		
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$arrData=array(
				'toDateFrom' 	 => $arrpost['dtfrom'],
				'toDateTo' 		 => $arrpost['dtto'],
				'destination' 	 => $arrpost['txtdestination'],
				'purpose' 		 => $arrpost['txtpurpose'],
				'fund' 		 	 => $arrpost['selfund'],
				'transportation' => $arrpost['seltranspo'],
				'perdiem' 		 => isset($arrpost['radperdiem']) ? $arrpost['radperdiem'] : 'N',
				'wmeal' 		 => isset($arrpost['radwmeal']) ? $arrpost['radwmeal'] : 'N');
			$this->AttendanceSummary_model->edit_to($arrData, $_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Travel Order updated successfully.');
			redirect('hr/attendance_summary/dtr/to/'.$this->uri->segment(5));
		endif;

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$arrempto = $this->AttendanceSummary_model->getTo($_GET['id']);
		$this->arrData['arrempto'] = $arrempto[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_to()
	{
		$this->AttendanceSummary_model->delete_to($_POST['txtdel_action']);
		$this->session->set_flashdata('strSuccessMsg','Travel order deleted successfully.');
		redirect('hr/attendance_summary/dtr/to/'.$this->uri->segment(4));
	}
	# end Travel Order

	# begin Flag Ceremony
	public function dtr_flagcrmy()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrflgcrmy'] = $this->AttendanceSummary_model->getflagcrmys($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_flagcrmy()
	{
		$empid = $this->uri->segment(5);
		
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			# First check if dtr entry is exists
			$dtrEntry = $this->AttendanceSummary_model->checkEntry($empid, $arrpost['txtdtr_fcdate']);
			$fc_timein = explode(' ',$arrpost['txtdtr_amtimein']);
			if(count($dtrEntry) > 0):
				# Edit Entry
				$arrData=array(
						'inAM' 	   => date('H:i:s', strtotime($fc_timein[0])),
						'dtrDate'  => $arrpost['txtdtr_fcdate'],
						'remarks'  => 'FC',
						'name'	   => $_SESSION['sessName'],
						'ip'	   => $dtrEntry[0]['ip'].';'.$this->input->ip_address(),
						'editdate' => $dtrEntry[0]['editdate'].';'.date('Y-m-d h:i:s A'));
				$this->AttendanceSummary_model->edit_flagcrmy($arrData, $empid, $arrpost['txtdtr_fcdate']);
			else:
				# Add Entry
				$arrData=array(
						'empNumber'=> $empid,
						'inAM' 	   => date('H:i:s', strtotime($fc_timein[0])),
						'dtrDate'  => $arrpost['txtdtr_fcdate'],
						'remarks'  => 'FC',
						'name'	   => $_SESSION['sessName'],
						'ip'	   => $this->input->ip_address(),
						'editdate' => date('Y-m-d h:i:s A'));
				$this->AttendanceSummary_model->add_flagcrmy($arrData);
			endif;
			$this->session->set_flashdata('strSuccessMsg','Flag ceremony entry added successfully.');
			redirect('hr/attendance_summary/dtr/flagcrmy/'.$this->uri->segment(5));
		endif;
		

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}
	# end Flag Ceremony

	public function dtr_certify_offset()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function override()
	{
		// $empid = $this->uri->segment(4);
		// $res = $this->Hr_model->getData($empid,'','all');
		// $this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function qr_code()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}


   	public function download_qrcode()
   	{
   		$this->load->helper('download');
   		$empNumber = $this->uri->segment(4);
   		$data = file_get_contents("./uploads/qr/".$empNumber.".PNG");
   		$name = 'HRMISQR'.$empNumber.date('Ymd').'.jpg';

   		force_download($name, $data);
   	}
	

	public function generate_qrcode()
	{
		$this->load->library('ciqrcode');
		$empNumber = $this->uri->segment(4);

		$qr_image=$empNumber.'.png';
		$strData = 'http://hrmis.dost.gov.ph/scanqr/index.php?empNo='.$empNumber;
		$params['data'] = $strData;
		$params['level'] = 'H';
		$params['size'] = 8;
		$params['savename'] =FCPATH.STORE_QR.$qr_image;
		if($this->ciqrcode->generate($params)):
			$this->session->set_flashdata('strSuccessMsg','QR Code successfully generated.');
			redirect('hr/attendance_summary/qr_code/'.$empNumber);
		else:
			$this->session->set_flashdata('strErrorMsg','Failed to generate QR Code, please try again later or contact Administrator.');
		endif;

	}

	public function override_ob()
	{
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_ob_add()
	{
		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function exclude_dtr()
	{
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_exec_dtr_add()
	{
		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function generate_dtr()
	{
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_gen_dtr_add()
	{
		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}


}


