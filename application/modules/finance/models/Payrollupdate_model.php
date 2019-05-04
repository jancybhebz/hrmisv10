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

	// function compute_benefits($arrPost, $process_data)
	// {
	// 	$this->load->helper(array('payroll_helper','dtr_helper'));

	// 	// $process_employees = $this->Payroll_process_model->getEmployees($process_data['selemployment'],$process_data['data_fr_yr'],$process_data['data_fr_mon']);
	// 	$this->check_employee_dtr($process_data);
	// 	die();
	// 	$total_workingdays = $this->Attendance_summary_model->getemp_dtr('',$process_data['mon'],$process_data['yr']);
	// 	$total_workingdays = $total_workingdays['total_workingdays'];
		
	// 	$arrEmployees = array();
	// 	$total_empnolb = 0;
	// 	foreach($process_employees as $emp):
	// 		$emp_dtr = $this->Attendance_summary_model->getemp_dtr($emp['empNumber'],$process_data['data_fr_mon'],$process_data['data_fr_yr']);
	// 		$emp_leavebal = $this->Leave_model->getEmpLeave_balance($emp['empNumber'],$process_data['data_fr_mon'],$process_data['data_fr_yr']);
	// 		$absents = count($emp_dtr['date_absents']);
	// 		$presents = $total_workingdays - $absents;
	// 		$hpfactor = hpfactor($presents, $emp['hpFactor']);
	// 		// $arrEmployees[]
	// 		if(count($emp_leavebal) < 1):
	// 			$total_empnolb = $total_empnolb + 1;
	// 		endif;

	// 		$arrEmployees[] = array( 'emp_detail' 			=> $emp,
	// 								 'date_absents' 		=> $absents,
	// 								 'actual_days_present' 	=> $emp_dtr['total_days_present'],
	// 								 'hp' 					=> $emp['actualSalary'] * $hpfactor,
	// 								 'leave_bal' 			=> $emp_leavebal,
	// 								 'actual_present'		=> $presents);
	// 		print_r($empdd);
	// 		echo '<hr>';
	// 	endforeach;
	// 	return array('employees' => $arrEmployees, 'total_workingdays' => $total_workingdays, 'total_empnolb' => $total_empnolb);
	// }

	function compute_benefits($arrPost, $process_data,$empid='')
	{
		$this->load->helper(array('payroll_helper','dtr_helper'));
		$this->load->model('Dtr_model');

		$month = sprintf('%02d', $process_data['data_fr_mon']);
		$yr = $process_data['data_fr_yr'];

		$datefrom = implode('-',array($yr,$month,'01'));
		$dateto = implode('-',array($yr,$month,cal_days_in_month(CAL_GREGORIAN,$month,$yr)));
		// $arrholidays = array();
		
		// foreach($holidays as $hday):
		// 	if(!in_array(date('D', strtotime($hday['holidayDate'])), array('Sat','Sun'))){
		// 		array_push($arrholidays,$hday['holidayDate']); }
		// endforeach;

		# current period working days
		$curr_holidays = $this->Dtr_model->getHoliday($process_data['yr'].'-'.sprintf('%02d', $process_data['mon']).'-',1);
		$curr_workingdays = get_workingdays(sprintf('%02d', $process_data['mon']),$process_data['yr'],$curr_holidays);

		# process data working days
		$holidays = $this->Dtr_model->getHoliday($yr.'-'.$month.'-',1);
		$workingdays = get_workingdays($month,$yr,$holidays);

		// echo 'working days :<br>';
		// print_r($workingdays);
		// echo '<br>';
		$no_empty_lb = 0;
		$arremployees = array();
		$emp_leavebal = $this->Leave_model->getEmpLeave_balance('',$month,$yr);
		$process_employees = $this->Payroll_process_model->getEmployees($process_data['selemployment'],$yr,$month,$empid);
		foreach($process_employees as $emp):
			$empdtr = $this->Dtr_model->getData($emp['empNumber'],$yr,$month);
			$empdays_present = array_column($empdtr, 'dtrDate', 'id');
			// print_r($empdays_present);

			$actual_present = array_intersect($empdays_present,$workingdays);
			// print_r($actual_present);
			$actual_presents =  0;
			$date_presents = array();
			foreach($actual_present as $key => $att):
				// echo 'key '.$key.' val '.$att;
				// print_r($empdtr[$key]);
				$emp_att = $empdtr[array_search($key, array_column($empdtr, 'id'))];
				$dtr_empty = count(array_keys(array($emp_att['inAM'],$emp_att['outAM'],$emp_att['inPM'],$emp_att['outPM']), '00:00:00'));
				if($dtr_empty < 4):
					$actual_presents++;
					array_push($date_presents,$emp_att['dtrDate']);
				endif;
				// echo '<br>';
			endforeach;

			# check if on OB
			$obdates = $this->Dtr_model->getemp_obdates($emp['empNumber'],$datefrom,$dateto,1);
			// $obs = array_intersect($workingdays,$obdates);
			# check all obdates not present in empdays_present
			// print_r($obdates);
			// print_r($date_presents);
			$allobs = array_intersect($date_presents,$obdates);
			$obs = array_diff($obdates,$allobs);
			// print_r($allobs);
			// print_r($obs);
			// // $ctrob = 0;
			// // print_r(array_intersect($empdays_present,$obdates));
			// // if(count(array_intersect($empdays_present,$obdates)) < 1):

			// // else:

			// // endif;
			$actual_presents = $actual_presents + count($obs);

			# check if on TO
			$todates = $this->Dtr_model->getemp_todates($emp['empNumber'],$datefrom,$dateto,1);
			// print_r($todates);
			$alltos = array_intersect($date_presents,$todates);
			// print_r($todates);

			// print_r($alltos);

			// print_r($empdays_present);
			$tos = array_diff($todates,$alltos);
			// print_r($tos);
			// echo 'tos: ';
			// print_r(count($tos));
			// echo '<br>';
			$actual_presents = $actual_presents + count($tos);

			$emp_lb = $emp_leavebal[array_search($emp['empNumber'], array_column($emp_leavebal, 'empNumber'))];
			if(count($emp_lb) < 1):
				$no_empty_lb = $no_empty_lb + 1;
			endif;
			// $actual_presents = 0;
			// $date_presents = array();
			// foreach($empdtr as $dtr):
				// print_r($dtr);
			// 	if(!in_array($dtr['dtrDate'],$arrholidays)):
					// $dtr_empty = count(array_keys(array($dtr['inAM'],$dtr['outAM'],$dtr['inPM'],$dtr['outPM']), '00:00:00'));
					// if($dtr_empty < 4):
					// 	$actual_presents++;
					// 	array_push($date_presents,$dtr['dtrDate']);
					// endif;
			// 	endif;
			// 	echo '<br>';
			// endforeach;
			// print_r($date_presents);
			// echo 'presents '.$actual_presents;
			// // foreach(range(1, cal_days_in_month(CAL_GREGORIAN, $process_data['data_fr_mon'], $process_data['data_fr_yr'])) as $day):
			// // 	echo '<br>';
			// // 	print_r($day);
			// // endforeach;
			// echo '<hr>';
			$hpfactor = hpfactor($actual_presents, $emp['hpFactor']);
			$hpfactor = $emp['actualSalary'] * $hpfactor;
			$arremployees[] = array( 'emp_detail' 			=> $emp,
									 'actual_days_present' 	=> $actual_presents,
									 'actual_days_absent' 	=> count($workingdays) - $actual_presents,
									 'hp' 					=> $hpfactor,
									 'emp_leavebal'			=> $emp_lb);
			// print_r(array( 'emp_detail' 			=> $emp,
			// 						 'actual_days_present' 	=> $actual_presents,
			// 						 'actual_days_absent' 	=> count($workingdays) - $actual_presents,
			// 						 'hp' 					=> $hpfactor,
			// 						 'emp_leavebal'			=> $emp_lb));
		endforeach;
		return array('arremployees' => $arremployees, 'workingdays' => count($workingdays), 'curr_workingdays' => count($curr_workingdays), 'no_empty_lb' => $no_empty_lb);
	}


}
/* End of file Payrollupdate_model.php */
/* Location: ./application/modules/finance/models/Payrollupdate_model.php */



