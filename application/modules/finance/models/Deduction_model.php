<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Deduction_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblDeduction', $arrData);
		return $this->db->insert_id();
	}

	function addAgency($arrData)
	{
		$this->db->insert('tblDeductionGroup', $arrData);
		return $this->db->insert_id();
	}

	function edit_empdeduction($arrData, $code)
	{
		$this->db->where('deductCode',$code);
		$this->db->update('tblEmpDeductions', $arrData);
		return $this->db->affected_rows();
	}

	function edit($arrData, $code)
	{
		$this->db->where('deductionCode',$code);
		$this->db->update('tblDeduction', $arrData);
		return $this->db->affected_rows();
	}

	public function delete($tab, $code)
	{
		if($tab == 1):
			$this->db->where('deductionCode', $code);
			$this->db->delete('tblDeduction');	
		else:
			$this->db->where('deductionGroupCode', $code);
			$this->db->delete('tblDeductionGroup');	
		endif;
		return $this->db->affected_rows(); 
	}

	function edit_agency($arrData, $code)
	{
		$this->db->where('deductionGroupCode',$code);
		$this->db->update('tblDeductionGroup', $arrData);
		return $this->db->affected_rows();
	}

	function getDeductionsByStatus($status='')
	{
		if($status==''):
			return $this->db->order_by('deductionGroupCode, deductionDesc')->get('tblDeduction')->result_array();
		else:
			return $this->db->get_where('tblDeduction', array('hidden' => $status))->result_array();
		endif;
	}

	function getDeductionsByType($type)
	{
		$this->db->order_by('deductionDesc');
		return $this->db->get_where('tblDeduction', array('deductionType' => $type,'hidden' => 0))->result_array();
	}

	function getDeductionGroup($groupCode='')
	{
		if($groupCode==''):
			return $this->db->order_by('deductionGroupCode','ASC')->get('tblDeductionGroup')->result_array();
		else:
			$result = $this->db->get_where('tblDeductionGroup', array('deductionGroupCode' => $groupCode))->result_array();
			return $result[0];
		endif;
	}

	function getDeductions($code='',$select='deductionCode')
	{
		if($code==''):
			return $this->db->select($select)->order_by('deductionDesc')->get('tblDeduction')->result_array();
		else:
			$result = $this->db->get_where('tblDeduction', array('deductionCode' => $code))->result_array();
			return $result[0];
		endif;
	}
	
	function isDeductionCodeExists($code, $action)
	{
		$result = $this->db->get_where('tblDeduction', array('deductionCode' => $code))->result_array();
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
		$result = $this->db->get_where('tblDeductionGroup', array('deductionGroupCode' => $code))->result_array();
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

	function getMaturingLoans($month, $yr)
	{
		$strSQL = "SELECT *, IFNULL((SELECT SUM(deductAmount)
						FROM tblEmpDeductionRemit
						WHERE tblEmpDeductionRemit.code=tblEmpDeductions.deductCode),0)  AS total_remit
							FROM tblEmpDeductions 
							LEFT JOIN tblDeduction ON tblDeduction.deductionCode = tblEmpDeductions.deductionCode 
							LEFT JOIN tblEmpPersonal on tblEmpDeductions.empNumber = tblEmpPersonal.empNumber 
								WHERE actualEndMonth='$month' AND actualEndYear='$yr' AND status='1' AND deductionType='Loan'";

		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();
	}

	function getAgencyDeductionShare()
	{
		$res = $this->db->get_where('tblAgency')->result_array();
		return $res[0];
	}

	function getEmployee_regular_deduction($empid)
	{
		$regular_deductions = $this->getDeductionsByType('Regular');
		$this->db->order_by('deductionCode');
		$this->db->where_in('deductionCode',array_column($regular_deductions,'deductionCode'));
		$res = $this->db->get_where('tblEmpDeductions', array('empNumber' => $empid))->result_array();
		echo $this->db->last_query();
		return $res;
	}

	function getDeductionByEmployee($empid,$mon,$yr)
	{
		$totaldays = cal_days_in_month(CAL_GREGORIAN, $mon, $yr);

		$this->db->order_by('deductionCode');
		$this->db->where("(STR_TO_DATE(CONCAT(actualStartYear,'-',actualStartMonth,'-01'), '%Y-%m-%d') <= '".$yr."-".$mon."-01')");
		$this->db->where("(STR_TO_DATE(CONCAT(actualEndYear,'-',actualEndMonth,'-".$totaldays."'), '%Y-%m-%d') >= '".$yr."-".$mon."-01')");

		$res = $this->db->get_where('tblEmpDeductions', array('empNumber' => $empid))->result_array();
		return $res;
	}


}
/* End of file Deduction_model.php */
/* Location: ./application/modules/finance/models/Deduction_model.php */