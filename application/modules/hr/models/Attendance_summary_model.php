<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Attendance_summary_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function edit_dtr($arrData, $dtrid)
	{
		$this->db->where('id', $dtrid);
		$this->db->update('tblEmpDTR', $arrData);
		
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function add_dtr($arrData)
	{
		$this->db->insert('tblEmpDTR', $arrData);
		return $this->db->insert_id();		
	}

	function getEmployee_dtr($empid,$sdate,$edate)
	{
		$this->db->where('empNumber', $empid);
		if($sdate == $edate){
			$this->db->where("dtrDate",$sdate);
		}else{
			$this->db->where("dtrDate BETWEEN '".$sdate."' AND '".$edate."'");
		}
		$res = $this->db->get('tblEmpDTR')->result_array();
		
		if(count($res) > 0){
			return $res;
		}else{
			return null;
		}
	}

	function getcurrent_dtr($empid)
	{
		$res = $this->db->get_where('tblEmpDTR' ,array('empNumber' => $empid, 'dtrDate' => date('Y-m-d')))->result_array();
		if(count($res) > 0){
			return $res[0];
		}else{
			return null;
		}
	}

	public function getemp_dtr($empid, $datefrom, $dateto)
	{
		$this->load->model(array('libraries/Holiday_model','employee/Official_business_model','finance/Dtr_model','employee/Travelorder_model','employee/Leave_model','libraries/Attendance_scheme_model'));
		echo '<pre>';
		$this->load->helper('dtr_helper');

		echo '<br>txtdtr_datefrom '.$datefrom;
		echo '<br>txtdtr_dateto '.$dateto;
		echo '<br><br>';

		$att_scheme = $this->Attendance_scheme_model->getAttendanceScheme($empid);

		# DTR Data
		$arrData = $this->Dtr_model->getData($empid,0,0,$datefrom,$dateto);
		$reg_holidays = $this->Holiday_model->getAllHolidates($empid,$datefrom,$dateto);
		
		$arr_first_days = $this->get_the_firstday_ofthe_week($datefrom,$dateto,$reg_holidays);
		print_r($arr_first_days);


		$arrDataOb = $this->Official_business_model->getEmployeeOB($empid,$datefrom,$dateto);
		$arrOb = array();
		foreach($arrDataOb as $data_ob):
			foreach(dateRange($data_ob['obDateFrom'],$data_ob['obDateTo']) as $ob_date):
				$arrOb[] = array_merge($data_ob,array('obdate' => $ob_date));
			endforeach;
		endforeach;

		$arrDataTo = $this->Travelorder_model->getEmployeeTO($empid,$datefrom,$dateto);
		$arrTo = array();
		foreach($arrDataTo as $data_to):
			foreach(dateRange($data_to['toDateFrom'],$data_to['toDateTo']) as $to_date):
				$arrTo[] = array_merge($data_to,array('todate' => $to_date));
			endforeach;
		endforeach;

		$arrDataLeaves = $this->Leave_model->getleave($empid,$datefrom,$dateto);
		$arrLeaves = array();
		foreach($arrDataLeaves as $data_leave):
			foreach(dateRange($data_leave['leaveFrom'],$data_leave['leaveTo']) as $leave_date):
				$arrLeaves[] = array_merge($data_leave,array('leavedate' => $leave_date));
			endforeach;
		endforeach;
		
		$emp_dtr = array();
		foreach(dateRange($datefrom,$dateto) as $dtrdate):
			# Begin DTR
			$dtr = array();
			if(in_array($dtrdate,array_column($arrData,'dtrDate'))):
				$dtr = $arrData[array_search($dtrdate, array_column($arrData, 'dtrDate'))];
			endif;
			# End DTR

			# Begin OB
			$obs = array();
			if(in_array($dtrdate,array_column($arrOb,'obdate'))):
				$obs = $arrOb[array_search($dtrdate, array_column($arrOb, 'obdate'))];
			endif;
			# End OB

			# Begin TO
			$tos = array();
			if(in_array($dtrdate,array_column($arrTo,'todate'))):
				$tos = $arrTo[array_search($dtrdate, array_column($arrTo, 'todate'))];
			endif;
			# End TO

			# Begin Leave
			$leaves = array();
			if(in_array($dtrdate,array_column($arrLeaves,'leavedate'))):
				$leaves = $arrLeaves[array_search($dtrdate, array_column($arrLeaves, 'leavedate'))];
			endif;
			# End Leave

			# Begin Compensatory Leave
			$cto = '';
			if(!empty($dtr)):
				$cto = $dtr['remarks'] == 'CL' ? 1 : 0;
			endif;
			# End Compensatory Leave

			# Begin Late
			if(in_array($dtrdate,$arr_first_days)):
				echo 'first day<br>';
				if(!empty($dtr)):
					$flag_ceremony_time = flag_ceremony_time();
					$att_scheme['amTimeinTo'] = $flag_ceremony_time;
					$att_scheme['pmTimeoutTo'] = date('H:i:s', strtotime($flag_ceremony_time) + 60*60*9);
					$this->compute_late($att_scheme,$dtr);
				endif;
			else:

			endif;
			# End Late

			# Begin Data Array
			$emp_dtr[] = array('dtr' => $dtr, 'obs' => $obs, 'tos' => $tos, 'leaves' => $leaves, 'cto' => $cto);
			# End Data Array
			echo '<hr>';
		endforeach;
		print_r($emp_dtr);
		die();
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

	public function getLocalHolidays($empid,$month='',$yr='')
	{
		$arrcond = array('empNumber' => $empid);
		if($month!='' && $yr!=''):
			$arrcond['holidayYear'] = $yr;
			$arrcond['holidayMonth'] = (int) $month;
		endif;
		$this->db->join('tblLocalHoliday', 'tblLocalHoliday.holidayCode = tblEmpLocalHoliday.holidayCode', 'left');
		return $this->db->get_where('tblEmpLocalHoliday', $arrcond)->result_array();
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
		$res = $this->db->insert_id();
		return $res;
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

	public function getobs($empid, $ddate='')
	{
		$this->db->where('tblEmpOB.empNumber', $empid);
		$this->db->where('requestStatus', 'Certified');
		$this->db->where('requestCode', 'OB');

		if($ddate != ''):
			$this->db->where("('".$ddate."' >= obDateFrom and '".$ddate."' <= obDateTo)");
		endif;
		$this->db->join('tblEmpRequest', 'tblEmpRequest.empNumber = tblEmpOB.empNumber', 'left');
		return $this->db->get('tblEmpOB')->result_array();
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

	public function getleaves($empid,$leavetype='',$ddate='')
	{
		$this->db->where('tblEmpLeave.empNumber', $empid);
		$this->db->where('requestStatus', 'Certified');
		if($leavetype != ''):
			$this->db->where('tblEmpLeave.leaveCode', $leavetype);
		endif;
		if($ddate != ''):
			$this->db->where("('".$ddate."' >= leaveFrom and '".$ddate."' <= leaveTo)");
		endif;
		$this->db->join('tblEmpRequest', 'tblEmpRequest.empNumber = tblEmpLeave.empNumber', 'left');
		$this->db->join('tblLeave', 'tblLeave.leaveCode = tblEmpLeave.leaveCode', 'left');
		return $this->db->get('tblEmpLeave')->result_array();
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

	public function gettos($empid,$ddate='')
	{
		$this->db->where('tblEmpTravelOrder.empNumber', $empid);
		// $this->db->where('LCASE(\'requestStatus\')', 'certified');
		// $this->db->where('requestCode', 'TO');

		if($ddate != ''):
			$this->db->where("('".$ddate."' >= toDateFrom and '".$ddate."' <= toDateTo)");
		endif;
		// $this->db->join('tblEmpRequest', 'tblEmpRequest.empNumber = tblEmpTravelOrder.empNumber', 'left');
		return $this->db->get('tblEmpTravelOrder')->result_array();
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

	# begin offset balance
	public function getOffsetBalance($empid, $month, $yr)
	{
		echo '<pre>';
		$offbal = $this->db->get_where('tblEmpLeaveBalance', array('empNumber' => $empid, 'periodMonth' => $month, 'periodYear' => $yr))->result_array();
		$offbal = count($offbal) > 0 ? $offbal[0]['off_bal'] : 0;
		print_r($offbal);
		die();
	}
	# end offset balance

	function get_the_firstday_ofthe_week($datefrom,$dateto,$holidays)
	{
		$array_first_day_of_theweek = array();
		foreach(get_day($datefrom,$dateto,1) as $mdate):
			$week_firstday = '';
			$monday = $mdate;
			$friday = date('Y-m-d', strtotime('friday this week', strtotime($mdate)));
			$weekdates = dateRange($monday,$friday);
			$not_holidays = $this->sort_date(array_diff($weekdates,$holidays));

			if(count($not_holidays) > 0):
				$week_firstday = $not_holidays[0];
			endif;
			array_push($array_first_day_of_theweek,$week_firstday);
		endforeach;

		return $array_first_day_of_theweek;
	}

	function sort_date($arrDates)
	{
		usort($arrDates, "date_sort");
		return $arrDates;
	}

	function compute_late($att_scheme,$dtr)
	{
		# Attendance Scheme
		$sc_am_timein_from = date('H:i:s',strtotime($att_scheme['amTimeinFrom'].' AM'));
		$sc_am_timein_to = date('H:i:s',strtotime($att_scheme['amTimeinTo'].' AM'));
		$sc_nn_timein_from = date('H:i:s',strtotime($att_scheme['nnTimeinFrom'].' PM'));
		$sc_nn_timein_to = date('H:i:s',strtotime($att_scheme['nnTimeinTo'].' PM'));
		$sc_pm_timeout_from = date('H:i:s',strtotime($att_scheme['pmTimeoutFrom'].' PM'));
		$sc_pm_timeout_to = date('H:i:s',strtotime($att_scheme['pmTimeoutTo'].' PM'));
		

		# DTR Data
		print_r($dtr);
		$am_timein 	= $dtr['inAM'];
		$am_timeout = $dtr['outAM'];
		$pm_timein 	= $dtr['inPM'];
		$pm_timeout = $dtr['outPM'];

		if($am_timein <= $sc_am_timein_to):
			
		else:
		endif;

		echo 'am_timein_from = '.$sc_am_timein_from;
		echo '<br>';
		echo 'am_timein_to = '.$sc_am_timein_to;
		echo '<br>';
		echo 'nn_timein_from = '.$sc_nn_timein_from;
		echo '<br>';
		echo 'nn_timein_to = '.$sc_nn_timein_to;
		echo '<br>';
		echo 'pm_timeout_from = '.$sc_pm_timeout_from;
		echo '<br>';
		echo 'pm_timeout_to = '.$sc_pm_timeout_to;
		echo '<br><br>';
		echo 'am_timein = '.$am_timein;
		echo '<br>';
		echo 'am_timeout = '.$am_timeout;
		echo '<br>';
		echo 'pm_timein = '.$pm_timein;
		echo '<br>';
		echo 'pm_timeout = '.$pm_timeout;
		echo '<br>';
		

	}

}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */