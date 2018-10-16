<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Dtr_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->table = 'tblEmpDTR';
	}
	
	function getData($empid,$yr,$mon)
	{
		$this->db->where("dtrDate like '".$yr."-".$mon."%'");
		$this->db->where("empNumber",$empid);
		$this->db->order_by("dtrDate", "asc");
		return $this->db->get_where($this->table)->result_array();
	}

	function getHoliday($strday)
	{
		$this->db->join('tblHoliday', 'tblHoliday.holidayCode = tblHolidayYear.holidayCode', 'left');
		$this->db->where("tblHolidayYear.holidayDate like '".$strday."'");
		$res = $this->db->get_where('tblHolidayYear')->result_array();
		return count($res) > 0 ? $res[0] : null; 
	}

	function getLocalHoliday($strday)
	{
		$this->db->join('tblHoliday', 'tblHoliday.holidayCode = tblEmpLocalHoliday.holidayCode', 'left');
		$this->db->where("tblEmpLocalHoliday.holidayDate like '".$strday."'");
		$res = $this->db->get_where('tblEmpLocalHoliday')->result_array();
		return count($res) > 0 ? $res[0] : null; 
	}

	function getEmpOB($empid, $year, $month)
	{
		$this->db->where("empNumber like '".$empid."'");
		$this->db->where("(obDateFrom like '".$year."-".$month."%' OR obDateTo like '".$year."-".$month."%')");
		$res = $this->db->get_where('tblEmpOB')->result_array();
		return $res; 
	}

	// get dtr summary
	function dtrSummary($empid, $year, $month)
	{
		$resDtr = $this->getData($empid, $year, $month);
		$totaldays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		$empOB = $this->getEmpOB($empid, $year, $month);
		$arrOB = array();
		foreach($empOB as $ob):
			$days = $this->breakDates($ob['obDateFrom'], $ob['obDateTo'], '('.setHrSec($ob['obTimeFrom'], 1).' - '.setHrSec($ob['obTimeTo'], 1).')');
			foreach($days as $day):
				array_push($arrOB, $day);
			endforeach;
		endforeach;


		$arrDtr = array();

		// echo $totaldays;
		
		// print_r($empOB);

		foreach (range(1, $totaldays) as $day):
			$strsearch = $year.'-'.$month.'-'.str_pad($day, 2, '0', STR_PAD_LEFT);

			$ob_key = array_search($strsearch, array_column($arrOB, 'date')); # ob key
			$ob = '';
			if(!($ob_key == '' && $ob_key !== 0)):
				$arrob = $arrOB[$ob_key];
				$ob = $arrob['desc'];
			endif;
			
			$d_key = array_search($strsearch, array_column($resDtr, 'dtrDate')); # data key

			$holiday = $this->Dtr_model->getHoliday($strsearch);
			$scheme = $this->Attendance_scheme_model->getAttendanceScheme($empid);
			if($d_key == '' && $d_key !== 0):
				$total_late = '';
				$total_undertime = '';
				$tota_overtime = '';
			else:
				$total_late = $this->Dtr_model->computeLate($scheme, $resDtr[$d_key]);
				$total_undertime = $this->Dtr_model->computeUndertime($scheme, $resDtr[$d_key], $total_late);
				$tota_overtime = $this->Dtr_model->computeOvertime($scheme, $resDtr[$d_key], $total_late, $scheme['nnTimeoutFrom'], $total_undertime);
			endif;

			$arrDtr[] = array('mday' => str_pad($day, 2, '0', STR_PAD_LEFT),
							  'wday' => date('l', strtotime($strsearch)),
							  'holiday' => $holiday != null ? $holiday['holidayName'] : '',
							  'late' => $total_late == '00:00' ? '' : $total_late,
							  'undertime' => $total_undertime == '00:00' ? '' : $total_undertime,
							  'overtime' => $tota_overtime == '00:00' ? '' : $tota_overtime,
							  'ob' => $ob == '' ? '' : 'OB '.$ob,
							  'data' => $d_key == '' && $d_key !== 0 ? null : $resDtr[$d_key]);
			// print_r($arrDtr);
			// echo '<hr>';

		endforeach;
		// die();
		// print_r($arrDtr);

		return $arrDtr;
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

		# Morning
		$fixmondays = fixMondayDate();
		if( (strtotime($dtrData['dtrDate']) >= $fixmondays['fixMonDate']) && (date('l', strtotime($dtrData['dtrDate'])) == 'Monday') ):
			$am_systimein = setHrSec($fixmondays['amTimeinTo']);
		else:
			$am_systimein = setHrSec($scheme['amTimeinTo']);
		endif;

		$am_timein = setHrSec($dtrData['inAM']);
		$am_late = $this->time_subtract(fixTime($am_systimein,'AM'), fixTime($am_timein,'AM'), $scheme['gpLeaveCredits'], $scheme['gracePeriod']);

		# Afternoon
		$pm_timein = setHrSec($dtrData['inPM']);
		$pm_systimein = setHrSec($scheme['nnTimeinTo']);
		$pm_late = $this->time_subtract(fixTime($pm_systimein,'PM'), fixTime($pm_timein,'PM'));

		$total_late = $this->time_add($am_late, $pm_late);

		return $total_late;
	}

	function computeUndertime($scheme, $dtrData, $total_late)
	{
		$total_undertime = '00:00';

		# check if employee am time in and pm time out
		if($dtrData['inAM'] != '00:00:00' && $dtrData['outPM'] != '00:00:00'):

			# Check if working lunch
			if($dtrData['outAM'] != '00:00:00' && $dtrData['inPM'] != '00:00:00'):
				# Get Morning Undertime
				$am_undertime = '00:00';
				$pm_systimeout = setHrSec($scheme['nnTimeoutFrom']);
				$am_timeout = setHrSec($dtrData['outAM']);

				if($am_timeout < $pm_systimeout):
					$am_undertime = $this->time_subtract($am_timeout, $pm_systimeout);
				else:	
					$am_undertime = '00:00';
				endif;

				$am_timein = setHrSec(fixTime($dtrData['inAM'],'am'));
				$pm_timeout = setHrSec(fixTime($dtrData['outPM'],'pm'));
				# expected timeout
				$exp_pmtimeout = $this->time_add($am_timein, constWorkHrs());
				$exp_pmtimeout = ($exp_pmtimeout > fixTime($scheme['pmTimeoutTo'], 'pm')) ? setHrSec(fixTime($scheme['pmTimeoutTo'], 'pm')) : $exp_pmtimeout;

				$pm_undertime = $this->time_subtract($pm_timeout, $exp_pmtimeout);
				$total_undertime = $this->time_add($am_undertime, $pm_undertime);
			endif;

		else:
			# check if halfday
			# Morning
			if($dtrData['inAM'] != '00:00:00'):
				$timeout = (setHrSec($dtrData['outAM']) >= setHrSec($scheme['nnTimeoutFrom'])) ? setHrSec($scheme['nnTimeoutFrom']) : setHrSec($dtrData['outAM']);
				$timein = (setHrSec($dtrData['inAM']) <= setHrSec($scheme['amTimeinFrom'])) ? setHrSec($scheme['amTimeinFrom']) : setHrSec($dtrData['inAM']);

				# get total workhours
				$total_wkhrs = $this->time_subtract($timein, $timeout);
				# '01:00' for 1 hr Lunch break
 				$total_undertime = $this->time_subtract($total_wkhrs, constWorkHrs('01:00'));

			elseif($dtrData['inPM'] != '00:00:00'):
				# Afternoon
				$timeout = (fixTime($dtrData['outPM'], 'pm') <= fixTime($scheme['pmTimeoutTo'], 'pm')) ? setHrSec(fixTime($dtrData['outPM'], 'pm')) : setHrSec(fixTime($scheme['pmTimeoutTo'], 'pm'));
				$timein = (setHrSec(fixTime($dtrData['inPM'], 'pm')) <= setHrSec(fixTime($scheme['nnTimeoutTo'], 'pm'))) ? setHrSec(fixTime($scheme['nnTimeoutTo'], 'pm')) : setHrSec(fixTime($dtrData['inPM'], 'pm'));

				# get total workhours
				$total_wkhrs = $this->time_subtract($timein, $timeout);
				# '01:00' for 1 hr Lunch break
 				$total_undertime = $this->time_subtract($total_wkhrs, constWorkHrs('01:00'));

			else:
				# ABSENT 
			endif;
		endif;

		return $total_undertime;

	}

	function computeOvertime($scheme, $dtrData, $total_late, $systimeout, $total_undertime)
	{
		$systimeout = setHrSec(fixTime($systimeout,'pm'));
		$total_overtime = '00:00';
		if($total_late != '00:00' || $total_undertime != '00:00'):
			$total_overtime = '00:00';
		else:
			# check if employee am time in and pm time out
			if($dtrData['inAM'] != '00:00:00' && $dtrData['outPM'] != '00:00:00'):
				$am_timein = setHrSec(fixTime($dtrData['inAM'],'am'));
				$pm_timeout = setHrSec(fixTime($dtrData['outPM'],'pm'));
				# expected timeout
				$exp_pmtimeout = $this->time_add($am_timein, constWorkHrs());
				$exp_pmtimeout = ($exp_pmtimeout > fixTime($scheme['pmTimeoutTo'], 'pm')) ? setHrSec(fixTime($scheme['pmTimeoutTo'], 'pm')) : $exp_pmtimeout;
				
				# get ot start time
				$otstarttime = $this->time_add($exp_pmtimeout, hrintbeforeOT());
				if($pm_timeout > $otstarttime):
					$total_overtime = $this->time_subtract($otstarttime, $pm_timeout);
				endif;

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


}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */