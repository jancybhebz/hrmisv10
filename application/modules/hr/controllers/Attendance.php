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
        $this->load->model(array('Hr_model','Attendance_summary_model','employee/Leave_model','CalendarDates_model','libraries/Request_model','employee/Leave_monetization_model','libraries/Org_structure_model','libraries/Appointment_status_model'));
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
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$arrPost = $this->input->post();

		if(!empty($arrPost)):
			$leave_data = json_decode($arrPost['txtleave_data'],true);
		else:
			$emp_leave_balance = $this->Leave_model->getleave($empid, $month, $yr);
			$arrLeaveBalance = array();
			foreach($emp_leave_balance as $leave_bal):
				$arrLeaveBalance[] =  array('lb_detail' => $leave_bal,
											'filed_leave' => array(
													'filed_spe' => $this->Leave_model->filed_leave_others($empid,$month,$yr,'PL'),
													'filed_force' => $this->Leave_model->filed_leave_others($empid,$month,$yr,'FL'),
													'filed_study' => $this->Leave_model->filed_leave_others($empid,$month,$yr,'STL'),
													'filed_pater'=> $this->Leave_model->filed_leave_others($empid,$month,$yr,'PTL'),
													'filed_mater'=> $this->Leave_model->filed_leave_others($empid,$month,$yr,'MTL')));
			endforeach;

			$this->arrData['arrLeaveBalance'] = $arrLeaveBalance;
			$arrLatestBalance = $this->Leave_model->getleave($empid);
			$this->arrData['arrLatestBalance'] = $arrLatestBalance[0];

			$curr_date = date('Y M', strtotime($arrLatestBalance[0]['periodYear'].'-'.$arrLatestBalance[0]['periodMonth']));
			$next_date = date("Y M", strtotime("+1 month", strtotime($curr_date)));
			$att_summary = $this->Attendance_summary_model->getemp_dtr($empid, $arrLatestBalance[0]['periodMonth']+1, date('Y',strtotime($next_date)));
			
			$this->arrData['att_summary'] = array('days_ut_late' => count($att_summary['total_days_late']) + count($att_summary['total_days_ut']),
												  'mins_ut_late' => $att_summary['total_undertime'] + $att_summary['total_late'],
												  'days_lwop'	 => $att_summary['total_days_lwop'],
												  'days_presents'=> $att_summary['total_workingdays'] - count($att_summary['date_absents']),
												  'date_absents' => count($att_summary['date_absents']));
			$leave_data = array('dtr_summary' => $this->arrData['att_summary'], 'latest_leave' => $arrLatestBalance[0]);
		endif;

		# data for update and for view
		$leave_earned = $this->Leave_model->leave_earned($leave_data['dtr_summary']['date_absents']);
		$vlfiled = $this->Leave_model->filed_vl($empid,$month,$yr);
		$slfiled = $this->Leave_model->filed_sl($empid,$month,$yr);
		$ut_late = $this->Leave_model->ltut_table_equiv($leave_data['dtr_summary']['mins_ut_late']);
		$curr_sl = $leave_data['latest_leave']['slBalance'] + $leave_earned;
		$period_month = $leave_data['latest_leave']['periodMonth'] == 12 ? 1 : $leave_data['latest_leave']['periodMonth'] + 1;
		$period_yr = $leave_data['latest_leave']['periodMonth'] == 12 ? $leave_data['latest_leave']['periodYear'] + 1 : $leave_data['latest_leave']['periodYear'];
		$arrLeave_data = array('empNumber'	=> $empid,
						 'periodMonth'	=> $period_month,
						 'periodYear'	=> $period_yr,
						 'vlEarned'		=> $leave_earned,
						 'vlBalance'	=> ($leave_data['latest_leave']['vlBalance'] + $leave_earned) - ($ut_late) - $vlfiled, # (vlbalance + leave_earned) - (late + undertime) - vlfiled
						 'vlPreBalance'	=> $leave_data['latest_leave']['vlBalance'],
						 'vlAbsUndWPay'	=> ($slfiled > $curr_sl) ? ($slfiled + $curr_sl) : $vlfiled + $ut_late,
						 'vlAbsUndWoPay'=> $leave_data['dtr_summary']['date_absents'],
						 'slEarned'		=> $leave_earned,
						 'slBalance'	=> ($slfiled > $curr_sl) ? 0 : ($curr_sl - $slfiled),
						 'slPreBalance'	=> $leave_data['latest_leave']['slBalance'],
						 'slAbsUndWPay'	=> ($slfiled > $curr_sl) ? 0 : $slfiled,
						 'slAbsUndWoPay'=> 0);

		if(!empty($arrPost)):
			$leave_data = json_decode($arrPost['txtleave_data'],true);
			$this->Leave_model->addLeaveBalance($arrLeave_data);
			$this->session->set_flashdata('strSuccessMsg','Leave balance updated successfully.');
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month=all&yr='.$yr);
		else:
			$arrLeaveBalance = array();
			$arrLeaveBalance =  array('lb_detail' => $arrLeave_data,
									  'filed_leave' => array(
												'filed_spe' => $this->Leave_model->filed_leave_others($empid,$month,$yr,'PL'),
												'filed_force' => $this->Leave_model->filed_leave_others($empid,$month,$yr,'FL'),
												'filed_study' => $this->Leave_model->filed_leave_others($empid,$month,$yr,'STL'),
												'filed_pater'=> $this->Leave_model->filed_leave_others($empid,$month,$yr,'PTL'),
												'filed_mater'=> $this->Leave_model->filed_leave_others($empid,$month,$yr,'MTL')));
			$this->arrData['arrLeave_data'] = $arrLeaveBalance;
		endif;

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['employeedata'] = $this->Hr_model->getEmployeePersonal($empid);
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function leave_balance_set()
	{
		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
		$empid = $this->uri->segment(4);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData=array(
				'empNumber'		=> $empid,
				'periodMonth'	=> $month,
				'periodYear'	=> $yr,
				'vlBalance' 	=> $arrPost['vl_start'],
				'vlAbsUndWPay' 	=> $arrPost['vl_ut_wpay'],
				'vlAbsUndWoPay' => $arrPost['vl_ut_wopay'],
				'slBalance' 	=> $arrPost['sl_start'],
				'slAbsUndWPay' 	=> $arrPost['sl_ut_wpay'],
				'slAbsUndWoPay' => $arrPost['sl_ut_wopay'],
				'off_bal' 		=> $arrPost['off_bal'],
				'flBalance' 	=> $arrPost['fl_bal'],
				'plBalance' 	=> $arrPost['pl_bal']);
			$this->Leave_model->addLeaveBalance($arrData);
			$this->session->set_flashdata('strSuccessMsg','Leave balance added successfully.');
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month='.$month.'&yr='.$yr);
		endif;
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['action'] = 'add';
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance_override()
	{
		$empid = $this->uri->segment(4);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array('vlAbsUndWPay' 	 => $arrPost['txtauwp_vl'],
							 'slAbsUndWPay' 	 => $arrPost['txtauwp_sl'],
							 'vlBalance' 		 => $arrPost['txtperiod_vl'],
							 'slBalance' 		 => $arrPost['txtperiod_sl'],
							 'vlAbsUndWoPay' 	 => $arrPost['txtauwop_vl'],
							 'slAbsUndWoPay' 	 => $arrPost['txtauwop_sl'],
							 'plBalance' 		 => $arrPost['txtspe_curr'],
							 'flBalance' 		 => $arrPost['txtfl_curr'],
							 'stlBalance' 		 => $arrPost['txtsdl_curr'],
							 'mtlBalance' 		 => $arrPost['txtmtl_curr'],
							 'ptlBalance' 		 => $arrPost['txtptl_curr'],
							 'off_bal' 			 => $arrPost['txtbalance'],
							 'off_gain' 		 => $arrPost['txtgain'],
							 'off_used' 		 => $arrPost['txtused'],
							 'trut_notimes' 	 => $arrPost['txtlate_ut_days'],
							 'trut_totalminutes' => $arrPost['txtlate_ut_hhmm'],
							 'nodays_awol' 		 => $arrPost['txtdays_awol'],
							 'nodays_present' 	 => $arrPost['txtdays_present'],
							 'nodays_absent' 	 => $arrPost['txtdays_absent'],
							 'ctr_laundry' 		 => $arrPost['txtlaundry'],
							 'ctr_8h' 			 => $arrPost['txtsubs_8hrs'],
							 'ctr_6h' 			 => $arrPost['txtsubs_6hrs'],
							 'ctr_5h' 			 => $arrPost['txtsubs_5hrs'],
							 'ctr_4h' 			 => $arrPost['txtsubs_4hrs'],
							 'ctr_wmeal' 		 => $arrPost['txtwith_meal'],
							 'ctr_diem' 		 => $arrPost['txtamt_training']);
			$this->Leave_model->editLeaveBalance($arrData, $arrPost['txtoverride_id']);
			$this->session->set_flashdata('strSuccessMsg','Leave balance override successfully.');
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month=all&yr='.date('Y'));
		endif;
	}

	public function leave_balance_rollback()
	{
		$empid = $this->uri->segment(4);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$this->Leave_model->deleteLeaveBalance($arrPost['txtlb_id']);
			$this->session->set_flashdata('strSuccessMsg','Rollback Saved Successfully.');
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month=all&yr='.date('Y'));
		endif;
	}

	public function leave_monetization()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$arrLeaves = $this->Leave_model->getleave($empid);
		
		$total_monetize = $this->Leave_monetization_model->getemp_total_monetized($empid, date('n'), date('Y'));
		$sl_monetized = 0;
		if(count($arrLeaves) > 0):
			if(count($total_monetize) > 0):
				$sl_monetized = $arrLeaves[0]['slBalance'] - $total_monetize['slmonetize'];
				$vl_monetized = $arrLeaves[0]['vlBalance'] - $total_monetize['vlmonetize'];
			else:
				$sl_monetized = $arrLeaves[0]['slBalance'];
				$vl_monetized = $arrLeaves[0]['vlBalance'];
			endif;
		else:
			$sl_monetized = '0.0000';
			$vl_monetized = '0.0000';
		endif;

		$approved_vl = $this->Leave_model->approved_vl($empid, $arrLeaves[0]['periodYear'], sprintf('%02d', $arrLeaves[0]['periodMonth']+1));
		$approved_sl = $this->Leave_model->approved_sl($empid, $arrLeaves[0]['periodYear'], sprintf('%02d', $arrLeaves[0]['periodMonth']+1));

		$this->arrData['total_monetize'] = $total_monetize;
		$this->arrData['sl_monetized'] = $sl_monetized;
		$this->arrData['vl_monetized'] = $vl_monetized;
		$this->arrData['sl_projected'] = $sl_monetized - $approved_sl;
		$this->arrData['vl_projected'] = $vl_monetized - $approved_vl;
		$this->arrData['arrLeaves'] = $arrLeaves;
		$this->arrData['arrMonetize'] = $this->Leave_monetization_model->getemp_monetized($empid, currmo(), curryr());
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function filed_request()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$arremp_request = $this->Request_model->getEmpFiledRequest($empid,array('Commutation','DTR','Leave','Monetization','OB','TO'));

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
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData=array(
				'empNumber'	=> $this->uri->segment(5),
				'schemeCode'=> $arrPost['selscheme'],
				'dateFrom'	=> $arrPost['from'],
				'dateTo'	=> $arrPost['to']);
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
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData=array(
				'schemeCode'=> $arrPost['selscheme'],
				'dateFrom'	=> $arrPost['from'],
				'dateTo'	=> $arrPost['to']);
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
		$arrPost = $this->input->post();
		$dtr_json = json_decode($arrPost['txtjson'], true);
		foreach($dtr_json as $dtr):
			# check if row
			if(count($dtr) > 0):
				# check if body
				if(count($dtr['tr']) > 6):
					$dtrid = $dtr['tr'][1]['td'];
					$arrData = array('empNumber'	=> $arrPost['empnum'],
									 'dtrDate'		=> $arrPost['yr'].'-'.$arrPost['month'].'-'.$dtr['tr'][2]['td'],
									 'inAM' 		=> $dtr['tr'][3]['td'],
									 'outAM' 		=> $dtr['tr'][4]['td'],
									 'inPM' 		=> $dtr['tr'][5]['td'],
									 'outPM' 		=> $dtr['tr'][6]['td'],
									 'inOT' 		=> $dtr['tr'][7]['td'],
									 'outOT' 		=> $dtr['tr'][8]['td'],
									 // TODO:: OT field
									 // 'OT' => $arrPost['empnum'],
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
		redirect('hr/attendance_summary/dtr/edit_mode/'.$arrPost['empnum'].'?month='.$arrPost['month'].'&yr='.$arrPost['yr']);
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
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData=array(
				'empNumber'	  => $this->uri->segment(5),
				'holidayCode' => $arrPost['selholiday']);
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
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData=array(
				'holidayCode' => $arrPost['selholiday']);
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

		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrData=array(
				'dateFiled' 	 => date('Y-m-d'),
				'empNumber'	  	 => $this->uri->segment(5),
				'requestID' 	 => '',
				'obDateFrom' 	 => $arrPost['txtob_dtfrom'],
				'obDateTo' 		 => $arrPost['txtob_dtto'],
				'obTimeFrom' 	 => $arrPost['txtob_tmin'],
				'obTimeTo' 		 => $arrPost['txtob_tmout'],
				'obPlace' 		 => $arrPost['txtob_place'],
				'obMeal' 		 => $arrPost['radob_wmeal'] ? 'Y' : 'N',
				'purpose' 		 => $arrPost['txtob_purpose'],
				'official' 		 => $arrPost['radob'] ? 'Y' : 'N',
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

		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrData=array(
				'obDateFrom' 	 => $arrPost['txtob_dtfrom'],
				'obDateTo' 		 => $arrPost['txtob_dtto'],
				'obTimeFrom' 	 => $arrPost['txtob_tmin'],
				'obTimeTo' 		 => $arrPost['txtob_tmout'],
				'obPlace' 		 => $arrPost['txtob_place'],
				'obMeal' 		 => $arrPost['radob_wmeal'] ? 'Y' : 'N',
				'purpose' 		 => $arrPost['txtob_purpose'],
				'official' 		 => $arrPost['radob'] ? 'Y' : 'N');
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

		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrData=array(
				'dateFiled' 	=> date('Y-m-d'),
				'empNumber'	  	=> $empid,
				'leaveCode' 	=> $arrPost['sel_leavetype'],
				'specificLeave' => $arrPost['sel_spe_leave'],
				'reason'		=> $arrPost['txtleave_reason'],
				'leaveFrom' 	=> $arrPost['txtleave_dtfrom'],
				'leaveTo' 		=> $arrPost['txtleave_dtto'],
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

		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrData=array(
				'leaveCode' 	=> $arrPost['sel_leavetype'],
				'specificLeave' => $arrPost['sel_spe_leave'],
				'reason'		=> $arrPost['txtleave_reason'],
				'leaveFrom' 	=> $arrPost['txtleave_dtfrom'],
				'leaveTo' 		=> $arrPost['txtleave_dtto']);
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
		
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$dtrEntry = $this->Attendance_summary_model->checkEntry($empid, $arrPost['txtcompen_date']);
			$arrData=array(
				'empNumber' => $empid,
				'inAM' 		=> $arrPost['txtcl_am_timefrom'],
				'outAM'		=> $arrPost['txtcl_am_timeto'],
				'inPM' 		=> $arrPost['txtcl_pm_timefrom'],
				'outPM' 	=> $arrPost['txtcl_pm_timeto'],
				'remarks'	=> 'CL',
				'name'		=> (count($dtrEntry) > 0 ? $dtrEntry[0]['name'].';' : '').$_SESSION['sessName'],
				'ip'	    => (count($dtrEntry) > 0 ? $dtrEntry[0]['ip'].';' : '').$this->input->ip_address(),
				'editdate'  => (count($dtrEntry) > 0 ? $dtrEntry[0]['editdate'].';' : '').date('Y-m-d h:i:s A'));
			if(count($dtrEntry) > 0):
				$this->Attendance_summary_model->edit_comp_leave($arrData, $empid, $arrPost['txtcompen_date']);
			else:
				$arrData['dtrDate'] = $arrPost['txtcompen_date'];
				$this->Attendance_summary_model->add_dtr($arrData);
			endif;

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

		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrdates = breakdates($arrPost['txtdtr_dtfrom'],$arrPost['txtdtr_dtto']);
			foreach($arrdates as $ddate):
				$dtrEntry = $this->Attendance_summary_model->checkEntry($empid, $ddate);
				
				$amtimein = explode(' ',$arrPost['txtdtr_amtimein']);
				$amtimeout = explode(' ',$arrPost['txtdtr_amtimeout']);
				$pmtimein = explode(' ',$arrPost['txtdtr_pmtimein']);
				$pmtimeout = explode(' ',$arrPost['txtdtr_pmtimeout']);
				$ottimein = explode(' ',$arrPost['txtdtr_ottimein']);
				$ottimeout = explode(' ',$arrPost['txtdtr_ottimeout']);
				$arrData=array(
					'inAM' 		=> date('H:i:s', strtotime($amtimein[0])),
					'outAM'		=> date('H:i:s', strtotime($amtimeout[0])),
					'inPM' 		=> date('H:i:s', strtotime($pmtimein[0])),
					'outPM' 	=> date('H:i:s', strtotime($pmtimeout[0])),
					'inOT' 		=> date('H:i:s', strtotime($ottimein[0])),
					'outOT' 	=> date('H:i:s', strtotime($ottimeout[0])),
					'remarks'	=> '',
					'name'		=> (count($dtrEntry) > 0 ? $dtrEntry[0]['name'].';' : '').$_SESSION['sessName'],
					'ip'	    => (count($dtrEntry) > 0 ? $dtrEntry[0]['ip'].';' : '').$this->input->ip_address(),
					'editdate'  => (count($dtrEntry) > 0 ? $dtrEntry[0]['editdate'].';' : '').date('Y-m-d h:i:s A'));
				
				if(count($dtrEntry) > 0):
					$this->Attendance_summary_model->edit_dtrTime($arrData, $empid, $ddate);
				else:
					$arrData['dtrDate'] = $ddate;
					$arrData['empNumber'] = $empid;
					$this->Attendance_summary_model->add_dtr($arrData);
				endif;
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
		
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrData=array(
				'dateFiled' 	 => date('Y-m-d'),
				'empNumber'	  	 => $empid,
				'toDateFrom' 	 => $arrPost['dtfrom'],
				'toDateTo' 		 => $arrPost['dtto'],
				'destination' 	 => $arrPost['txtdestination'],
				'purpose' 		 => $arrPost['txtpurpose'],
				'fund' 		 	 => $arrPost['selfund'],
				'transportation' => $arrPost['seltranspo'],
				'perdiem' 		 => isset($arrPost['radperdiem']) ? $arrPost['radperdiem'] : 'N',
				'wmeal' 		 => isset($arrPost['radwmeal']) ? $arrPost['radwmeal'] : 'N');
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
		
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			$arrData=array(
				'toDateFrom' 	 => $arrPost['dtfrom'],
				'toDateTo' 		 => $arrPost['dtto'],
				'destination' 	 => $arrPost['txtdestination'],
				'purpose' 		 => $arrPost['txtpurpose'],
				'fund' 		 	 => $arrPost['selfund'],
				'transportation' => $arrPost['seltranspo'],
				'perdiem' 		 => isset($arrPost['radperdiem']) ? $arrPost['radperdiem'] : 'N',
				'wmeal' 		 => isset($arrPost['radwmeal']) ? $arrPost['radwmeal'] : 'N');
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
		
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			# HR Account
			# First check if dtr entry is exists
			$dtrEntry = $this->Attendance_summary_model->checkEntry($empid, $arrPost['txtdtr_fcdate']);
			$fc_timein = explode(' ',$arrPost['txtdtr_amtimein']);
			if(count($dtrEntry) > 0):
				# Edit Entry
				$arrData=array(
						'inAM' 	   => date('H:i:s', strtotime($fc_timein[0])),
						'dtrDate'  => $arrPost['txtdtr_fcdate'],
						'remarks'  => 'FC',
						'name'	   => $_SESSION['sessName'],
						'ip'	   => $dtrEntry[0]['ip'].';'.$this->input->ip_address(),
						'editdate' => $dtrEntry[0]['editdate'].';'.date('Y-m-d h:i:s A'));
				$this->Attendance_summary_model->edit_flagcrmy($arrData, $empid, $arrPost['txtdtr_fcdate']);
			else:
				# Add Entry
				$arrData=array(
						'empNumber'=> $empid,
						'inAM' 	   => date('H:i:s', strtotime($fc_timein[0])),
						'dtrDate'  => $arrPost['txtdtr_fcdate'],
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



}



