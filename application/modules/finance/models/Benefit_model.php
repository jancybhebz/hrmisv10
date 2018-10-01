<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Benefit_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblempbenefits', $arrData);
		return $this->db->insert_id();
	}

	function edit($arrData, $benefitcode)
	{
		$this->db->where('benefitCode',$benefitcode);
		$this->db->update('tblempbenefits', $arrData);
		return $this->db->affected_rows();
	}

	function getBenefits($empid='', $incomeCode='')
	{
		$arrWhere = $incomeCode!='' ? array('incomeCode' => $incomeCode, 'empNumber' => $empid) : array('empNumber' => $empid);
		return $this->db->get_where('tblempbenefits', $arrWhere)->result_array();
	}
		
}
/* End of file Benefit_model.php */
/* Location: ./application/modules/finance/models/Benefit_model.php */