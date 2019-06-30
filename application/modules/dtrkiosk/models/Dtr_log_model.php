<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dtr_log_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();
		$this->load->model(array('hr/Attendance_summary_model'));
	}
	
	function chekdtr_log($empid,$dtrdate,$dtrlog)
	{
		# initialization
		$err_message = array();
		$is_strict = 1;
		$has_30mins_allow = 1;
		$nn_out_from = '';$nn_out_to = '';$nn_in_from = '';$nn_in_to = '';
		$dtrid = '';$am_timein = '';$am_timeout = '';$pm_timein = '';$pm_timeout = '';$ot_timein = '';$ot_timeout = '';

		$arrdtr = array();
		$empdtr = $this->Attendance_summary_model->getcurrent_dtr($empid);
		$emp_att_scheme = $this->get_employee_attscheme($empid);
		if(!empty($emp_att_scheme)):
			# initializing employee attendance scheme
			$nn_out_from = $emp_att_scheme['nnTimeoutFrom'];
			$nn_out_to = $emp_att_scheme['nnTimeoutTo'];
			$nn_in_from = $emp_att_scheme['nnTimeinFrom'];
			$nn_in_to = $emp_att_scheme['nnTimeinTo'];
		else:
			return array();
		endif;

		echo '<br>nn_out_from : '.$nn_out_from;
		echo '<br>nn_out_to : '.$nn_out_to;
		echo '<br>nn_in_from : '.$nn_in_from;
		echo '<br>nn_in_to : '.$nn_in_to;
		echo '<br>Empnumber : '.$empid;
		echo '<br>dtrdate : '.$dtrdate;
		echo '<br>dtrlog : '.$dtrlog;
		
		# check if dtr is empty
		if(empty($empdtr)):
			# check if dtrlog < morning out
			if($dtrlog < $nn_out_from):
				# if true, set to inAM
				$am_timein = $dtrlog;
			else:
				# if false, set to inPM
				$pm_timein = $dtrlog;
			endif;
		else:
			# if employee has already dtr log
			echo '<br>';
			print_r($empdtr);
			$dtrid = $empdtr['id'];
			$am_timein  = $empdtr['inAM']  == '00:00:00' ? '' : $empdtr['inAM'];
			$am_timeout = $empdtr['outAM'] == '00:00:00' ? '' : $empdtr['outAM'];
			$pm_timein  = $empdtr['inPM']  == '00:00:00' ? '' : $empdtr['inPM'];
			$pm_timeout = $empdtr['outPM'] == '00:00:00' ? '' : $empdtr['outPM'];
			$ot_timein  = $empdtr['inOT']  == '00:00:00' ? '' : $empdtr['inOT'];
			$ot_timeout = $empdtr['outOT'] == '00:00:00' ? '' : $empdtr['outOT'];

			# check if dtrlog < morning out
			if(strtotime($dtrlog) < strtotime($nn_out_from)):
				# if true, check if strict;
				if($is_strict):
					# if yes, check if am_timein is empty
					if($am_timein != ''):
						# if not empty, employee may try am_timeout, but the condition is strictly dont allow that
						$err_message = array('strErrorMsg','You are not allow to logout! Lunch break is between '.$nn_out_from.' and '.$nn_in_to.'. Please contact administrator.');
					else:
						# if empty, set am_timein
						$am_timein = $dtrlog;
					endif;
				else:
					# if no, check if am_timein is empty
					if($am_timein != ''):
						# if not empty, check if am_timeout is empty
						if($am_timeout != ''):
							# if not empty, set pm_timein
							$pm_timein = $dtrlog;
						else:
							# if empty, set am_timeout
							$am_timeout = $dtrlog;
						endif;
					else:
						# if empty, set am_timein
						$am_timein = $dtrlog;
					endif;
				endif;
			else:
				echo 'check lunchbreak<br>';
				# if false, process for [LUNCH BREAK]
				# check if lunch break is not broken (for 30 mins allowance purposes)
				if($nn_out_from == $nn_in_from && $nn_out_to == $nn_in_to):
					echo 'attendance scheme is not broken<br>';
					# if lunchbreak is not broken, check if dtrlog is between lunch break
					if(strtotime($nn_in_to) > strtotime($dtrlog) && strtotime($nn_out_from) < strtotime($dtrlog)):
						# check if am_timein is empty, set to am_timein
						if($am_timein == ''):
							$am_timein = $dtrlog;
						else:
							# check if am_timeout is empty, then set to am_timeout if yes
							if($am_timeout == ''):
								### == > PROCESS D
								echo 'PROCESS D';
								$process_data  = $this->set_am_timeout($dtrlog,$empdtr,$has_30mins_allow,$is_strict,$nn_out_from,$nn_out_to,$nn_in_from,$nn_in_to);
								if(!empty($process_data)):
									$am_timeout  = $process_data['am_timeout'];
									$err_message = $process_data['err_message'];
								endif;
							else:
								# check if with 30 mins allowance
								if($has_30mins_allow):
									# if yes, check if am_timeout + 30 mins is equal to dtrlog
									if(strtotime($dtrlog) >= date('H:i', strtotime('+30 minutes', strtotime($am_timeout)))):
										# if yes, set pm_timein
										$pm_timein = $dtrlog;
									else:
										# otherwise, employee not allow to login, need to wait for 30 mins
										$err_message = array('strErrorMsg','You are not allow to login! Your logout time should be on '.(date('H:i', strtotime('+30 minutes', strtotime($am_timeout)))).'. Please contact administrator.');
									endif;
								else:
									# if no, set pm_timein
									$pm_timein = $dtrlog;
								endif;
							endif;
						endif;
					else:
						#### ==> PROCESS A
						echo 'PROCESS A';
						$process_data  = $this->set_pm_timeout($dtrlog,$empdtr,$has_30mins_allow,$nn_out_from,$nn_out_to,$nn_in_from,$nn_in_to);
						if(!empty($process_data)):
							$pm_timein  = $process_data['pm_timein'];
							$err_message = $process_data['err_message'];
						endif;
					endif;
				else:
					echo 'attendance scheme is broken<br>';
					# if not equal;
					echo 'PROCESS C';
					#### ==> PROCESS C
				endif;
			endif;

		endif;

		$arrdtr = array('empNumber' => $empid, 'dtrDate' => $dtrdate, 'inAM' => $am_timein, 'outAM' => $am_timeout, 'inPM' => $pm_timein, 'outPM' => $pm_timeout, 'inOT' => $ot_timein, 'outOT' => $ot_timeout);

		# insert/update tblEmpDtr
		echo '<hr>';print_r($arrdtr);
		echo '<br>dtrid = '.$dtrid;
		
		echo '<br>';
		if($dtrid==''):
			echo 'insert';
			$this->Attendance_summary_model->add_dtr($arrdtr);
		else:
			if(empty($err_message)):
				echo 'update';
				$this->Attendance_summary_model->edit_dtr($arrdtr, $dtrid);
			else:
				echo '<br>message = ';print_r($err_message);
			endif;
		endif;
	}

	function set_pm_timeout($dtrlog,$empdtr,$has_30mins_allow,$nn_out_from,$nn_out_to,$nn_in_from,$nn_in_to)
	{
		$pm_timein = '';
		$err_message = array();
		if($dtrlog > $nn_in_to):
		else:
		endif;
	}

	function set_am_timeout($dtrlog,$empdtr,$has_30mins_allow,$is_strict,$nn_out_from,$nn_out_to,$nn_in_from,$nn_in_to)
	{
		$am_timeout = '';
		$err_message = array();
		# check if has 30 mins allowance
		if($has_30mins_allow):
			# if logdtr + 30 mins is > last nn break time out
			if(date('H:i', strtotime('+30 minutes', strtotime($dtrlog))) > $nn_in_to):
				# if yes, check if strict;
				if($is_strict):
					# if yes, employee not allow to logout for morning, pm time in will be beyond the last nn break time out
					$err_message = array('strErrorMsg','You are not allow to logout for or login from lunch break! Please contact administrator.');
				else:
					$am_timeout = $dtrlog;
				endif;
			else:
				$am_timeout = $dtrlog;
			endif;
		else:
			$am_timeout = $dtrlog;
		endif;

		return array('err_message' => $err_message, 'am_timeout' => $am_timeout);
	}

	function get_employee_attscheme($empid)
	{
		$res = $this->db->join('tblAttendanceScheme', 'tblAttendanceScheme.schemeCode = tblEmpPosition.schemeCode')
						->get_where('tblEmpPosition', array('empNumber' => $empid))->result_array();

		return count($res) > 0 ? $res[0] : array();
	}


}
