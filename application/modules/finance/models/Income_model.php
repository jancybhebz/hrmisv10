<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Income_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblIncome', $arrData);
		return $this->db->insert_id();
	}

	function edit($arrData, $code)
	{
		$this->db->where('incomeCode',$code);
		$this->db->update('tblIncome', $arrData);
		return $this->db->affected_rows();
	}

	public function delete($code)
	{
		$this->db->where('incomeCode', $code);
		$this->db->delete('tblIncome');
		return $this->db->affected_rows(); 
	}

	function getDataByIncomeCode($code='')
	{
		if($code == ''):
			return $this->db->order_by('incomeDesc','ASC')->get('tblIncome')->result_array();
		else:
			return $this->db->order_by('incomeDesc','ASC')->get_where('tblIncome', array('incomeCode' => $code))->result_array();
		endif;
	}

	function getDataByType($type='')
	{
		return $this->db->order_by('incomeDesc','ASC')->get_where('tblIncome', array('incomeType' => $type, 'hidden' => 0))->result_array();
	}

	function getIncome($status='')
	{
		if($status==''):
			return $this->db->order_by('incomeCode','ASC')->get('tblIncome')->result_array();
		else:
			return $this->db->get_where('tblIncome', array('hidden' => $status))->result_array();
		endif;
	}

	function getIncomeData($code)
	{
		$result = $this->db->get_where('tblIncome', array('incomeCode' => $code))->result_array();
		return $result[0];
	}
	
	function isCodeExists($code, $action)
	{
		$result = $this->db->get_where('tblIncome', array('incomeCode' => $code))->result_array();
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

	function currentIncome_data($empnumber)
	{
		$income_data = $this->db->select_max('incomeYear')->select_max('incomeMonth')->get('tblEmpBenefits')->result_array();
		$res = $this->db->get_where('tblEmpBenefits',array('empNumber' => $empnumber, 'incomeMonth' => $income_data[0]['incomeMonth'], 'incomeYear' => $income_data[0]['incomeYear']))->result_array();
		return $res;
	}
		
}
/* End of file Income_model.php */
/* Location: ./application/modules/finance/models/Income_model.php */