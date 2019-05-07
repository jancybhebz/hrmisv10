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
		$this->load->model(array('Dtr_model','Longevity_model','Rata_model','libraries/Attendance_scheme_model'));

		$month = sprintf('%02d', $process_data['data_fr_mon']);
		$yr = $process_data['data_fr_yr'];

		$datefrom = implode('-',array($yr,$month,'01'));
		$dateto = implode('-',array($yr,$month,cal_days_in_month(CAL_GREGORIAN,$month,$yr)));

		$arrrata = $this->Rata_model->getData();

		$att_schemes = $this->Attendance_scheme_model->getData();
		// $arrholidays = array();
		
		// foreach($holidays as $hday):
		// 	if(!in_array(date('D', strtotime($hday['holidayDate'])), array('Sat','Sun'))){
		// 		array_push($arrholidays,$hday['holidayDate']); }
		// endforeach;

		/** curr_workingdays = working days in the current period
		    workingdays = working days from process month/date */
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
			# employee attendance scheme
			$emp_att_scheme = $att_schemes[array_search($emp['schemeCode'], array_column($att_schemes, 'schemeCode'))];

			$empdtr = $this->Dtr_model->getData($emp['empNumber'],$yr,$month);
			$empdays_present = array_column($empdtr, 'dtrDate', 'id');
			// print_r($empdays_present);

			$actual_present = array_intersect($empdays_present,$workingdays);
			$total_late = 0;
			$total_ut = 0;
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
					# Lates
					$late = $this->Dtr_model->computeLate($emp_att_scheme, $emp_att);
					$total_late = $total_late + $late;
					# Undertimes
					$uts = $this->Dtr_model->computeUndertime($emp_att_scheme, $emp_att, $late);
					$total_ut = $total_ut + $uts;
					// print_r($uts);
					// echo '<hr>';
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
			// $actual_presents = $actual_presents + count($tos);
			// $actual_days_absent = count($workingdays) - $actual_presents;
			# current working days - days absent
			// $days_work = count($curr_workingdays) - $actual_days_absent;
			$emp_lb = $emp_leavebal[array_search($emp['empNumber'], array_column($emp_leavebal, 'empNumber'))];
			if(count($emp_lb) < 1):
				$no_empty_lb = $no_empty_lb + 1;
			endif;

			$lbkey = array_search($emp['empNumber'], array_column($emp_leavebal, 'empNumber'));
			$lb_details = is_numeric($lbkey) ? $emp_leavebal[$lbkey] : null;
			
			$emp_lb = array('ctr_8h' => $lb_details['ctr_8h'] == '' ? 0 : $lb_details['ctr_8h'],
							'ctr_6h' => $lb_details['ctr_6h'] == '' ? 0 : $lb_details['ctr_6h'],
							'ctr_5h' => $lb_details['ctr_5h'] == '' ? 0 : $lb_details['ctr_5h'],
							'ctr_4h' => $lb_details['ctr_4h'] == '' ? 0 : $lb_details['ctr_4h'],
							'ctr_diem' => $lb_details['ctr_diem'] == '' ? 0 : $lb_details['ctr_diem'],
							'ctr_laundry' => $lb_details['ctr_laundry'] == '' ? 0 : $lb_details['ctr_laundry'],
							'nodays_absent' => $lb_details['nodays_absent'] == '' ? 0 : $lb_details['nodays_absent']);
			$days_work = count($curr_workingdays) - $lb_details['nodays_absent'];
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
			$hpfactor = hpfactor($days_work, $emp['hpFactor']);
			$hpfactor = $emp['actualSalary'] * $hpfactor;
			$subsis = substistence(count($curr_workingdays), count($workingdays), $emp_lb);
			$laundry = laundry($emp_lb['ctr_laundry']);
			$longevity = $this->Longevity_model->getLongevitySum($emp['empNumber']);
			$rata = rata($arrrata, $days_work, count($curr_workingdays), $emp['RATACode'], $emp['RATAVehicle']);
			$total_income = $hpfactor + $subsis + $laundry + $longevity + $rata['ra_amount'] + $rata['ta_amount'] + AMT_PERA;

			$arremployees[] = array( 'emp_detail' 			=> $emp,
									 'actual_days_present' 	=> $actual_presents,
									 'actual_days_absent' 	=> $emp_lb['nodays_absent'],
									 'hp' 					=> $hpfactor,
									 'emp_leavebal'			=> $emp_lb,
									 'subsis'				=> isset($arrPost['chkbenefit']) ? in_array('SUBSIS', $arrPost['chkbenefit']) ? $subsis : 0 : 0,
									 'laundry'				=> $laundry,
									 'longevity'			=> $longevity,
									 'rata'					=> $rata,
									 'total_income'			=> $total_income,
									 'total_late'			=> $total_late,
									 'total_ut'				=> $total_ut);
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



