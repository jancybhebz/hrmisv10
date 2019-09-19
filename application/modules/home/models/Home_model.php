<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}

	function getbirthdays()
	{
		$month = date('m');
		$this->db->select('surname,firstname,middlename,middleInitial,birthday,tblEmpPersonal.empNumber');
		$this->db->join('tblEmpPosition','tblEmpPosition.empNumber = tblEmpPersonal.empNumber');
		$this->db->like('birthday',$month);
		$this->db->where('tblEmpPosition.statusOfAppointment','In-Service');
		$this->db->order_by('DAYOFMONTH(birthday)');
		$objQuery = $this->db->get('tblEmpPersonal');
		return $objQuery->result_array();
	}

	function getvacantpositions()
	{
		$this->db->select('DISTINCT(itemNumber), positionCode, plantillaGroupCode');
		$this->db->where('rationalized!=',1);
		$this->db->order_by('positionCode');
		$objQuery = $this->db->get('tblPlantilla');
		return $objQuery->result_array();
	}

	function getretirees()
	{
		$dtmCurYear = date("Y");
		$intYear = $dtmCurYear;
		$dtmPrevYear = $dtmCurYear - 65;
		$dtmJanYear = $dtmPrevYear . "-" . "01-01";
		$dtmDecYear = $dtmPrevYear . "-" . "12-31";
		$this->db->select('tblEmpPersonal.empNumber, 
									tblEmpPersonal.surname, 
									tblEmpPersonal.firstname, 
									tblEmpPersonal.middleInitial, 
									tblEmpPersonal.nameExtension,
									tblEmpPersonal.birthday, 
									tblEmpPosition.statusOfAppointment, 
									tblEmpPosition.positionCode,
									tblEmpPosition.groupCode,
									tblEmpPosition.group1,
									tblEmpPosition.group2,
									tblEmpPosition.group3,
									tblEmpPosition.group4,
									tblEmpPosition.group5');
		$this->db->join('tblEmpPosition','tblEmpPersonal.empNumber = tblEmpPosition.empNumber','inner');
		$this->db->where('tblEmpPosition.statusOfAppointment','In-Service');
		$this->db->where('(tblEmpPosition.detailedfrom=0 OR tblEmpPosition.detailedfrom=2)');
		$this->db->where('tblEmpPersonal.birthday>=',$dtmJanYear);
		$this->db->where('tblEmpPersonal.birthday<=',$dtmDecYear);
		$this->db->order_by('tblEmpPersonal.surname asc, tblEmpPersonal.firstname asc,tblEmpPersonal.middlename asc');
		$objQuery = $this->db->get('tblEmpPersonal');
		return $objQuery->result_array();
	}

	function getemployeesbyappointment($strAppStatus)
	{
		
		$this->db->select('tblEmpPersonal.empNumber, tblEmpPersonal.surname, tblEmpPersonal.firstname, tblEmpPersonal.middlename,tblEmpPersonal.middleInitial,tblEmpPersonal.nameExtension,tblEmpPosition.positionCode');
		$this->db->join('tblEmpPosition','tblEmpPersonal.empNumber = tblEmpPosition.empNumber','inner');
		$this->db->where('tblEmpPosition.statusOfAppointment','In-Service');
		if($strAppStatus!='')
			$this->db->where('tblEmpPosition.appointmentCode',$strAppStatus);
		$this->db->order_by('tblEmpPersonal.surname asc, tblEmpPersonal.firstname asc,tblEmpPersonal.middlename asc');
		$objQuery = $this->db->get('tblEmpPersonal');
		//echo $this->db->last_query();exit(1);
		return $objQuery->result_array();
	}

}

/* End of file Home_model.php */
/* Location: ./application/modules/home/models/Home_model.php */