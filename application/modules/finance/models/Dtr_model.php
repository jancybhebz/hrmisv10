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

	// get dtr summary
	function dtrSummary($empid, $year, $month)
	{
		$resDtr = $this->Dtr_model->getData($empid, $year, $month);
		$totaldays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		$arrDtr = array();

		// echo $totaldays;
		// echo '<pre>';
		
		foreach (range(1, $totaldays) as $day):
			$strsearch = $year.'-'.$month.'-'.str_pad($day, 2, '0', STR_PAD_LEFT);
			$d_key = array_search($strsearch, array_column($resDtr, 'dtrDate'));
			// echo date('D', strtotime($strsearch)).'<br>';
			// if($d_key == '' && $d_key !== 0){
			// 	echo 'null';
			// }
			// print_r($d_key == '' && $d_key !== 0 ? '' : $resDtr[$d_key]);
			
			$holiday = $this->Dtr_model->getHoliday($strsearch);
			$scheme = $this->Attendance_scheme_model->getAttendanceScheme($empid);
			if($d_key == '' && $d_key !== 0):
				$total_late = '';
			else:
				$total_late = $this->Dtr_model->computeLate($scheme, $resDtr[$d_key]);
			endif;


			// print_r(array('mday' => str_pad($day, 2, '0', STR_PAD_LEFT),
			// 				  'wday' => date('l', strtotime($strsearch)),
			// 				  'holiday' => $holiday != null ? $holiday['holidayName'] : '',
			// 				  'late' => $total_late,
			// 				  'data' => $d_key == '' && $d_key !== 0 ? null : $resDtr[$d_key]));
			// echo '<hr>';

			$arrDtr[] = array('mday' => str_pad($day, 2, '0', STR_PAD_LEFT),
							  'wday' => date('l', strtotime($strsearch)),
							  'holiday' => $holiday != null ? $holiday['holidayName'] : '',
							  'late' => $total_late,
							  'data' => $d_key == '' && $d_key !== 0 ? null : $resDtr[$d_key]);
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
		# Morning
		$fixmondays = fixMondayDate();
		if( (strtotime($dtrData['dtrDate']) >= $fixmondays['fixMonDate']) && (date('l', strtotime($dtrData['dtrDate'])) == 'Monday') ):
			$am_systimein = $fixmondays['amTimeinTo'];
		else:
			$am_systimein = $scheme['amTimeinTo'];
		endif;

		$am_timein = $dtrData['inAM'];
		$am_late = $this->time_subtract(fixTime($am_systimein,'AM'), fixTime($am_timein,'AM'), $scheme['gpLeaveCredits'], $scheme['gracePeriod']);

		# Afternoon
		$pm_timein = $dtrData['inPM'];
		$pm_systimein = $scheme['nnTimeinTo'];
		$pm_late = $this->time_subtract(fixTime($pm_systimein,'PM'), fixTime($pm_timein,'PM'));

		$total_late = $this->time_add($am_late, $pm_late);

		return $total_late;
	}

	function time_subtract($systime, $timein, $gp='N', $gpmins=0)
	{
		$timein = strtotime($timein);
		$systime = $gp == 'N' ? strtotime($systime) : strtotime($systime) + ($gpmins * 60);
		if($systime > $timein):
			return '00:00';
		else:
			$hours = ($timein - $systime) / 3600;
			return sprintf('%02d', floor($hours)) . ':' . (int)( ($hours-floor($hours)) * 60 );
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

}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */