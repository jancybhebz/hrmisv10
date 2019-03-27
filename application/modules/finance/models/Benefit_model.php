<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Benefit_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblEmpBenefits', $arrData);
		return $this->db->insert_id();
	}

	function edit($arrData, $benefitcode)
	{
		$this->db->where('benefitCode',$benefitcode);
		$this->db->update('tblEmpBenefits', $arrData);
		return $this->db->affected_rows();
	}

	function editByFields($arrData, $arrwhere)
	{
		$this->db->where($arrwhere);
		$this->db->update('tblEmpBenefits', $arrData);
		return $this->db->affected_rows();
	}

	function getBenefits($empid='', $incomeCode='')
	{
		$arrWhere = $incomeCode!='' ? array('incomeCode' => $incomeCode, 'empNumber' => $empid) : array('empNumber' => $empid);
		return $this->db->get_where('tblEmpBenefits', $arrWhere)->result_array();
	}

	function getEmployeeBenefit($empid, $yr, $mon)
	{
		return $this->db->join('tblIncome', 'tblIncome.incomeCode = tblEmpIncome.incomeCode', 'left')
					->where('empNumber',$empid)
					->where('tblIncome.incomeType','Benefit')
					->where('hidden',0)
					->where('incomeYear',$yr)
					->where('incomeMonth',$mon)
					->get('tblEmpIncome')->result_array();
	}

	function getBenefitsfromArray($arrBenefits, $arrIncome)
	{
		foreach($arrIncome as $inc_id => $income):	
			$key = array_search($income['incomeCode'], array_column($arrBenefits, 'incomeCode'));
			if($key!=''):
				$arrIncome[$inc_id]['arrbenefits'] = $arrBenefits[$key];
			endif;
		endforeach;

		return $arrIncome;
	}
		
}
/* End of file Benefit_model.php */
/* Location: ./application/modules/finance/models/Benefit_model.php */