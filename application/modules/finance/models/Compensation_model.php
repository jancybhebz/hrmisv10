<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Compensation_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblPayrollGroup', $arrData);
		return $this->db->insert_id();
	}

	function editEmpPosition($arrData, $empid, $acctNumber='')
	{
		$this->db->where('empNumber',$empid);
		$this->db->update('tblEmpPosition', $arrData);

		if($acctNumber != ''):
			$this->db->where('empNumber',$empid);
			$this->db->update('tblEmpPersonal', array('AccountNum' => $acctNumber));
		endif;

		return $this->db->affected_rows();
	}

	function getLongevity($empid='')
	{
		return $this->db->get_where('tblEmpLongevity', array('empNumber' => $empid))->result_array();
	}

	function addLongevity($arrData)
	{
		$this->db->insert('tblEmpLongevity', $arrData);
		return $this->db->insert_id();
	}

	function editLongevity($arrData, $empid, $id)
	{
		$this->db->where('id',$id);
		$this->db->where('empNumber',$empid);
		$this->db->update('tblEmpLongevity', $arrData);
		return $this->db->affected_rows();
	}

	public function delLongevity($empid, $id)
	{
		$this->db->where('id',$id);
		$this->db->where('empNumber',$empid);
		$this->db->delete('tblEmpLongevity');
		return $this->db->affected_rows(); 
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

	function getEmployeeDeduction($empid, $yr, $mon)
	{
		return $this->db->join('tblDeduction', 'tblEmpDeductionRemit.deductionCode = tblDeduction.deductionCode', 'left')
					->group_by('tblDeduction.deductionCode')
					->where('empNumber',$empid)
					->where('hidden',0)
					->where('deductYear',$yr)
					->where('deductMonth',$mon)
					->get('tblEmpDeductionRemit')->result_array();
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

	function getEmployeeShare($empid, $contriCode)
	{
		return $this->db->join('tblEmpPosition', 'tblEmpPosition.empNumber = tblEmpDeductions.empNumber', 'left')
					->where('tblEmpDeductions.empNumber',$empid)
					->where("(appointmentCode='P' OR appointmentCode='CT' OR appointmentCode='CTI')")
					->where('deductionCode', $contriCode)
					->where('status', 1)
					->get('tblEmpDeductions')->result_array();
	}

	function getLifeRetirement($switch, $salary, $empShare, $emprShare, $empid)
	{
		if($switch == 'Y'):
			$liferetirement = $this->getEmployeeShare($empid, 'LIFE');
			if(count($liferetirement) > 0):
				$gsisContri = $this->db->get('tblAgency')->result_array();
				$empShare = $salary * ($gsisContri[0]['gsisEmpShare'] / 100);
				$emprShare = $salary * ($gsisContri[0]['gsisEmprShare'] / 100);
			else:
				$empShare = 0;
				$emprShare = 0;
			endif;
		else:
			$empShare = 0;
			$emprShare = 0;
		endif;
		return array('empShare' => $empShare, 'emprShare' => $emprShare);
	}
	
	function getPagibig($switch, $salary, $empShare, $emprShare, $empid)
	{
		if($switch == 'Y'):
			$pagibig = $this->getEmployeeShare($empid, 'PAGIBIG');
			if(count($pagibig) > 0):
				$pagibigContri = $this->db->get('tblAgency')->result_array();
				$emprShare = $pagibigContri[0]['pagibigEmprShare'];
			else:
				$emprShare = 0;
			endif;
		else:
			$emprShare = 0;
		endif;

		$pagibigEmpContri = $this->db->get_where('tblEmpDeductions', array('empNumber' => $empid, 'deductionCode' => 'PAGIBIG', 'status' => '1'))->result_array();
		if(count($pagibigEmpContri) > 0):
			$empShare = $pagibigEmpContri[0]['monthly'];
		else:
			$empShare = 0;
		endif;
		return array('empShare' => $empShare, 'emprShare' => $emprShare);
	}
	
	function getPhilhealth($switch, $salary, $empShare, $emprShare, $empid)
	{
		if($switch == 'Y'):
			$phealth = $this->getEmployeeShare($empid, 'PHILHEALTH');
			if(count($phealth) > 0):
				$philhealthcont = $this->db->get('tblAgency')->result_array();
				// $empShareContri = $philhealthcont[0]['philhealthEmpShare'] / 100;
				$emprShareContri = $philhealthcont[0]['philhealthEmprShare'] / 100;
				
				$philhealthcont = $this->db->get_where('tblPhilhealthRange', array('philhealthTo>=' => $salary, 'philhealthFrom<=' => $salary))->result_array();
				$empContri = $philhealthcont[0]['philMonthlyContri'];
					
				// $empShare = $empContri * $empShareContri;
				$emprShare = $empContri * $emprShareContri;
			else:
				// $empShare = 0;
				$emprShare = 0;
			endif;
		else:
			$emprShare = 0;
		endif;

		$philhealthcont = $this->db->get_where('tblEmpDeductions', array('empNumber' => $empid, 'deductionCode' => 'PHILHEALTH', 'status' => '1'))->result_array();
		if(count($philhealthcont) > 0):
			$empShare = $philhealthcont[0]['monthly'];
		else:
			$empShare = 0;
		endif;
		return array('empShare' => $empShare, 'emprShare' => $emprShare);
	}

	function getITW($empid)
	{
		$res = $this->db->get_where('tblEmpDeductions', array('empNumber' => $empid, 'deductionCode' => 'ITW'))->result_array();
		return $res[0]['period1'] + $res[0]['period2'] + $res[0]['period3'] + $res[0]['period4'];
	}

	function getLoans($empid)
	{
		$sql = "SELECT tblEmpDeductions.deductionCode, deductionDesc, tblEmpDeductions.deductCode as loanCode,
					amountGranted, period1+period2+period3+period4 AS deductAmount, actualEndMonth, actualEndYear,
					IFNULL((SELECT SUM(deductAmount) FROM tblEmpDeductionRemit WHERE tblEmpDeductionRemit.code=tblEmpDeductions.deductCode),0)  AS total_remit
					FROM tblEmpDeductions
						LEFT JOIN tblDeduction on tblDeduction.deductionCode = tblEmpDeductions.deductionCode
						WHERE empNumber='$empid' 
						AND tblEmpDeductions.deductionCode IN (
							SELECT tblDeduction.deductionCode FROM tblDeduction WHERE deductionType='Loan')
						AND status=1 ORDER BY tblEmpDeductions.deductionCode";

		return $this->db->query($sql)->result_array();
	}

	function getContributions($empid)
	{
		$sql = "SELECT tblDeduction.deductionDesc, tblEmpDeductions.deductionCode, deductCode AS contriCode, period1+period2+period3+period4 AS deductAmount
					FROM tblEmpDeductions
                    LEFT JOIN tbldeduction on tblDeduction.deductionCode = tblEmpDeductions.deductionCode
					WHERE empNumber='$empid'
					AND status=1 AND tblEmpDeductions.deductionCode IN (
						SELECT tblDeduction.deductionCode FROM tblDeduction 
						WHERE deductionType='Contribution' OR deductionType='Others')
					ORDER BY tblEmpDeductions.deductionCode";

		return $this->db->query($sql)->result_array();
	}

	function getFinishedLoans($empid)
	{
		$sql = "SELECT tblDeduction.deductionDesc, deductCode, tblDeduction.deductionCode, deductCode as loanCode, amountGranted, period1+period2+period3+period4 AS deductAmount
					FROM tblEmpDeductions
					LEFT JOIN tbldeduction on tblDeduction.deductionCode = tblEmpDeductions.deductionCode
					WHERE empNumber='$empid' AND tblDeduction.deductionCode IN (
						SELECT tblDeduction.deductionCode FROM tblDeduction WHERE deductionType='Loan')
					AND status=0 ORDER BY tblDeduction.deductionCode";

		return $this->db->query($sql)->result_array();
	}

	function getPremiumDeduction($empid, $deductionType)
	{
		$sql = "SELECT tblDeduction.`deductionCode`, `amountGranted`,`annual`,`deductionDesc`, `monthly`,`period1`,`period2`,`period3`,`period4`, empNumber, tblDeduction.`deductionType`, `deductCode`,`status`, tblDeduction2.deductCode
					FROM (SELECT * FROM tblEmpDeductions WHERE empNumber='$empid') AS tblDeduction2
					RIGHT JOIN tblDeduction ON   tblDeduction2.deductionCode =tblDeduction.deductionCode  WHERE deductionType='$deductionType' AND hidden='0' 
					ORDER BY status desc, deductionDesc ASC";

		return $this->db->query($sql)->result_array();
	}

	function getPremiumContribution($empid, $deductionType)
	{
		$sql = "SELECT tblDeduction.`deductionCode`, `amountGranted`,`annual`,`deductionDesc`, `monthly`,`period1`,`period2`,`period3`,`period4`, empNumber, tblDeduction.`deductionType`, `deductCode`,`status`
					FROM (SELECT * FROM tblEmpDeductions WHERE empNumber='$empid') AS tblDeduction2
					RIGHT JOIN tblDeduction ON   tblDeduction2.deductionCode =tblDeduction.deductionCode
						WHERE (deductionType='$deductionType' OR deductionType='Others')AND hidden='0' ORDER BY deductionDesc ASC";
		return $this->db->query($sql)->result_array();
	}

	public function getDeduction($empid, $deductionCode)
	{
		return $this->db->get_where('tblempdeductions', array('empNumber' => $empid, 'deductionCode' => $deductionCode))->result_array();
	}

	function editDeduction($arrData, $id, $empid)
	{
		$this->db->where('deductCode',$id);
		$this->db->where('empNumber',$empid);
		$this->db->update('tblempdeductions', $arrData);

		return $this->db->affected_rows();
	}

	function addDeduction($arrData)
	{
		$this->db->insert('tblempdeductions', $arrData);
		return $this->db->insert_id();
	}

	// public function delete($code)
	// {
	// 	$this->db->where('payrollGroupCode', $code);
	// 	$this->db->delete('tblPayrollGroup');
	// 	return $this->db->affected_rows(); 
	// }

	// function getData($code)
	// {
	// 	if($code==''):
	// 		return $this->db->join('tblProject', 'tblProject.projectCode = tblPayrollGroup.projectCode', 'left')->order_by('payrollGroupCode','ASC')->get('tblPayrollGroup')->result_array();
	// 	else:
	// 		$result = $this->db->get_where('tblPayrollGroup', array('payrollGroupCode' => $code))->result_array();
	// 		return $result[0];
	// 	endif;
	// }

	// function getPayrollGroupCode()
	// {
	// 	return $this->db->select('payrollGroupCode')->from('tblPayrollGroup')->get()->result_array();
	// }
	
	// function isCodeExists($code, $action)
	// {
	// 	$result = $this->db->get_where('tblPayrollGroup', array('payrollGroupCode' => $code))->result_array();
	// 	if($action == 'add'):
	// 		if(count($result) > 0):
	// 			return true;
	// 		endif;
	// 	else:
	// 		if(count($result) > 1):
	// 			return true;
	// 		endif;
	// 	endif;
	// 	return false;
	// }
		
}
/* End of file ProjectCode_model.php */
/* Location: ./application/modules/finance/models/Compensation_model.php */