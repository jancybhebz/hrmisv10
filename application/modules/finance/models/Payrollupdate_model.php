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

	function compute_benefits($arrPost, $process_data)
	{
		$this->load->helper(array('payroll_helper','dtr_helper'));

		// $process_employees = $this->Payroll_process_model->getEmployees($process_data['selemployment'],$process_data['data_fr_yr'],$process_data['data_fr_mon']);
		$this->check_employee_dtr($process_data);
		die();
		$total_workingdays = $this->Attendance_summary_model->getemp_dtr('',$process_data['mon'],$process_data['yr']);
		$total_workingdays = $total_workingdays['total_workingdays'];
		
		$arrEmployees = array();
		$total_empnolb = 0;
		foreach($process_employees as $emp):
			$emp_dtr = $this->Attendance_summary_model->getemp_dtr($emp['empNumber'],$process_data['data_fr_mon'],$process_data['data_fr_yr']);
			$emp_leavebal = $this->Leave_model->getEmpLeave_balance($emp['empNumber'],$process_data['data_fr_mon'],$process_data['data_fr_yr']);
			$absents = count($emp_dtr['date_absents']);
			$presents = $total_workingdays - $absents;
			$hpfactor = hpfactor($presents, $emp['hpFactor']);
			// $arrEmployees[]
			if(count($emp_leavebal) < 1):
				$total_empnolb = $total_empnolb + 1;
			endif;

			$arrEmployees[] = array( 'emp_detail' 			=> $emp,
									 'date_absents' 		=> $absents,
									 'actual_days_present' 	=> $emp_dtr['total_days_present'],
									 'hp' 					=> $emp['actualSalary'] * $hpfactor,
									 'leave_bal' 			=> $emp_leavebal,
									 'actual_present'		=> $presents);
			print_r($empdd);
			echo '<hr>';
		endforeach;
		return array('employees' => $arrEmployees, 'total_workingdays' => $total_workingdays, 'total_empnolb' => $total_empnolb);
	}

	function check_employee_dtr($process_data)
	{
		$this->load->model('Dtr_model');

		$month = sprintf('%02d', $process_data['data_fr_mon']);
		$yr = $process_data['data_fr_yr'];

		$arrholidays = array();
		$holidays = $this->Dtr_model->getHoliday($yr.'-'.$month.'-',1);
		foreach($holidays as $hday):
			if(!in_array(date('D', strtotime($hday['holidayDate'])), array('Sat','Sun'))){
				array_push($arrholidays,$hday['holidayDate']); }
		endforeach;
		print_r($arrholidays);
		$process_employees = $this->Payroll_process_model->getEmployees($process_data['selemployment'],$yr,$month);
		foreach($process_employees as $emp):
			print_r($emp);
			$empdtr = $this->Dtr_model->getData($emp['empNumber'],$yr,$month);
			foreach($empdtr as $dtr):
				print_r($dtr);
				echo '<br>';
			endforeach;
			// foreach(range(1, cal_days_in_month(CAL_GREGORIAN, $process_data['data_fr_mon'], $process_data['data_fr_yr'])) as $day):
			// 	echo '<br>';
			// 	print_r($day);
			// endforeach;
			echo '<hr>';
		endforeach;
	}


}
/* End of file Payrollupdate_model.php */
/* Location: ./application/modules/finance/models/Payrollupdate_model.php */



