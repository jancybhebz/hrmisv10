<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payrollupdate_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getPayrollUpdate($type)
	{
		// $employment, $month, $year, $period, 
		// $whereType = $type=='Additional' ? "(incomeType='Additional' OR incomeType='Monthly')" : "incomeType='$type'";

		// $strSQL = "SELECT * FROM tblIncome 
		// 			WHERE incomeCode NOT IN (
		// 				SELECT DISTINCT tblEmpIncome.incomeCode 
		// 				FROM tblEmpIncome LEFT JOIN tblProcess ON tblProcess.processID = tblEmpIncome.processID
		// 					WHERE tblProcess.processMonth='$month' AND processYear='$year' AND employeeAppoint = '$employment')
		// 			AND $whereType AND hidden='0'";

		// $objQuery = $this->db->query($strSQL);
		// return $objQuery->result_array();

		return $this->db->get_where('tblIncome', array('incomeType' => $type, 'hidden' => 0))->result_array();
		// echo $this->db->last_query();
	}



}
/* End of file Payrollupdate_model.php */
/* Location: ./application/modules/finance/models/Payrollupdate_model.php */



