<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dtrkiosk_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();	
	}
	
	function get_present_employees()
	{
		$this->db->order_by('surname');
		$this->db->select('tblEmpPersonal.empNumber,surname,firstname,middlename,middleInitial,inAM,outAM,inPM,outPM');
		$this->db->join('tblEmpPersonal',' tblEmpPersonal.empNumber = tblEmpDTR.empNumber','left');
		$res = $this->db->get_where('tblEmpDTR', array('dtrDate' => date('Y-m-d')))->result_array();
		
		return $res;
	}

	function get_absent_employees()
	{
		$employees = array();
		$emp_dtr = $this->db->select('empNumber')->get_where('tblEmpDTR', array('dtrDate' => date('Y-m-d')))->result_array();

		$this->db->order_by('surname');
		$this->db->select('tblEmpPersonal.empNumber,surname,firstname,middlename,middleInitial');
		$this->db->join('tblEmpPersonal',' tblEmpPersonal.empNumber = tblEmpPosition.empNumber','left');
		if(count($emp_dtr) > 0):
			$this->db->where_not_in('tblEmpPosition.empNumber', array_column($emp_dtr,'empNumber'));
		endif;
		$employees = $this->db->get_where('tblEmpPosition', array('statusOfAppointment' => 'In-Service'))->result_array();
		
		return $employees;
	}

	function get_ob_employees()
	{
		$this->db->group_by('tblEmpOB.empNumber');
		$this->db->select('tblEmpPersonal.empNumber,surname,firstname,middlename,middleInitial');
		$this->db->join('tblEmpPersonal',' tblEmpPersonal.empNumber = tblEmpOB.empNumber','left');
		$this->db->where("'".date('Y-m-d')."' >= obDateFrom");
		$this->db->where("'".date('Y-m-d')."' <= obDateTo");
		$employees = $this->db->get('tblEmpOB')->result_array();
		
		return $employees;
	}

	function get_leave_employees()
	{
		$this->db->group_by('tblEmpLeave.empNumber');
		$this->db->select('tblEmpPersonal.empNumber,surname,firstname,middlename,middleInitial');
		$this->db->join('tblEmpPersonal',' tblEmpPersonal.empNumber = tblEmpLeave.empNumber','left');
		$this->db->where("'".date('Y-m-d')."' >= leaveFrom");
		$this->db->where("'".date('Y-m-d')."' <= leaveTo");
		$employees = $this->db->get('tblEmpLeave')->result_array();
		
		return $employees;
	}
	

}
