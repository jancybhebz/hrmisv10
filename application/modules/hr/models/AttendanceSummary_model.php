<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AttendanceSummary_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
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

}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */