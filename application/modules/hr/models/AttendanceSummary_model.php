<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AttendanceSummary_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	public function getemp_dtr($empid, $month, $yr)
	{
		echo '<pre>';
		# DTR Data
		$this->db->order_by('dtrDate', 'asc');
		$this->db->where('empNumber', $empid);
		$this->db->like('dtrDate', $yr.'-'.$month, 'after');
		$arrData = $this->db->get('tblEmpDTR')->result_array();

		# Regular Holiday
		$this->db->join('tblHolidayYear','tblHolidayYear.holidayCode = tblHoliday.holidayCode','inner');
		$this->db->like('holidayDate', $yr.'-'.$month, 'after');
		$reg_holidays = $this->db->get('tblHoliday')->result_array();

		# Local Holiday
		// $this->db->join('tblHoliday','tblHoliday.holidayCode = tblEmpLocalHoliday.holidayCode','left');
		// $this->db->where('empNumber', $empid);
		// $local_holidays = $this->db->get('tblEmpLocalHoliday')->result_array();

		# Attendance Scheme
		$emp_scheme = $this->db->get_where('tblEmpPosition', array('empNumber' => $empid))->result_array();
		$att_scheme = $this->db->get_where('tblAttendanceScheme', array('schemeCode' => $emp_scheme[0]['schemeCode']))->result_array();
		$att_scheme = $att_scheme[0];


		print_r($att_scheme);

		// print_r($local_holidays);

		$arrdtrData = array();
		foreach(range(1, cal_days_in_month(CAL_GREGORIAN, $month, $yr)) as $day):
			$late = 0;
			$ddate = $yr.'-'.$month.'-'.sprintf('%02d', $day);
			$dday = date('D', strtotime($ddate));

			# Dtr data
			$dtrkey = array_search($ddate, array_column($arrData, 'dtrDate'));
			$dtrdata = is_numeric($dtrkey) ? $arrData[$dtrkey] : array();

			# Holiday
			$holikey = array_search($ddate, array_column($reg_holidays, 'holidayDate'));
			$holiday = is_numeric($holikey) ? $reg_holidays[$holikey]['holidayName'] : '';

			// print_r($dtrdata);
			//TODO:: add local holiday
			if($holiday == '' && count($dtrdata) > 0 && !in_array($dday, array('Sat','Sun'))):
				# AM Late
				$scheme_am_timein_from = $att_scheme['amTimeinFrom'];
				$scheme_am_timein_to   = $att_scheme['amTimeinTo'];

				// echo '<br>scheme_am_timein_from = '.$scheme_am_timein_from;
				// echo '<br>scheme_am_timein_to = '.$scheme_am_timein_to;
				// echo '<br>att_scheme fixMonday = '.$att_scheme['fixMonday'];
				// echo '<br>dday = '.$dday;
				// print_r($dtrdata);

				# if Fix Monday and Monday
				if($att_scheme['fixMonday'] == 'Y' && $dday == 'Mon'):
					// echo 'MONDAY AND FIX';
					// echo '<br>scheme_am_timein_from = '.$scheme_am_timein_from;
					// echo '<br>scheme_am_timein_to = '.$scheme_am_timein_to;
					// echo '<br>att_scheme fixMonday = '.$att_scheme['fixMonday'];
					// echo '<br>dday = '.$dday;
					// echo '<br>_ENV FLAGCRMNY = '.$_ENV['FLAGCRMNY'].' = '.toMinutes($_ENV['FLAGCRMNY']);
					// echo '<br>timein = '.$dtrdata['inAM'].' = '.toMinutes($dtrdata['inAM']);

					$late = toMinutes($dtrdata['inAM']) - toMinutes($_ENV['FLAGCRMNY']);
					// echo '<br>late = '.$late;

					// echo '<br>';
					// print_r($dtrdata);
				# if Not Fix Monday and Not Monday
				else:
					$late = toMinutes($dtrdata['inAM']) - toMinutes($scheme_am_timein_to);
				endif;

			endif;

			print_r(array('date' => $ddate,
								  'day'  => $dday,
								  'late' => $late > 0 ? $late : 0,
								  'holiday' => $holiday,
								  'dtrdata' => $dtrdata));

			$arrdtrData[] = array('date' => $ddate,
								  'day'  => $dday,
								  'late' => $late > 0 ? $late : 0,
								  'holiday' => $holiday,
								  'dtrdata' => $dtrdata);
			echo '<hr>';
		endforeach;

		
		// print_r($arrdtrData);
		die();
		return $arrdtrData;
	}

	# Begin Broken Sched
	public function add_brokensched($arrData)
	{
		$this->db->insert('tblBrokenSched', $arrData);
		return $this->db->insert_id();		
	}

	function edit_brokensched($arrData, $id)
	{
		$this->db->where('rec_ID', $id);
		$this->db->update('tblBrokenSched', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_brokensched($id)
	{
		$this->db->where('rec_ID', $id);
		$this->db->delete('tblBrokenSched'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getBrokenschedules($empid)
	{
		$this->db->join('tblAttendanceScheme', 'tblAttendanceScheme.schemeCode = tblBrokenSched.schemeCode', 'left');
		return $this->db->get_where('tblBrokenSched', array('empNumber' => $empid))->result_array();
	}

	public function getSchedule($id)
	{
		return $this->db->get_where('tblBrokenSched', array('rec_ID' => $id))->result_array();
	}
	# End Broken Sched

	# Begin Broken Sched
	public function add_localholiday($arrData)
	{
		$this->db->insert('tblEmpLocalHoliday', $arrData);
		return $this->db->insert_id();		
	}

	function edit_localholiday($arrData, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tblEmpLocalHoliday', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_localholiday($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tblEmpLocalHoliday');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getLocalHolidays($empid)
	{
		$this->db->join('tblLocalHoliday', 'tblLocalHoliday.holidayCode = tblEmpLocalHoliday.holidayCode', 'left');
		return $this->db->get_where('tblEmpLocalHoliday', array('empNumber' => $empid))->result_array();
	}

	public function getHoliday($id)
	{
		return $this->db->get_where('tblEmpLocalHoliday', array('id' => $id))->result_array();
	}
	# End Broken Sched

	# Begin OB
	public function add_ob($arrData)
	{
		$this->db->insert('tblEmpOB', $arrData);
		return $this->db->insert_id();		
	}

	function edit_ob($arrData, $id)
	{
		$this->db->where('obID', $id);
		$this->db->update('tblEmpOB', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_ob($id)
	{
		$this->db->where('obID', $id);
		$this->db->delete('tblEmpOB');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getobs($empid)
	{
		return $this->db->get_where('tblEmpOB', array('empNumber' => $empid))->result_array();
	}

	public function getOb($id)
	{
		return $this->db->get_where('tblEmpOB', array('obID' => $id))->result_array();
	}
	# End OB

	# Begin Leave
	public function add_leave($arrData)
	{
		$this->db->insert('tblEmpLeave', $arrData);
		return $this->db->insert_id();		
	}

	function edit_leave($arrData, $id)
	{
		$this->db->where('leaveID', $id);
		$this->db->update('tblEmpLeave', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_leave($id)
	{
		$this->db->where('leaveID', $id);
		$this->db->delete('tblEmpLeave');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getleaves($empid)
	{
		$this->db->join('tblLeave', 'tblLeave.leaveCode = tblEmpLeave.leaveCode', 'left');
		return $this->db->get_where('tblEmpLeave', array('empNumber' => $empid))->result_array();
	}

	public function getLeave($id)
	{
		$this->db->join('tblLeave', 'tblLeave.leaveCode = tblEmpLeave.leaveCode', 'left');
		return $this->db->get_where('tblEmpLeave', array('leaveID' => $id))->result_array();
	}

	public function getSpecificLeave($type)
	{
		return $this->db->get_where('tblSpecificLeave', array('leaveCode' => $type))->result_array();
	}

	public function getTotalnoofdays($leavefrom,$leaveto)
	{
		$totaldays = 0;
		while (strtotime($leavefrom) <= strtotime($leaveto)) {
			$validday = date('D', strtotime($leavefrom)); # holiday no included
			if($validday != 'Sat' && $validday != 'Sun'){
				$totaldays++;
			}
			$leavefrom = date ("Y-m-d", strtotime("+1 day", strtotime($leavefrom)));
		}
		return $totaldays;
	}
	# End Leave

	# Begin Compensatory Leave
	function edit_comp_leave($arrData, $empnumber, $dtrdate)
	{
		$this->db->where('empNumber', $empnumber);
		$this->db->where('dtrDate', $dtrdate);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getcomp_leaves($empid)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'remarks' => 'CL'))->result_array();
	}
	# End Compensatory Leave

	# Begin Time
	function edit_dtrTime($arrData, $empnumber, $dtrdate)
	{
		$this->db->where('empNumber', $empnumber);
		$this->db->where('dtrDate', $dtrdate);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getdtrTimes($empid)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'remarks' => ''))->result_array();
	}
	# End Time

	# Begin Travel Order
	public function add_to($arrData)
	{
		$this->db->insert('tblEmpTravelOrder', $arrData);
		return $this->db->insert_id();		
	}

	function edit_to($arrData, $id)
	{
		$this->db->where('toID', $id);
		$this->db->update('tblEmpTravelOrder', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_to($id)
	{
		$this->db->where('toID', $id);
		$this->db->delete('tblEmpTravelOrder');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function gettos($empid)
	{
		return $this->db->get_where('tblEmpTravelOrder', array('empNumber' => $empid))->result_array();
	}

	public function getTo($id)
	{
		return $this->db->get_where('tblEmpTravelOrder', array('toID' => $id))->result_array();
	}
	# End Travel Order

	# Begin Flag Ceremony
	public function add_flagcrmy($arrData)
	{
		$this->db->insert('tblEmpDTR', $arrData);
		return $this->db->insert_id();		
	}

	function edit_flagcrmy($arrData, $empnumber, $dtrdate)
	{
		$this->db->where('empNumber', $empnumber);
		$this->db->where('dtrDate', $dtrdate);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getflagcrmys($empid)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'remarks' => 'FC'))->result_array();
	}

	public function getFlagcrmy($id)
	{
		return $this->db->get_where('tblEmpDTR', array('id' => $id))->result_array();
	}

	public function checkEntry($empid, $dtrdate)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'dtrDate' => $dtrdate))->result_array();
	}
	# End Flag Ceremony


}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */