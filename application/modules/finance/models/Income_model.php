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
		$incomedate = $this->db->select_max('incomeYear')->select_max('incomeMonth')->get('tblEmpBenefits')->result_array();
		return $this->db->get_where('tblEmpBenefits',array('empNumber' => $empnumber, 'incomeMonth' => $incomedate[0]['incomeMonth'], 'incomeYear' => $incomedate[0]['incomeYear']))->result_array();
	}

	function setamount_benefits($arrbenefit,$empdetail,$proc_mon,$proc_yr,$income_data)
	{
		$amount = 0;
		$itw = 0;
		$period_amt = 0;
		# Get empdetails status and ITW
		#	Current income month and year
		print_r($income_data);
		switch ($arrbenefit['incomeCode']):
			case 'COMMA':
				$amount = 0; $itw = 0; break;
			case 'EME':
				$amount = 0; $itw = 0; break;
			case 'HAZARD':
				$amount = 0; $itw = 0; break;
			case 'LAUNDRY':
				$amount = 0; $itw = 0; break;
			case 'LONGI':
				$amount = 0; $itw = 0; break;
			case 'OT':
				$amount = 0; $itw = 0; break;
			case 'PERA':
				$amount = 0; $itw = 0; break;
			case 'RA':
				$amount = 0; $itw = 0; break;
			case 'RATA':
				$amount = 0; $itw = 0; break;
			case 'Reffund':
				$amount = 0; $itw = 0; break;
			case 'RefundSikat':
				$amount = 0; $itw = 0; break;
			case 'SUBSIS':
				$amount = 0; $itw = 0; break;
			case 'TA':
				$amount = 0; $itw = 0; break;
			case 'SALARY':
				$amt = $empdetail['period_salary']; $period_amt = fixFloat($empdetail['period_salary']) / count($total_periods); $itw = 0; break;
		endswitch;
		$arrData = array('empNumber' 	=> $empdetail['emp_detail']['empNumber'],
						 'incomeCode' 	=> $arrbenefit['incomeCode'],
						 'incomeMonth' 	=> $proc_mon,
						 'incomeYear'	=> $proc_yr,
						 'incomeAmount' => $amount,
						 'ITW' 			=> $itw,
						 'period1' 		=> $period_amt,
						 'period2' 		=> $period_amt,
						 'period3' 		=> $period_amt,
						 'period4' 		=> $period_amt);
		return $arrData;
	}
		
}
/* End of file Income_model.php */
/* Location: ./application/modules/finance/models/Income_model.php */