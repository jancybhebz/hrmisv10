<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dtr_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->table = 'tblEmpDTR';
	}
	
	function getData($empid,$yr,$mon,$sdate='',$edate='')
	{
		if($sdate != '' && $edate != ''){
			$this->db->where("(dtrDate >= '".$sdate."' and dtrDate <= '".$edate."')");
		}else{
			$this->db->where("dtrDate like '".$yr."-".$mon."%'");
		}
		$this->db->where("empNumber",$empid);
		$this->db->order_by("dtrDate", "asc");
		return $this->db->get_where($this->table)->result_array();
	}

	function getHoliday($strday='',$all=0,$sdate='',$edate='')
	{
		$this->db->join('tblHoliday', 'tblHoliday.holidayCode = tblHolidayYear.holidayCode', 'left');
		if($sdate != '' && $edate != ''){
			$this->db->where("(holidayDate >= '".$sdate."' and holidayDate <= '".$edate."')");
		}else{
			$this->db->where("tblHolidayYear.holidayDate like '%".$strday."%'");
		}
		$res = $this->db->get_where('tblHolidayYear')->result_array();
		if($all):
			return $res;
		else:
			return count($res) > 0 ? $res[0] : null; 
		endif;
	}

	function getLocalHoliday($empid)
	{
		$this->db->select("tblLocalHoliday.holidayCode,CONCAT(holidayYear,'-',holidayMonth,'-',holidayDay) as holidate");
		$this->db->join('tblLocalHoliday', 'tblLocalHoliday.holidayCode = tblEmpLocalHoliday.holidayCode', 'left');
		$this->db->where("tblEmpLocalHoliday.empNumber like '".$empid."'");
		$res = $this->db->get_where('tblEmpLocalHoliday')->result_array();
		return $res; 
	}

	function getEmpOB($empid, $year, $month)
	{
		$this->db->where("empNumber like '".$empid."'");
		$this->db->where("(obDateFrom like '".$year."-".$month."%' OR obDateTo like '".$year."-".$month."%')");
		$res = $this->db->get_where('tblEmpOB')->result_array();
		return $res; 
	}

	function getemp_obdates($empid,$datefrom,$dateto,$dateonly=0)
	{
		$this->load->model('employee/Official_business_model');
		# OB
		$ob_dates = array();
		$arremp_ob = array();
		$empob = $this->Official_business_model->getEmployeeOB($empid,$datefrom,$dateto);
		foreach($empob as $ob):
			$obdate = $ob['obDateFrom'];
			$schedto = $ob['obDateTo'];
			while (strtotime($obdate) <= strtotime($schedto))
			{
				if($dateonly == 0):
					$obdatekey = array_search($obdate, array_column($arremp_ob, 'date'));
					$arrobdata = array( 'obid'			=> $ob['obID'],
										'dateFiled'		=> $ob['dateFiled'],
										'date'			=> $obdate,
										'obTimeFrom'    => $ob['obTimeFrom'],
										'obTimeTo'    	=> $ob['obTimeTo'],
										'obPlace'   	=> $ob['obPlace'],
										'obMeal'  		=> $ob['obMeal'],
										'purpose'    	=> $ob['purpose'],
										'official' 		=> $ob['official'],
										'approveRequest'=> $ob['approveRequest'],
										'approveChief'  => $ob['approveChief'],
										'approveHR'  	=> $ob['approveHR']);
					if(is_numeric($obdatekey)):
						$arremp_ob[$obdatekey] = $arrobdata;
					else:
						$arremp_ob[] = $arrobdata;
					endif;
				endif;

				if($obdate >= $datefrom && $obdate <= $dateto && !in_array(date('D',strtotime($obdate)), array('Sat','Sun'))):
					array_push($ob_dates,$obdate);
				endif;
				
				$obdate = date('Y-m-d', strtotime($obdate . ' +1 day'));
			}
		endforeach;
		return $dateonly == 1 ? array_unique($ob_dates) : $arremp_ob;
	}

	function getemp_todates($empid,$datefrom,$dateto,$dateonly=0)
	{
		$this->load->model('employee/Travel_order_model');
		# Travel Order
		$to_dates = array();
		$arremp_to = array();
		$empto = $this->Travel_order_model->getEmployeeTO($empid,$datefrom,$dateto);
		foreach($empto as $to):
			$todate = $to['toDateFrom'];
			$to_to = $to['toDateTo'];
			while (strtotime($todate) <= strtotime($to_to))
			{
				$todatekey = array_search($todate, array_column($arremp_to, 'date'));
				$arrtodata = array( 'toID'			=> $to['toID'],
									'dateFiled'		=> $to['dateFiled'],
									'date'			=> $todate,
									'toDateFrom'    => $to['toDateFrom'],
									'toDateTo'    	=> $to['toDateTo'],
									'destination'   => $to['destination'],
									'purpose'  		=> $to['purpose'],
									'fund'    		=> $to['fund'],
									'transportation'=> $to['transportation'],
									'perdiem'		=> $to['perdiem'],
									'wmeal'  		=> $to['wmeal']);
				if(is_numeric($todatekey)):
					$arremp_to[$todatekey] = $arrtodata;
				else:
					$arremp_to[] = $arrtodata;
				endif;

				if($todate >= $datefrom && $todate <= $dateto && !in_array(date('D',strtotime($todate)), array('Sat','Sun'))):
					array_push($to_dates,$todate);
				endif;
				$todate = date('Y-m-d', strtotime($todate . ' +1 day'));
			}
		endforeach;

		return $dateonly == 1 ? array_unique($to_dates) : $arremp_to;
	}

	//covert time format to total minutes
	function toMinutes($time)
	{
		$t_time = explode(":",$time);
		return  ($t_time[0] * 60) + $t_time[1];
	}

	function computeLate($scheme, $dtrData)
	{
		$total_late = '00:00';

		if($scheme['fixMonday'] == 'Y' && date('D', strtotime($dtrData['dtrDate'])) == 'Mon'):
			$am_systimein = fixTime($_ENV['FLAGCRMNY'],'am');
		else:
			$am_systimein = fixTime($scheme['amTimeinTo'],'am');
		endif;

		$am_timein = strdate($dtrData['inAM']);
		$am_late = $this->time_subtract(fixTime($am_systimein,'AM'), fixTime($am_timein,'AM'), $scheme['gpLeaveCredits'], $scheme['gracePeriod']);

		# Afternoon
		$pm_timein = strdate($dtrData['inPM']);
		$pm_systimein = strdate($scheme['nnTimeinTo']);
		$pm_late = $this->time_subtract(fixTime($pm_systimein,'PM'), fixTime($pm_timein,'PM'));

		$total_late = $this->time_add($am_late, $pm_late);

		return $this->toMinutes($total_late);
	}

	function computeUndertime($scheme, $dtrData, $late_am)
	{
		#  UnderTime
		# Attendance Scheme
		$am_timein_from = date('H:i:s', strtotime($scheme['amTimeinFrom'].' AM'));
		// $am_timein_to = date('H:i:s', strtotime($scheme['amTimeinTo'].' AM'));
		$nn_timein_from = date('H:i:s', strtotime($scheme['nnTimeoutFrom'].' PM'));
		$nn_timein_to = date('H:i:s', strtotime($scheme['nnTimeoutTo'].' PM'));
		$pm_timeout_from = date('H:i:s', strtotime($scheme['pmTimeoutFrom'].' PM'));
		// $pm_timeout_to = date('H:i:s', strtotime($scheme['pmTimeoutTo'].' PM'));

		if($scheme['fixMonday'] == 'Y' && date('D', strtotime($dtrData['dtrDate'])) == 'Mon'):
			$am_timein_to = date('H:i:s', strtotime($_ENV['FLAGCRMNY'].' AM'));
			$pm_timeout_to = date("H:i:s", strtotime('+540 minutes', strtotime($_ENV['FLAGCRMNY'])));
		else:
			$am_timein_to = date('H:i:s', strtotime($scheme['amTimeinTo'].' AM'));
			$pm_timeout_to = date('H:i:s', strtotime($scheme['pmTimeoutTo'].' PM'));
		endif;

		$undertime_am = 0;
		$undertime_pm = 0;

		# morning
		$am_time_in = date('H:i:s', strtotime($dtrData['inAM'].' AM'));
		if($dtrData['outAM'] >= '12:00:00'):
			$am_time_out = date('H:i:s', strtotime($dtrData['outAM'].' PM'));
		else:
			$am_time_out = date('H:i:s', strtotime($dtrData['outAM'].' AM'));
		endif;

		# afternoon
		$pm_time_in = date('H:i:s', strtotime($dtrData['inPM'].' PM'));
		$pm_time_out = date('H:i:s', strtotime($dtrData['outPM'].' PM'));
		## Get employee's expected time out first to check if employee gets undertime
		/* if employee has AM time in*/
		if($am_time_in != '00:00:00'):
			## AM UnderTime
			if($am_time_out <= $nn_timein_from):
				$undertime_am = toMinutes($nn_timein_from) - toMinutes($am_time_out);
			endif;

			## PM UnderTime
			/* if employee's timein is earlier than att scheme amTimeinFrom, set the timein to the amTimeinFrom */
			if($am_time_in < $am_timein_from):
				$expected_timein = $am_timein_from;
			else:
				$expected_timein = $am_time_in;
			endif;
			/* if employee is late, the expected time out will be the pmTimeoutTo */
			if($late_am > 0):
				$expected_timeout = $pm_timeout_to;
			else:
				$mins_timein = toMinutes($expected_timein) - toMinutes($am_timein_from);
				$expected_timeout = date("H:i:s", strtotime('+'.$mins_timein.' minutes', strtotime($pm_timeout_from)));
			endif;
		else:
			# No AM Undertime
			/* if employee has no AM time in; expected time out is pmTimeoutTo */
			$expected_timeout = $pm_timeout_to;
		endif;
		## PM UnderTime
		# check undertime using expected_timeout
		/* Check if employee has PM timein */
		if($pm_time_in != '00:00:00'):
			if($expected_timeout > $pm_time_out):
				$undertime_pm = toMinutes($expected_timeout) - toMinutes($pm_time_out);
			endif;
		else:
			$undertime_pm = toMinutes($expected_timeout) - toMinutes($nn_timein_to);
		endif;

		$total_undertime = $undertime_am + $undertime_pm;
		return $total_undertime;

	}

	function computeOvertime($scheme, $dtrData, $total_late, $systimeout, $total_undertime, $exemp)
	{
		$systimeout = strdate(fixTime($systimeout,'pm'));
		// echo '<br>exemp '.$exemp.'<br>';
		// print_r($dtrData);
		
		// echo '<br>total_late '.$total_late;
		// echo '<br>total_undertime '.$total_undertime;


		$total_overtime = '00:00';
		if($total_late != '00:00' || $total_undertime != '00:00'):
			$total_overtime = '00:00';
		else:
			if($exemp == 0):
				# check if employee am time in and pm time out
				if($dtrData['inAM'] != '00:00:00' && $dtrData['outPM'] != '00:00:00'):
					$am_timein = strdate(fixTime($dtrData['inAM'],'am'));
					$pm_timeout = strdate(fixTime($dtrData['outPM'],'pm'));
					# expected timeout
					$exp_pmtimeout = $this->time_add($am_timein, constWorkHrs());
					$exp_pmtimeout = ($exp_pmtimeout > fixTime($scheme['pmTimeoutTo'], 'pm')) ? strdate(fixTime($scheme['pmTimeoutTo'], 'pm')) : $exp_pmtimeout;
					
					# get ot start time
					$otstarttime = $this->time_add($exp_pmtimeout, hrintbeforeOT());
					if($pm_timeout > $otstarttime):
						$total_overtime = $this->time_subtract($otstarttime, $pm_timeout);
					endif;
				endif;
			else:
				# get tota workhours
			endif;

		endif;

		return $total_overtime;

	}

	function time_subtract($timestart, $timeend, $gp='N', $gpmins=0)
	{
		$timeend = strtotime($timeend);
		$timestart = $gp == 'N' ? strtotime($timestart) : strtotime($timestart) + ($gpmins * 60);

		if($timestart > $timeend):
			return '00:00';
		else:
			$hours = ($timeend - $timestart) / 3600;
			$mins = (int)(($hours-floor($hours)) * 60 );
			return sprintf('%02d', floor($hours)) . ':' . sprintf('%02d', $mins);
		endif;
	}

	function time_add($time1, $time2)
	{
		if($time1 != '' && $time2 != ''):
			$time1 = $this->toMinutes($time1);
			$time2 = $this->toMinutes($time2);
			
			$total_minutes = $time1  + $time2 ;
			$hrs = (int)($total_minutes / 60);
			$mins = $total_minutes - ($hrs * 60);
			return sprintf('%02d', floor($hrs)).':'.sprintf('%02d', floor($mins));
		endif;
	}

	function breakDates($from, $to, $desc='')
	{
		$arrDays = array();
		if($from <= $to):
			while ($from <= $to) {
				array_push($arrDays, array('date' => $from, 'desc' => $desc));
				$from = date('Y-m-d', strtotime("+1 day", strtotime($from)));
			}
		else:
			# invalid date
		endif;
		return $arrDays;
	}

	function total_workhours($dtrData, $scheme, $med='')
	{
		$am_wkhrs = '00:00';
		$pm_wkhrs = '00:00';

		if($med == '' || $med == 'am'):
			if($dtrData['inAM'] != '00:00:00'):
				$timeout = (strdate($dtrData['outAM']) >= strdate($scheme['nnTimeoutFrom'])) ? strdate($scheme['nnTimeoutFrom']) : strdate($dtrData['outAM']);
				$timein = (strdate($dtrData['inAM']) <= strdate($scheme['amTimeinFrom'])) ? strdate($scheme['amTimeinFrom']) : strdate($dtrData['inAM']);
				# get total workhours
				$am_wkhrs = $this->time_subtract($timein, $timeout);
			endif;
		endif;

		if($med == '' || $med == 'pm'):
			if($dtrData['inPM'] != '00:00:00'):
				# Afternoon
				$timeout = (fixTime($dtrData['outPM'], 'pm') <= fixTime($scheme['pmTimeoutTo'], 'pm')) ? strdate(fixTime($dtrData['outPM'], 'pm')) : strdate(fixTime($scheme['pmTimeoutTo'], 'pm'));
				$timein = (strdate(fixTime($dtrData['inPM'], 'pm')) <= strdate(fixTime($scheme['nnTimeoutTo'], 'pm'))) ? strdate(fixTime($scheme['nnTimeoutTo'], 'pm')) : strdate(fixTime($dtrData['inPM'], 'pm'));

				# get total workhours
				$pm_wkhrs = $this->time_subtract($timein, $timeout);
			endif;
		endif;

		if($med == 'am'):
			return $am_wkhrs;
		elseif($med == 'pm'):
			return $pm_wkhrs;
		else:
			return $this->time_subtract($am_wkhrs, $pm_wkhrs);
		endif;
	}

}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */