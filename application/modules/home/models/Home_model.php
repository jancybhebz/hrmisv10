<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}

	function getbirthdays()
	{
		$month = date('m');
		$this->db->select('surname,firstname,middlename,middleInitial,birthday,empNumber');
		$this->db->like('birthday',$month);
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

}

/* End of file Home_model.php */
/* Location: ./application/modules/home/models/Home_model.php */