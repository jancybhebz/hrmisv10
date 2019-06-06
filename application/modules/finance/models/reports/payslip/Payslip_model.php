<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payslip_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function income_list($empno, $yr, $month)
	{
		$this->db->order_by('incomeDesc', 'asc');
		$this->db->join('tblEmpIncome', 'tblIncome.incomeCode = tblEmpIncome.incomeCode', 'left');
		$this->db->where('tblEmpIncome.incomeCode !=','OT');
		$this->db->where('tblEmpIncome.incomeCode !=','SALARY');
		$res = $this->db->get_where('tblIncome', array('incomeType' => 'Benefit', 'empNumber' => $empno, 'incomeYear' => $yr, 'incomeMonth' => $month))->result_array();
		return $res;
	}

	function deduction_list($empno, $yr, $month)
	{
		$this->db->order_by('deductionDesc', 'asc');
		$this->db->join('tblDeduction', 'tblDeduction.deductionCode = tblEmpDeductionRemit.deductionCode', 'right');
		$this->db->where('tblEmpDeductionRemit.deductionCode !=','UNDABS');
		$res = $this->db->get_where('tblEmpDeductionRemit', array('empNumber' => $empno, 'deductYear' => $yr, 'deductMonth' => $month))->result_array();
		return $res;
	}

	function get_employee_salary($process_id, $empnumber)
	{
		$res = $this->db->get_where('tblEmpIncome', array('incomeCode' => 'SALARY', 'processID' => $process_id, 'empNumber' => $empnumber))->result_array();
		return count($res) > 0 ? $res[0] : null;
	}

	function get_employee_undabs($process_id, $empnumber)
	{
		$res = $this->db->get_where('tblEmpDeductionRemit', array('deductionCode' => 'UNDABS', 'processID' => $process_id, 'empNumber' => $empnumber))->result_array();
		return count($res) > 0 ? $res[0] : null;
	}

	function get_employee_overtime($process_id, $empnumber)
	{
		$res = $this->db->get_where('tblEmpIncome', array('incomeCode' => 'OT', 'processID' => $process_id, 'empNumber' => $empnumber))->result_array();
		return count($res) > 0 ? $res[0] : null;
	}



}