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

	function add_deduction_remit($arrData)
	{
		$this->db->insert('tblEmpDeductionRemit', $arrData);
		return $this->db->insert_id();
	}

	function add_emp_income($arrData)
	{
		$this->db->insert('tblEmpIncome', $arrData);
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

	function get_employee_income($empnumber,$income_code,$type='')
	{
		if($type!=''):
			if($type=='Others'):
				$this->db->where("(tblIncome.incomeType='Monthly' OR tblIncome.incomeType='Additional')");
			else:
				$this->db->where('incomeType',$type);
			endif;
		endif;
		$this->db->join('tblIncome', 'tblIncome.incomeCode = tblEmpBenefits.incomeCode', 'left');
		$this->db->where_in('tblEmpBenefits.incomeCode',$income_code);
		$res = $this->db->get_where('tblEmpBenefits',array('empNumber' => $empnumber,'status' => 1))->result_array();

		return $res;
	}

	function get_employee_deductions($empnumber,$deduct_code,$type='')
	{
		if($type!=''):
			if($type=='ot'):
				$this->db->where('tblDeduction.deductionType','Regular');
				$this->db->where("(tblEmpDeductions.deductionCode!='LIFE' AND tblEmpDeductions.deductionCode!='PHILHEALTH' AND tblEmpDeductions.deductionCode!='PAGIBIG' AND tblEmpDeductions.deductionCode!='LPTAX' AND tblEmpDeductions.deductionCode!='HPTAX')");
			else:
				$this->db->where('tblDeduction.deductionType',$type);
				if(count($deduct_code) > 0){
					$this->db->where_in('tblEmpDeductions.deductionCode',$deduct_code);
				}
			endif;
		else:
			if(count($deduct_code) > 0){
				$this->db->where_in('tblEmpDeductions.deductionCode',$deduct_code);
			}
		endif;
		$this->db->join('tblDeduction', 'tblEmpDeductions.deductionCode = tblDeduction.deductionCode', 'left');
		$res = $this->db->get_where('tblEmpDeductions',array('empNumber' => $empnumber,'status' => 1))->result_array();

		return $res;
	}

	function check_empdeductions($mon,$yr,$appt)
	{
		$res = $this->db->distinct()->select('tblEmpDeductionRemit.deductionCode')
						->join('tblProcess','tblProcess ON tblProcess.processID = tblEmpDeductionRemit.processID','left')
						->get_where('tblEmpDeductionRemit', array('tblProcess.processMonth' => $mon, 'processYear' => $yr, 'employeeAppoint' => $appt))
						->result_array();
		return $res;
	}

	function update_loan($mon,$yr)
	{
		$matured_loans = $this->db->join('tblEmpDeductionRemit','tblEmpDeductionRemit.code = tblEmpDeductions.deductCode','left')
								  ->join('tblDeduction','tblDeduction.deductionCode = tblEmpDeductions.deductionCode','left')
								  ->where("(tblDeduction.deductionType='Loan' OR tblDeduction.deductionType='Contribution')")
								  ->where('status!=',2)
								  ->get_where('tblEmpDeductions',array('tblEmpDeductions.actualEndMonth' => $mon, 'actualEndYear' => $yr))->result_array();
		
		foreach($matured_loans as $mloan):
			$this->db->where('deductCode', $mloan['deductCode'])->update('tblEmpDeductions', array('status' => 0));
		endforeach;

	}


		
}
/* End of file Income_model.php */
/* Location: ./application/modules/finance/models/Income_model.php */