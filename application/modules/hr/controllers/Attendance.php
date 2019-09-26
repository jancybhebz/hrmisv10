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
    	$this->load->helper(array('payroll_helper','dtr_helper'));
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
		$employees = $this->Hr_model->getData('','','all');
		$this->arrData['arrEmployees'] = $employees;

		$status = array_unique(array_column($employees, 'statusOfAppointment'));
		asort($status);
		$this->arrData['arrStatus'] = $status;

		$this->template->load('template/template_view','attendance/attendance_summary/_viewall',$this->arrData);
	}

	public function attendance_summary()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		
		$datefrom = date('Y-m').'-01';
		$dateto = date('Y-m').'-'.cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		
		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $datefrom, $dateto);

		$days_absent = array();
		$vl_left = 0;
		$sl_left = 0;
		$fl_left = 0;
		$offset_balance = 0;
		$total_undertime = 0;
		$total_late = 0;
		$total_ot_wkdays = 0;
		$total_ot_holidays = 0;

		foreach($arremp_dtr as $dtr):
			if($dtr['dtrdate'] <= date('Y-m-d')):
				if((count($dtr['leaves']) + count($dtr['dtr']) + count($dtr['obs']) + count($dtr['tos']) + count($dtr['holiday_name']) < 1) && !in_array($dtr['day'],array('Sat','Sun'))):
				    array_push($days_absent,$dtr['dtrdate']);
				endif;
			endif;

			$total_undertime = $total_undertime + $dtr['utimes'];
			$total_late = $total_late + $dtr['lates'];
			
			# begin checking overtime
			if(in_array($dtr['day'],array('Sat','Sun')) || count($dtr['holiday_name']) > 0):
				# weekends
				if(!empty($dtr['dtr'])):
					if($dtr['dtr']['OT'] == 1):
						$total_ot_holidays = $total_ot_holidays + $dtr['ot'];
					endif;
				endif;
			else:
				# weekdays
				if(!empty($dtr['dtr'])):
					if($dtr['dtr']['OT'] == 1):
						$total_ot_wkdays = $total_ot_wkdays + $dtr['ot'];
					endif;
				endif;
			endif;
			# end checking overtime
		endforeach;

		$ctr_force_leave = 0;
		$ctr_spe_leave = 0;
		$emp_leaves = $this->Leave_model->getleave($empid,$datefrom,$dateto);
		foreach($emp_leaves as $empleave):
			if($empleave['certifyHR'] == 'Y'):
				switch ($empleave['leaveCode']):
					case 'FL':
						$ctr_force_leave = $ctr_force_leave + 1; break;
					case 'PL':
						$ctr_spe_leave = $ctr_spe_leave + 1; break;
				endswitch;
			endif;
		endforeach;

		$force_leave = $this->Leave_model->getleave_data('FL');
		$force_leave = empty($force_leave) ? 0 : $force_leave['numOfDays'];
		$total_force_leave = $force_leave - $ctr_force_leave;

		$spe_leave = $this->Leave_model->getleave_data('PL');
		$spe_leave = empty($spe_leave) ? 0 : $spe_leave['numOfDays'];
		$total_spe_leave = $spe_leave - $ctr_spe_leave;

		$this->arrData['arrattendance'] = array('days_absent' => $days_absent, 'total_undertime' => $total_undertime, 'total_late' => $total_late, 'total_force_leave' => $total_force_leave, 'total_spe_leave' => $total_spe_leave, 'total_ot_wkdays' => $total_ot_wkdays, 'total_ot_holidays' => $total_ot_holidays);
		$this->arrData['arrleaves'] = $this->Leave_model->getLatestBalance($empid);

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr()
	{
		$this->load->model('libraries/Holiday_model');
		// echo '<pre>';
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$datefrom = isset($_GET['datefrom']) ? $_GET['datefrom'] : date('Y-m-').'01';
		$dateto = isset($_GET['dateto']) ? $_GET['dateto'] : date('Y-m-').cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

		$holidays = $this->Holiday_model->getAllHolidates($empid,$datefrom,$dateto);
		$this->arrData['working_days'] = get_workingdays('','',$holidays,$datefrom,$dateto);

		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $datefrom, $dateto);
		$this->arrData['arrLatestBalance'] = $this->Leave_model->getLatestBalance($empid);
		$this->arrData['arremp_dtr'] = $arremp_dtr;
		// print_r($arremp_dtr);
		// die();

		if(in_array(check_module(),array('officer','executive'))):
			$this->arrData['arrdtr'] = $this->Attendance_summary_model->getcurrent_dtr($empid);
		endif;
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	// public function leave_balance()
	// {
	// 	$empid = $this->uri->segment(4);
	// 	$res = $this->Hr_model->getData($empid,'','all');
	// 	$this->arrData['arrData'] = $res[0];
	// 	$this->arrData['arrempleave'] = $this->Leave_model->getleave($empid);
	// 	$month = isset($_GET['month']) ?  $_GET['month'] : date('n');
	// 	$yr = isset($_GET['yr']) ?  $_GET['yr'] : date('n');
	// 	$this->arrData['arrLeaves'] = $this->Leave_model->getleave_balance($empid, $month,$yr);
	// 	$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	// }

	public function leave_balance_update()
	{
		$this->load->model(array('finance/Dtr_model'));
		
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$month = isset($_GET['month']) ? $_GET['month'] : date('m');
		$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');

		$arrLatestBalance = $this->Leave_model->getleave_balance($empid, 0,0);

		# Leave Balance Info
		$datefrom = date('Y-m').'-01';
		$dateto = date('Y-m').'-'.cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		if(count($arrLatestBalance) > 0):
			if($arrLatestBalance[0]['periodMonth'] < 12):
				$periodYear = $arrLatestBalance[0]['periodYear'];
				$periodMonth = sprintf('%02d',($arrLatestBalance[0]['periodMonth']+1));				
			else:
				$periodMonth = $arrLatestBalance[0]['periodYear'] + 1;
				$periodYear = '01';
			endif;
			$datefrom = $periodYear.'-'.$periodMonth.'-01';
			$dateto = $periodYear.'-'.$periodMonth.'-'.cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		endif;

		# BEGIN DTR
		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $datefrom, $dateto);

		$days_absent = array();
		$days_awol = array();
		$vl_left = 0;
		$sl_left = 0;
		$fl_left = 0;
		$offset_balance = 0;
		$total_undertime = 0;
		$total_late = 0;
		$total_ot_wkdays = 0;
		$total_ot_holidays = 0;
		$total_hrs_cto = 0;
		$emp_hvl = 0;
		$emp_hsl = 0;
		$dates_ut_lates = 0;

		$arr_subs_allowance = array();
		$arr_work_hrs = array();

		$total_perdiem = 0;
		$total_wmeal = 0;

		foreach($arremp_dtr as $dtr):
			if($dtr['dtrdate'] <= date('Y-m-d')):
				if((count($dtr['dtr']) + count($dtr['obs']) + count($dtr['tos']) + count($dtr['holiday_name']) < 1) && !in_array($dtr['day'],array('Sat','Sun'))):
				    if(count($dtr['leaves']) > 0):
				    	array_push($days_absent,$dtr['dtrdate']);
				    else:
				    	array_push($days_awol,$dtr['dtrdate']);
				    endif;
				endif;
			endif;

			# begin check meal for ob
			if(count($dtr['obs']) > 0):
				# weekends
				if(in_array($dtr['day'],array('Sat','Sun'))):
					# check if approve CTO
					$dtr_day_data = $this->Dtr_model->getData($empid,0,0,$dtr['dtrdate'],$dtr['dtrdate']);
					if(count($dtr_day_data) > 0):
						if($dtr_day_data[0]['OT'] == 1):
							$total_wmeal = $total_wmeal + count(array_filter(array_column($dtr['obs'],'obMeal'), function ($n) { return $n == 'Y'; }));
						endif;
					endif;
				else:
					# weekdays
					foreach($dtr['obs'] as $ob):
						if($ob['obMeal'] == 'Y'):
							$total_wmeal = $total_wmeal + 1;
						endif;
					endforeach;
				endif;
			endif;
			# end check meal for ob

			# begin check meal and perdiem for to
			if(count($dtr['tos']) > 0):
				# weekends
				if(in_array($dtr['day'],array('Sat','Sun'))):
					# check if approve CTO
					$dtr_day_data = $this->Dtr_model->getData($empid,0,0,$dtr['dtrdate'],$dtr['dtrdate']);
					if(count($dtr_day_data) > 0):
						if($dtr_day_data[0]['OT'] == 1):
							$total_wmeal = $total_wmeal + count(array_filter(array_column($dtr['tos'],'wmeal'), function ($n) { return $n == 'Y'; }));
							$total_perdiem = $total_perdiem + count(array_filter(array_column($dtr['tos'],'perdiem'), function ($n) { return $n == 'Y'; }));
						endif;
					endif;
				else:
					# weekdays
					foreach($dtr['tos'] as $to):
						if($to['wmeal'] == 'Y'):
							$total_wmeal = $total_wmeal + 1;
						endif;
						if($to['perdiem'] == 'Y'):
							$total_perdiem = $total_perdiem + 1;
						endif;
					endforeach;
				endif;
			endif;
			# end check meal and perdiem for to

			$total_undertime = $total_undertime + $dtr['utimes'];
			$total_late = $total_late + $dtr['lates'];

			if($dtr['utimes'] + $dtr['lates'] > 0):
				$dates_ut_lates = $dates_ut_lates + 1; 
			endif;
			
			# begin checking cto
			if(!empty($dtr['dtr'])):
				if(strtoupper($dtr['dtr']['remarks']) == 'CL'):
					if($dtr['work_hrs'] > required_hrs($empid)):
						$total_hrs_cto = $total_hrs_cto + required_hrs($empid);
					else:
						$total_hrs_cto = $total_hrs_cto + $dtr['work_hrs'];
					endif;
				endif;
			endif;
			# end checking cto

			# begin checking overtime
			if(in_array($dtr['day'],array('Sat','Sun')) || count($dtr['holiday_name']) > 0):
				# weekends
				if(!empty($dtr['dtr'])):
					if($dtr['dtr']['OT'] == 1):
						$total_ot_holidays = $total_ot_holidays + $dtr['ot'];
					endif;
				endif;
			else:
				# weekdays
				if(!empty($dtr['dtr'])):
					# subsistence allowance
					array_push($arr_work_hrs,$dtr['work_hrs']);

					if($dtr['dtr']['OT'] == 1):
						$total_ot_wkdays = $total_ot_wkdays + $dtr['ot'];
					endif;
					# check half - leave
					if($dtr['dtr']['remarks'] == 'HSL'):
						$emp_hsl = $emp_hsl + 1;
					endif;
					if($dtr['dtr']['remarks'] == 'VSL'):
						$emp_hvl = $emp_hvl + 1;
					endif;
				endif;
			endif;
			# end checking overtime
			// print_r($dtr);
			// echo '<hr>';
		endforeach;
		// die();
		$arr_subs_allowance = compute_subsistence_allowance($arr_work_hrs);
		
		$ctr_force_leave = 0;
		$ctr_spe_leave = 0;
		$emp_leaves = $this->Leave_model->getleave($empid,$datefrom,$dateto);
		foreach($emp_leaves as $empleave):
			if($empleave['certifyHR'] == 'Y'):
				switch ($empleave['leaveCode']):
					case 'FL':
						$ctr_force_leave = $ctr_force_leave + 1; break;
					case 'PL':
						$ctr_spe_leave = $ctr_spe_leave + 1; break;
				endswitch;
			endif;
		endforeach;

		$force_leave = $this->Leave_model->getleave_data('FL');
		$force_leave = empty($force_leave) ? 0 : $force_leave['numOfDays'];
		$total_force_leave = $force_leave - $ctr_force_leave;

		$spe_leave = $this->Leave_model->getleave_data('PL');
		$spe_leave = empty($spe_leave) ? 0 : $spe_leave['numOfDays'];
		$total_spe_leave = $spe_leave - $ctr_spe_leave;
		# END DTR

		$arrLeaveBalance = array();
		$arrLeaveBalance = $this->Leave_model->getleave_balance($empid, $month,$yr);

		foreach($arrLeaveBalance as $key=>$lb):
			$dfrom = implode('-',array($lb['periodYear'],sprintf('%02d',$lb['periodMonth']),'01'));
			$dto   = implode('-',array($lb['periodYear'],sprintf('%02d',$lb['periodMonth']),cal_days_in_month(CAL_GREGORIAN,$lb['periodMonth'],$lb['periodYear'])));
			$arrLeaveBalance[$key]['filed_stl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'STL');
			$arrLeaveBalance[$key]['filed_mtl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'MTL');
			$arrLeaveBalance[$key]['filed_ptl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'PTL');
			$arrLeaveBalance[$key]['filed_fl']  = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'FL');
			$arrLeaveBalance[$key]['filed_spl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'PL');

			$arrLeaveBalance[$key]['off_bal_w'] = seconds_to_time($lb['off_bal']);
			$arrLeaveBalance[$key]['off_gain_w'] = seconds_to_time($lb['off_gain']);
			$arrLeaveBalance[$key]['off_used_w'] = seconds_to_time($lb['off_used']);
			$arrLeaveBalance[$key]['process_by'] = employee_name($lb['processBy']);

		endforeach;

		$leave_earned = $this->Leave_model->leave_earned(count($days_absent));
		$ut_late = $this->Leave_model->ltut_table_equiv($total_undertime + $total_late);
		
		$vl_abswpay = 0;
		$vl_abswopay = 0;
		
		$curr_vl = 0;
		$emp_vl = 0;
		$trut_wopay = 0;
		$vl_wopay = 0;
		if(count($arrLatestBalance) > 0):
			# Vacation Leave
			$curr_vl = $arrLatestBalance[0]['vlBalance'] + $leave_earned;

			$emp_vl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'VL');
			$filed_vl = $emp_vl + $emp_hvl + $emp_hsl;

			$deduct_vl = $this->Leave_model->ltut_table_equiv($total_undertime + $total_late);
			$total_deduct_vl = count($days_absent) + $filed_vl + $deduct_vl;

			if($total_deduct_vl > $curr_vl):
				$vl_abswopay = $total_deduct_vl - $curr_vl;
				$vl_abswpay = $total_deduct_vl - $vl_abswopay;
				$curr_vl = 0;
				$trut_wopay = $deduct_vl;
				$vl_wopay = count($days_absent) + $filed_vl;
			else:
				$curr_vl = $curr_vl - $vl_abswpay;
				$vl_abswpay = $total_deduct_vl;
			endif;

			$filed_sl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'SL');
			$curr_sl = $arrLatestBalance[0]['slBalance'] + $leave_earned;

			$exc_sl = 0;
			$sl_abswopay = 0;
			if($curr_sl < $filed_sl):
				$exc_sl = $filed_sl - $curr_sl;
				if($curr_vl > $exc_sl):
					$vl_abswpay = $vl_abswpay + $exc_sl;
					$curr_vl = $curr_vl - $exc_sl;
				else:
					$sl_abswopay = $exc_sl;
				endif;
			else:
				$curr_sl = $curr_sl - $filed_sl;
			endif;

			$filed_stl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'STL');
			$filed_mtl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'MTL');
			$filed_ptl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'PTL');
			$filed_fl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'FL');
			$filed_spl = $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'PL');

			$arrLatestBalance = array('lb' => $arrLatestBalance[0], 'vl_abswpay' => $vl_abswpay, 'vl_abswopay' => $vl_abswopay, 'sl_abswopay' => $sl_abswopay, 'filed_vl' => $filed_vl, 'filed_sl' => $filed_sl, 'filed_fl' => $filed_fl, 'filed_stl' => $filed_stl,'filed_mtl' => $filed_mtl,'filed_ptl' => $filed_ptl,'filed_spl' => $filed_spl, 'arr_subs_allowance' => $arr_subs_allowance, 'curr_sl' => $curr_sl, 'curr_vl' => $curr_vl, 'off_bal' => seconds_to_time($arrLatestBalance[0]['off_bal']), 'deduct_vl' => $deduct_vl, 'trut_wopay' => $trut_wopay, 'vl_wopay' => $vl_wopay);
		else:
			# NO LEAVE BALANCE
		endif;

		$this->arrData['arrLeaveBalance'] = $arrLeaveBalance;
		$this->arrData['arrLatestBalance'] = $arrLatestBalance;

		$total_late_ut = $total_late + $total_undertime;
		$total_late_ut = $total_late_ut > 0 ? date('H:i', mktime(0, $total_late_ut)) : '00:00';
		$holidays = $this->Holiday_model->getAllHolidates($empid,$datefrom,$dateto);

		$arrDataLeaves = $this->Leave_model->getleave($empid,$datefrom,$dateto);
		$arrLeaves = array();
		foreach($arrDataLeaves as $data_leave):
			foreach(dateRange($data_leave['leaveFrom'],$data_leave['leaveTo']) as $leave_date):
				if(!(in_array($leave_date,$holidays) || in_array(date('D',strtotime($leave_date)),array('Sat','Sun')))):
					$arrLeaves[] = array_merge($data_leave,array('leavedate' => $leave_date));
				endif;
			endforeach;
		endforeach;

		$total_ot = $total_ot_wkdays + $total_ot_holidays;
		$this->arrData['arrAttendance_summary'] = array('dates_ut_lates' => $dates_ut_lates, 'total_late_ut' => $total_late_ut,'days_awol' => count($days_awol),'days_absent' => count($days_absent), 'days_leave' => count($arrLeaves), 'working_days' => count(get_workingdays('','',$holidays,$datefrom,$dateto)), 'total_wmeal' => $total_wmeal, 'total_perdiem' => $total_perdiem, 'off_gain' => seconds_to_time($total_ot), 'total_hrs_cto' => seconds_to_time($total_hrs_cto));
		// die();
		$this->arrData['employeedata'] = $this->Hr_model->getEmployeePersonal($empid);
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function leave_balance_save()
	{
		$empid = $this->uri->segment(4);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$leave_data = json_decode($arrPost['txtleave_data'],true);
			$arrLatestBalance = $leave_data['arrLatestBalance'];

			$arrData = array('empNumber'	=> $empid,
							 'trut_totalminutes' => $arrPost['txtlate_ut_hhmm'],
							 'periodMonth'	=> $arrPost['txtperiodMonth'],
							 'periodYear'	=> $arrPost['txtperiodYr'],
							 'vlEarned'		=> $_ENV['leave_earned'],
							 'vlBalance'	=> $arrPost['txtperiod_vl'],
							 'vlPreBalance'	=> $arrPost['txtprev_vlbal'],
							 'vlAbsUndWPay'	=> $arrPost['txtauwp_vl'],
							 'vlAbsUndWoPay'=> $arrPost['txtauwop_vl'],
							 'slEarned'		=> $_ENV['leave_earned'],
							 'slBalance'	=> $arrPost['txtperiod_sl'],
							 'slPreBalance'	=> $arrPost['txtprev_slbal'],
							 'slAbsUndWPay'	=> $arrPost['txtauwp_sl'],
							 'slAbsUndWoPay'=> 0,
							 'nodays_awol'	=>$arrPost['txtdays_awol'],
							 'nodays_present'=>$arrPost['txtdays_present'],
							 'nodays_absent'=>$arrPost['txtdays_absent'],
							 'off_bal' 		=> breakhhmm($arrPost['txtbalance']),
							 'off_gain' 	=> breakhhmm($arrPost['txtgain']),
							 'off_used' 	=> breakhhmm($arrPost['txtused']),
							 'flBalance' 	=> $arrLatestBalance['lb']['flBalance'],
							 'flPreBalance' => $arrLatestBalance['lb']['flPreBalance'],
							 'plBalance' 	=> $arrLatestBalance['lb']['plBalance'],
							 'plPreBalance' => $arrLatestBalance['lb']['plPreBalance'],
							 'mtlBalance' 	=> $arrLatestBalance['lb']['mtlBalance'],
							 'mtlPreBalance'=> $arrLatestBalance['lb']['mtlPreBalance'],
							 'ptlBalance' 	=> $arrLatestBalance['lb']['ptlBalance'],
							 'ptlPreBalance'=> $arrLatestBalance['lb']['ptlPreBalance'],
							 'stlBalance' 	=> $arrLatestBalance['lb']['stlBalance'],
							 'stlPreBalance'=> $arrLatestBalance['lb']['stlPreBalance'],
							 'numOfPerdiem' => $arrPost['txtamt_training'],
							 'ctr_8h' 		=> $arrPost['txtsubs_8hrs'],
							 'ctr_6h' 		=> $arrPost['txtsubs_6hrs'],
							 'ctr_5h' 		=> $arrPost['txtsubs_5hrs'],
							 'ctr_4h' 		=> $arrPost['txtsubs_4hrs'],
							 'ctr_wmeal' 	=> $arrPost['txtwith_meal'],
							 'ctr_diem' 	=> $arrPost['txtamt_training']);

			$this->Leave_model->addLeaveBalance($arrData);
			$this->session->set_flashdata('strSuccessMsg','Leave balance updated successfully.');
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month='.ltrim($_GET['month'], '0').'&yr='.$_GET['yr']);
		endif;
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
							 'off_bal' 			 => breakhhmm($arrPost['txtbalance']),
							 'off_gain' 		 => breakhhmm($arrPost['txtgain']),
							 'off_used' 		 => breakhhmm($arrPost['txtused']),
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
			redirect('hr/attendance_summary/leave_balance_update/'.$empid.'?month='.$_GET['month'].'&yr='.$_GET['yr']);
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
		$arrlatest_balance = $this->Leave_model->getLatestBalance($empid);

		// $arrLeaves = $this->Leave_model->getleave($empid);
		
		$total_monetize = $this->Leave_monetization_model->getemp_total_monetized($empid, date('n'), date('Y'));
		$sl_monetized = '0.0000';
		$vl_monetized = '0.0000';
		$datefrom = '';
		$dateto = '';
		if(count($arrlatest_balance) > 0):
			if(count($total_monetize) > 0):
				$sl_monetized = $arrlatest_balance['slBalance'] - $total_monetize['slmonetize'];
				$vl_monetized = $arrlatest_balance['vlBalance'] - $total_monetize['vlmonetize'];
			else:
				$sl_monetized = $arrlatest_balance['slBalance'];
				$vl_monetized = $arrlatest_balance['vlBalance'];
			endif;

			if($arrlatest_balance['periodMonth'] < 12):
				$periodYear = $arrlatest_balance['periodYear'];
				$periodMonth = sprintf('%02d',($arrlatest_balance['periodMonth']+1));				
			else:
				$periodMonth = $arrlatest_balance['periodYear'] + 1;
				$periodYear = '01';
			endif;
			$datefrom = $periodYear.'-'.$periodMonth.'-01';
			$dateto = $periodYear.'-'.$periodMonth.'-'.cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
		endif;

		$approved_vl = count($arrlatest_balance) > 0 ? $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'VL') : 0;
		$approved_sl = count($arrlatest_balance) > 0 ? $this->Leave_model->approved_leave($empid,$datefrom,$dateto,'SL') : 0;
		
		$this->arrData['total_monetize'] = $total_monetize;
		$this->arrData['sl_monetized'] = $sl_monetized;
		$this->arrData['vl_monetized'] = $vl_monetized;
		$this->arrData['sl_projected'] = $sl_monetized - $approved_sl;
		$this->arrData['vl_projected'] = $vl_monetized - $approved_vl;
		$this->arrData['arrlatest_balance'] = $arrlatest_balance;
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
				'dateFrom'	=> $arrPost['bs_sched_from'],
				'dateTo'	=> $arrPost['bs_sched_to']);
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
				'dateFrom'	=> $arrPost['bs_sched_from'],
				'dateTo'	=> $arrPost['bs_sched_to']);
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
		$this->load->model('libraries/Holiday_model');

		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$datefrom = isset($_GET['datefrom']) ? $_GET['datefrom'] : date('Y-m-').'01';
		$dateto = isset($_GET['dateto']) ? $_GET['dateto'] : date('Y-m-').cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

		$holidays = $this->Holiday_model->getAllHolidates($empid,$datefrom,$dateto);
		$this->arrData['working_days'] = get_workingdays('','',$holidays,$datefrom,$dateto);

		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $datefrom, $dateto);
		
		$this->arrData['arremp_dtr'] = $arremp_dtr;

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function dtr_edit()
	{
		// echo '<pre>';
		$arrPost = $this->input->post();	
		$dtr_json = json_decode($arrPost['txtjson'], true);

		foreach($dtr_json as $dtr):
			# check if row
			if(count($dtr) > 0):
				# check if body
				if(count($dtr['tr']) > 6):
					$dtr_details = json_decode($dtr['tr'][10]['td'], true);
					$dtrid = $dtr_details[1];
					$arrData = array('empNumber'	=> $arrPost['empnum'],
									 'dtrDate'		=> $dtr_details[0],
									 'inAM' 		=> $dtr['tr'][2]['td'] != '00:00' ? date('H:i:s',strtotime($dtr['tr'][2]['td'])) : '00:00:00',
									 'outAM' 		=> $dtr['tr'][3]['td'] != '00:00' ? date('H:i:s',strtotime($dtr['tr'][3]['td'])) : '00:00:00',
									 'inPM' 		=> $dtr['tr'][4]['td'] != '00:00' ? date('H:i:s',strtotime($dtr['tr'][4]['td'].' PM')) : '00:00:00',
									 'outPM' 		=> $dtr['tr'][5]['td'] != '00:00' ? date('H:i:s',strtotime($dtr['tr'][5]['td'].' PM')) : '00:00:00',
									 'inOT' 		=> $dtr['tr'][6]['td'] != '00:00' ? date('H:i:s',strtotime($dtr['tr'][6]['td'].' PM')) : '00:00:00',
									 'outOT' 		=> $dtr['tr'][7]['td'] != '00:00' ? date('H:i:s',strtotime($dtr['tr'][7]['td'].' PM')) : '00:00:00',
									 'name' 		=> $dtr_details[2].';'.$_SESSION['sessName'],
									 'ip'			=> $dtr_details[3].';'.$this->input->ip_address(),
									 'editdate'		=> $dtr_details[4].';'.date('Y-m-d h:i:s A'),
									 'oldValue' 	=> $dtr_details[5]);
					# check timein validation
					$valid_time = 0;
					foreach(array($arrData['inAM'],$arrData['outAM'],$arrData['inPM'],$arrData['outPM'],$arrData['inOT'],$arrData['outOT']) as $vtime):
						// echo '<br>'.$vtime;
						if($vtime!='00:00:00'):
							$valid_time = $valid_time + 1;
						endif;
					endforeach;
					// echo $valid_time;
					if($dtrid != ''):
						$this->Attendance_summary_model->edit_dtr($arrData, $dtrid);
					else:
						if($valid_time > 0){
							$this->Attendance_summary_model->add_dtr($arrData);
						}
					endif;
					// echo '<hr>';
				endif;
			endif;
			
		endforeach;
		die();
		$this->session->set_flashdata('strSuccessMsg','DTR updated successfully.');
		redirect('hr/attendance_summary/dtr/edit_mode/'.$arrPost['empnum'].'?datefrom='.$arrPost['datefrom'].'&dateto='.$arrPost['dateto']);
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

		if(isset($_GET['month'])):
			if($_GET['month'] == 'all'){
				$datefrom = curryr().'-01-01';
				$dateto = date('Y-m-').cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
			}else{
				$datefrom = curryr().'-'.currmo().'-01';
				$dateto = curryr().'-'.currmo().'-'.cal_days_in_month(CAL_GREGORIAN, ltrim(currmo(), '0'), curryr()-1);
			}
		else:
			$datefrom = date('Y-m').'-01';
			$dateto = date('Y-m-').cal_days_in_month(CAL_GREGORIAN, date('n'), date('Y'));
		endif;
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->arrData['arrLeaves'] = $this->Leave_model->getleave($empid,$datefrom,$dateto);
		$arrLeaveBalance = $this->Leave_model->getLatestBalance($empid);
		
		$dfrom = implode('-',array($arrLeaveBalance['periodYear'],sprintf('%02d',$arrLeaveBalance['periodMonth']),'01'));
		$dto   = implode('-',array($arrLeaveBalance['periodYear'],sprintf('%02d',$arrLeaveBalance['periodMonth']),cal_days_in_month(CAL_GREGORIAN,$arrLeaveBalance['periodMonth'],$arrLeaveBalance['periodYear'])));
		$arrLeaveBalance['filed_vl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'VL');
		$arrLeaveBalance['filed_sl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'SL');
		$arrLeaveBalance['filed_stl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'STL');
		$arrLeaveBalance['filed_mtl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'MTL');
		$arrLeaveBalance['filed_ptl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'PTL');
		$arrLeaveBalance['filed_fl']  = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'FL');
		$arrLeaveBalance['filed_spl'] = $this->Leave_model->approved_leave($empid,$dfrom,$dto,'PL');

		$this->arrData['arrLeaveBalance'] = $arrLeaveBalance;
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
		$this->load->model(array('employee/Compensatory_leave_model','libraries/Attendance_scheme_model'));
		$att_scheme = $this->Attendance_scheme_model->getAttendanceScheme($empid);
		$total_ot = $this->Compensatory_leave_model->get_all_overtime($empid);
		
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
			
			$arrData_cto=array(
				'empNumber' => $empid,
				'cto_date'  => $arrPost['txtcompen_date'],
				'cto_timefrom'=> $arrPost['txtcl_am_timefrom'],
				'outAM'		=> $arrPost['txtcl_am_timeto'],
				'inPM' 		=> $arrPost['txtcl_pm_timefrom'],
				'outPM' 	=> $arrPost['txtcl_pm_timeto'],
				'remarks'	=> 'CL',
				'name'		=> (count($dtrEntry) > 0 ? $dtrEntry[0]['name'].';' : '').$_SESSION['sessName'],
				'ip'	    => (count($dtrEntry) > 0 ? $dtrEntry[0]['ip'].';' : '').$this->input->ip_address(),
				'editdate'  => (count($dtrEntry) > 0 ? $dtrEntry[0]['editdate'].';' : '').date('Y-m-d h:i:s A'));

			$total_hrs = $this->Attendance_summary_model->compute_working_hours($att_scheme,$arrData);
			if($total_ot >= $total_hrs):
				if(count($dtrEntry) > 0):
					$this->Attendance_summary_model->edit_comp_leave($arrData, $empid, $arrPost['txtcompen_date']);
					$this->Compensatory_leave_model->add_cto($arrData_cto);
				else:
					$arrData['dtrDate'] = $arrPost['txtcompen_date'];
					$this->Attendance_summary_model->add_dtr($arrData);
				endif;
				$this->session->set_flashdata('strSuccessMsg','Compensatory Leave added successfully.<br>DTR updated successfully.');
				redirect('hr/attendance_summary/dtr/compensatory_leave/'.$this->uri->segment(5));
			else:
				$this->session->set_flashdata('strErrorMsg','Time is greater than CTO.');
			endif;
		endif;
		$this->arrData['total_ot'] = $total_ot;
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
				
				$arrData=array(
					'inAM' 		=> $arrPost['txtdtr_amtimein'] == '' ? NULL : date('H:i',strtotime($arrPost['txtdtr_amtimein'])),
					'outAM'		=> $arrPost['txtdtr_amtimeout'] == '' ? NULL : date('H:i',strtotime($arrPost['txtdtr_amtimeout'])),
					'inPM' 		=> $arrPost['txtdtr_pmtimein'] == '' ? NULL : date('H:i',strtotime($arrPost['txtdtr_pmtimein'])),
					'outPM' 	=> $arrPost['txtdtr_pmtimeout'] == '' ? NULL : date('H:i',strtotime($arrPost['txtdtr_pmtimeout'])),
					'inOT' 		=> $arrPost['txtdtr_ottimein'] == '' ? NULL : date('H:i',strtotime($arrPost['txtdtr_ottimein'])),
					'outOT' 	=> $arrPost['txtdtr_ottimeout'] == '' ? NULL : date('H:i',strtotime($arrPost['txtdtr_ottimeout'])),
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
		// echo '<pre>';
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$datefrom = isset($_GET['datefrom']) ? $_GET['datefrom'] : date('Y-m-').'01';
		$dateto = isset($_GET['dateto']) ? $_GET['dateto'] : date('Y-m-').cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));

		$arremp_dtr = $this->Attendance_summary_model->getemp_dtr($empid, $datefrom, $dateto);
		$arrots = array();
		foreach($arremp_dtr as $dtr):
			if($dtr['ot'] > 0):
				array_push($arrots,$dtr);
			endif;
			// print_r($dtr);
			// echo '<hr>';
		endforeach;
		$this->arrData['arrots'] = $arrots;
		

		// die();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);
	}

	public function qr_code()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		if(check_module() == 'officer'):
			$this->arrData['arrdtr'] = $this->Attendance_summary_model->getcurrent_dtr($empid);
		endif;
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



