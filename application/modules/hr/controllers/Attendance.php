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
        $this->load->model(array('Hr_model','Attendance_summary_model','employee/Leave_model','CalendarDates_model','libraries/Request_model'));
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
		
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$this->arrData['arremp_dtr'] = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);

		$this->arrData['arrleaves'] = $this->Leave_model->getleave($empid, $month, $yr);
		$this->arrData['arrspe_leave'] = $this->Leave_model->getspe_leave($empid, $yr);
		// echo '<pre>';
		// print_r($this->arrData['arremp_dtr']);
		// die();

		# GET FORCED LEAVE
		$no_fl = $this->Leave_model->getleave_data('FL');
		$no_fl = $no_fl[0]['numOfDays'];
		$month_fl = $this->Leave_model->getforce_leave($empid, $yr, $month);
		$this->arrData['fl_left'] = $no_fl - count($month_fl);

		// TODO:: GET OFFSET BALANCE
		// $this->arrData['arroff_bal'] = $this->Attendance_summary_model->getOffsetBalance($empid, $month, $yr);
		
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');

		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);

		$this->arrData['arremp_dtr'] = $arremp_dtr['dtr'];
		$this->arrData['emp_workingdays'] = $arremp_dtr['total_workingdays'];
		$this->arrData['date_absents'] = $arremp_dtr['date_absents'];
		$this->arrData['total_late'] = $arremp_dtr['total_late'];
		$this->arrData['total_undertime'] = $arremp_dtr['total_undertime'];
		$this->arrData['total_days_ut'] = $arremp_dtr['total_days_ut'];
		$this->arrData['total_days_late'] = $arremp_dtr['total_days_late'];
		$this->arrData['arrleaves'] = $this->Leave_model->getleave($empid, $month, $yr);
		// die();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function leave_balance()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['arrempleave'] = $this->Leave_model->getleave($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance_update()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');

		$this->arrData['arrData'] = $res[0];
		$this->arrData['arrLeaveBalance'] = $this->Leave_model->getleave($empid, $month, $yr);
		$arrLatestBalance = $this->Leave_model->getleave($empid);
		$this->arrData['arrLatestBalance'] = $arrLatestBalance[0];

		# Leave Balance details in modal
		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);

		# vl + (late + undertime + absent w/o leave) + fl
		// TODO:: Halfday for vl
		$vl 		 = $arremp_dtr['total_days_vl'];	# days
		$late 		 = $this->Leave_model->ltut_table_equiv($arremp_dtr['total_late']);		# minutes
		$undertime 	 = $this->Leave_model->ltut_table_equiv($arremp_dtr['total_undertime']);	# minutes
		$abswo_leave = $arremp_dtr['total_days_lwop'];	# days
		$fl 		 = $arremp_dtr['total_days_fl'];	# days
		$vl_abs_un_wpay = $vl + ($late + $undertime + $abswo_leave) + $fl;
		$this->arrData['vl_abs_un_wpay'] = $vl_abs_un_wpay;
		$this->arrData['month_bal'] = ($arrLatestBalance[0]['vlBalance'] + $_ENV['leave_earned']) - $vl_abs_un_wpay;

		# previous month + earned month
		$vl_month_bal = ($arrLatestBalance[0]['vlBalance'] + $_ENV['leave_earned']) - $vl_abs_un_wpay;
		$this->arrData['vl_month_bal'] = $vl_month_bal <= 0 ? ($arrLatestBalance[0]['vlBalance'] + $_ENV['leave_earned']) : $vl_month_bal;
		# Absent Undertime without pay
		$this->arrData['vl_abs_un_wopay'] = $vl_month_bal <= 0 ? ($vl_month_bal * -1) : '';

		# previous month + earned month
		// TODO:: Halfday for sl
		$sl = $arremp_dtr['total_days_sl'];	# days
		$this->arrData['sl_abs_wpay'] = $sl;
		$sl_month_bal = ($arrLatestBalance[0]['slBalance'] + $_ENV['leave_earned']) - $sl;
		$this->arrData['sl_month_bal'] = $sl_month_bal <= 0 ? ($arrLatestBalance[0]['slBalance'] + $_ENV['leave_earned']) : $sl_month_bal;
		# Absent Undertime without pay
		$this->arrData['sl_abs_wopay'] = $sl_month_bal <= 0 ? ($sl_month_bal * -1) : '';

		# other leaves for yearly
		$leaves = $this->Leave_model->getleave_data();
		$arr_oth_daysleave = array();
		foreach(array('PL','FL','STL','MTL','PTL') as $eleave):
			$key = array_search($eleave, array_column($leaves, 'leaveCode'));
			$arr_oth_daysleave[$eleave] = $leaves[$key]['numOfDays'];
		endforeach;
		# date always starts in january 1 of the year and end in the last day of the process month
		$process_date = array(
							array('state' => 'previous', 'from' => $yr.'-01-01', 'to' => join('-',array($yr,$arrLatestBalance[0]['periodMonth'],cal_days_in_month(CAL_GREGORIAN,$arrLatestBalance[0]['periodMonth'], $yr)))),
							array('state' => 'current', 'from' => join('-',array($yr,$arrLatestBalance[0]['periodMonth']+1,'01')), 'to' => join('-',array($yr,$arrLatestBalance[0]['periodMonth']+1,cal_days_in_month(CAL_GREGORIAN, $arrLatestBalance[0]['periodMonth']+1, $yr)))));
		$arrprocess_days = array();
		foreach($process_date as $procdate):
			$break_dates = $this->CalendarDates_model->dates_nw_nh($procdate['from'], $procdate['to'], $yr, $empid);
			$days_toless = array();
			foreach(array('PL','FL','STL','MTL','PTL') as $eleave):
				$emp_fl = $this->Attendance_summary_model->getleaves($empid, $eleave);
				$arrfl_filedates = array();
				foreach($emp_fl as $efl):
					$fl_filedates = breakdates(date('Y-m-d', strtotime($efl['leaveFrom'])), date('Y-m-d', strtotime($efl['leaveTo'])));
					$arrfl_filedates = array_merge($arrfl_filedates,$fl_filedates);
				endforeach;
				# check if filedates inside the process dates
				$nodays = count(array_intersect($arrfl_filedates, $break_dates));
				$days_toless[$eleave] = $nodays;
			endforeach;
			$arrprocess_days[$procdate['state']] = $days_toless;
		endforeach;

		$this->arrData['arr_oth_daysleave'] = $arr_oth_daysleave;
		$this->arrData['arrprocess_days'] = $arrprocess_days;
		$this->arrData['employeedata'] = $this->Hr_model->getEmployeePersonal($empid);

		// echo '<pre>';
		$curr_date = date('Y M', strtotime($arrLatestBalance[0]['periodYear'].'-'.$arrLatestBalance[0]['periodMonth']));
		$next_date = date("Y M", strtotime("+1 month", strtotime($curr_date)));
		$att_summary = $this->Attendance_summary_model->getemp_dtr($empid, $arrLatestBalance[0]['periodMonth']+1, date('Y',strtotime($next_date)));
		
		// $effectiveDate = date("F", strtotime($arrLatestBalance[0]['periodMonth'] . " +1 month"));
		// echo '<br>current month = '.$curr_date;
		// echo '<br>next month = '.$next_date;
		// print_r($att_summary);
		// die();
		$this->arrData['att_summary'] = array('days_ut_late' => count($att_summary['total_days_late']) + count($att_summary['total_days_ut']),
											  'mins_ut_late' => $att_summary['total_undertime'] + $att_summary['total_late'],
											  'days_lwop'	 => $att_summary['total_days_lwop'],
											  'days_presents'=> $att_summary['total_workingdays'] - count($att_summary['date_absents']),
											  'date_absents' => count($att_summary['date_absents']));
		// print_r($this->arrData['att_summary']);
		// die();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function leave_balance_set()
	{
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$empid = $this->uri->segment(4);
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			$arrData=array(
				'empNumber'		=> $empid,
				'periodMonth'	=> $month,
				'periodYear'	=> $yr,
				'vlBalance' 	=> $arrpost['vl_start'],
				'vlAbsUndWPay' 	=> $arrpost['vl_ut_wpay'],
				'vlAbsUndWoPay' => $arrpost['vl_ut_wopay'],
				'slBalance' 	=> $arrpost['sl_start'],
				'slAbsUndWPay' 	=> $arrpost['sl_ut_wpay'],
				'slAbsUndWoPay' => $arrpost['sl_ut_wopay'],
				'off_bal' 		=> $arrpost['off_bal'],
				'flBalance' 	=> $arrpost['fl_bal'],
				'plBalance' 	=> $arrpost['pl_bal']);
			$this->Leave_model->addLeaveBalance($arrData);
			$this->session->set_flashdata('strSuccessMsg','Leave balance added successfully.');
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month='.$month.'&yr='.$yr);
		endif;
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['action'] = 'add';
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_monetization()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrLeaves'] = $this->Leave_model->getleave($empid);
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function filed_request()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$arremp_request = $this->Request_model->getEmpFiledRequest($empid,array('Commutation','DTR','Leave','Monetization','OB','TO'));
		// print_r($arremp_request);
		// die();
		// $arrLeave = array_map(function($r){if(strtolower($r['requestCode']) == 'leave'){ return $r;}}, $arremp_request);
		
		// $arrRequest = array();

		// foreach($arremp_request as $request):
		// 	if($request['requestCode'] == 'Leave'):
		// 		$reqdetails = explode(';', $request['requestDetails']);
		// 		$request['requestCode'] = $reqdetails[0];
		// 	endif;
		// 	$requestFlow = $this->Request_model->getRequestFlow($request['requestCode']);
		// 	if($request['SignatoryFin'] ==''):
		// 		$sign_request = $this->Notification_model->checksignatory1($requestFlow, $request);
		// 		if($sign_request=='done'):
		// 			$arrRequest[] = array('emp_request' => $request, 'next_sign' => '');
		// 		else:
		// 			$arrRequest[] = array('emp_request' => $request, 'next_sign' => $this->Notification_model->getDestination($sign_request));
		// 		endif;
		// 	else:
		// 		$arrRequest[] = array('emp_request' => $request, 'next_sign' => '');
		// 	endif;
		// endforeach;
		// die();
		$this->arrData['arrcomm'] = array_map(function($r){if(strtolower($r['requestCode']) == 'commutation'){ return $r;}}, $arremp_request);
		$this->arrData['arrdtr'] = array_map(function($r){if(strtolower($r['requestCode']) == 'dtr'){ return $r;}}, $arremp_request);
		$this->arrData['arrleave'] = array_map(function($r){if(strtolower($r['requestCode']) == 'leave'){ return $r;}}, $arremp_request);
		$this->arrData['arrmonetize'] = array_map(function($r){if(strtolower($r['requestCode']) == 'monetization'){ return $r;}}, $arremp_request);
		$this->arrData['arrob'] = array_map(function($r){if(strtolower($r['requestCode']) == 'ob'){ return $r;}}, $arremp_request);
		$this->arrData['arrto'] = array_map(function($r){if(strtolower($r['requestCode']) == 'to'){ return $r;}}, $arremp_request);
		// $this->arrData['arrOb'] = ;
		// $this->arrData['arrTo'] = ;
		// die();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	# Begin Broken Schedule
	public function dtr_broken_sched()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['schedules'] = $this->Attendance_summary_model->getBrokenschedules($empid);

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
			$this->Attendance_summary_model->add_brokensched($arrData);
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
			$this->Attendance_summary_model->edit_brokensched($arrData, $_GET['id']);
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
		$sched = $this->Attendance_summary_model->getSchedule($_GET['id']);
		$this->arrData['arrshedule'] = $sched[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_broken_sched()
	{
		$this->Attendance_summary_model->delete_brokensched($_POST['txtdel_action']);
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
		$this->arrData['arremp_dtr'] = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);

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
						$this->Attendance_summary_model->edit_dtr($arrData, $dtrid);
					else:
						$this->Attendance_summary_model->add_dtr($arrData);
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
		$this->arrData['arrHolidays'] = $this->Attendance_summary_model->getLocalHolidays($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_local_holiday()
	{
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			$arrData=array(
				'empNumber'	  => $this->uri->segment(5),
				'holidayCode' => $arrpost['selholiday']);
			$this->Attendance_summary_model->add_localholiday($arrData);
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
			$this->Attendance_summary_model->edit_localholiday($arrData,$_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Local holiday updated successfully.');
			redirect('hr/attendance_summary/dtr/local_holiday/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Holiday_model');
		$empid = $this->uri->segment(5);

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$empholiday = $this->Attendance_summary_model->getHoliday($_GET['id']);
		$this->arrData['arrempholiday'] = $empholiday[0];
		
		$this->arrData['localHolidays'] = $this->Holiday_model->checkLocExist();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_local_holiday()
	{
		$this->Attendance_summary_model->delete_localholiday($_POST['txtdel_action']);
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
		$this->arrData['arrObs'] = $this->Attendance_summary_model->getobs($empid);

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
			$this->Attendance_summary_model->add_ob($arrData);
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
			$this->Attendance_summary_model->edit_ob($arrData,$_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','OB updated successfully.');
			redirect('hr/attendance_summary/dtr/ob/'.$this->uri->segment(5));
		endif;

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$emp_ob = $this->Attendance_summary_model->getOb($_GET['id']);
		$this->arrData['arrem_ob'] = $emp_ob[0];
		
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_ob()
	{
		$this->Attendance_summary_model->delete_ob($_POST['txtdel_action']);
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

		$this->arrData['arrLeaves'] = $this->Attendance_summary_model->getleaves($empid);

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
			$this->Attendance_summary_model->add_leave($arrData);
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
			$this->Attendance_summary_model->edit_leave($arrData, $_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Leave updated successfully.');
			redirect('hr/attendance_summary/dtr/leave/'.$this->uri->segment(5));
		endif;

		$this->load->model('libraries/Leave_type_model');
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$emp_leave = $this->Attendance_summary_model->getLeave($_GET['id']);
		$this->arrData['arremp_leave'] = $emp_leave[0];
		$this->arrData['noofdays'] = $this->Attendance_summary_model->getTotalnoofdays($emp_leave[0]['leaveFrom'],$emp_leave[0]['leaveTo']);

		$this->arrData['arrleaveTypes'] = $this->Leave_type_model->getData();

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_leave()
	{
		$this->Attendance_summary_model->delete_leave($_POST['txtdel_action']);
		$this->session->set_flashdata('strSuccessMsg','Leave deleted successfully.');
		redirect('hr/attendance_summary/dtr/leave/'.$this->uri->segment(4));
	}

	public function dtr_specific_leave()
	{
		$spe_leaves = $this->Attendance_summary_model->getSpecificLeave($_GET['type']);
		if(count($spe_leaves) > 0):
			echo json_encode($spe_leaves);	
		else:
			echo 'empty';
		endif;
	}

	public function dtr_no_ofdays()
	{
		$days = $this->Attendance_summary_model->getTotalnoofdays($_GET['leavefrom'],$_GET['leaveto']);
		echo $days;
	}
	# end leave

	# begin Compensatory Leave
	public function dtr_compensatory_leave()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrCompLeaves'] = $this->Attendance_summary_model->getcomp_leaves($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_compensatory_leave()
	{
		$empid = $this->uri->segment(5);

		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			$dtrEntry = $this->Attendance_summary_model->checkEntry($empid, $arrpost['txtcompen_date']);
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
			$this->Attendance_summary_model->edit_comp_leave($arrData, $empid, $arrpost['txtcompen_date']);
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

		$this->arrData['arrdtrTime'] = $this->Attendance_summary_model->getdtrTimes($empid);

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
				$dtrEntry = $this->Attendance_summary_model->checkEntry($empid, $ddate);
				
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
				$this->Attendance_summary_model->edit_dtrTime($arrData, $empid, $ddate);
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

		$this->arrData['arrempTo'] = $this->Attendance_summary_model->gettos($empid);

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
			$this->Attendance_summary_model->add_to($arrData);
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
			$this->Attendance_summary_model->edit_to($arrData, $_GET['id']);
			$this->session->set_flashdata('strSuccessMsg','Travel Order updated successfully.');
			redirect('hr/attendance_summary/dtr/to/'.$this->uri->segment(5));
		endif;

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'edit';

		$arrempto = $this->Attendance_summary_model->getTo($_GET['id']);
		$this->arrData['arrempto'] = $arrempto[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_delete_to()
	{
		$this->Attendance_summary_model->delete_to($_POST['txtdel_action']);
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

		$this->arrData['arrflgcrmy'] = $this->Attendance_summary_model->getflagcrmys($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_add_flagcrmy()
	{
		$empid = $this->uri->segment(5);
		
		$arrpost = $this->input->post();
		if(!empty($arrpost)):
			# HR Account
			# First check if dtr entry is exists
			$dtrEntry = $this->Attendance_summary_model->checkEntry($empid, $arrpost['txtdtr_fcdate']);
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
				$this->Attendance_summary_model->edit_flagcrmy($arrData, $empid, $arrpost['txtdtr_fcdate']);
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
				$this->Attendance_summary_model->add_flagcrmy($arrData);
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

		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $month, $yr);
		$this->arrData['arremp_dtr'] = $arremp_dtr['dtr'];
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


}


