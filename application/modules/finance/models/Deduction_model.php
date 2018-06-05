<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Deduction_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tbldeduction', $arrData);
		return $this->db->insert_id();
	}

	function addAgency($arrData)
	{
		$this->db->insert('tbldeductiongroup', $arrData);
		return $this->db->insert_id();
	}

	function edit($arrData, $code)
	{
		$this->db->where('deductionCode',$code);
		$this->db->update('tbldeduction', $arrData);
		return $this->db->affected_rows();
	}

	public function delete($tab, $code)
	{
		if($tab == 1):
			$this->db->where('deductionCode', $code);
			$this->db->delete('tbldeduction');	
		else:
			$this->db->where('deductionGroupCode', $code);
			$this->db->delete('tbldeductiongroup');	
		endif;
		return $this->db->affected_rows(); 
	}

	function edit_agency($arrData, $code)
	{
		$this->db->where('deductionGroupCode',$code);
		$this->db->update('tbldeductiongroup', $arrData);
		return $this->db->affected_rows();
	}

	function getDeductionsByStatus($status)
	{
		if($status==''):
			return $this->db->get('tbldeduction')->result_array();
		else:
			return $this->db->get_where('tbldeduction', array('hidden' => $status))->result_array();
		endif;
	}

	function getDeductionGroup($groupCode)
	{
		if($groupCode==''):
			return $this->db->order_by('deductionGroupCode','ASC')->get('tbldeductiongroup')->result_array();
		else:
			$result = $this->db->get_where('tbldeductiongroup', array('deductionGroupCode' => $groupCode))->result_array();
			return $result[0];
		endif;
	}

	function getDeductions($code)
	{
		if($code==''):
			return $this->db->select('deductionCode')->get('tbldeduction')->result_array();
		else:
			$result = $this->db->get_where('tbldeduction', array('deductionCode' => $code))->result_array();
			return $result[0];
		endif;
	}
	
	function isDeductionCodeExists($code, $action)
	{
		$result = $this->db->get_where('tbldeduction', array('deductionCode' => $code))->result_array();
		if($action == 'add'):
			if(count($result) > 0):
				return true;
			endif;
		else:
			if(count($result) > 1):
				return true;
			endif;
		endif;
		return false;
	}

	function isDeductionGroupExists($code, $action)
	{
		$result = $this->db->get_where('tbldeductiongroup', array('deductionGroupCode' => $code))->result_array();
		if($action == 'add'):
			if(count($result) > 0):
				return true;
			endif;
		else:
			if(count($result) > 1):
				return true;
			endif;
		endif;
		return false;
	}

}
/* End of file Deduction_model.php */
/* Location: ./application/modules/finance/models/Deduction_model.php */