<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class AttendanceSummary_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function edit_dtr($arrData, $dtrid)
	{
		$this->db->where('id', $dtrid);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function add_dtr($arrData)
	{
		$this->db->insert('tblEmpDTR', $arrData);
		return $this->db->insert_id();		
	}

	public function getemp_dtr($empid, $month, $yr)
	{
		# DTR Data
		$this->db->order_by('dtrDate', 'asc');
		$this->db->where('empNumber', $empid);
		$this->db->like('dtrDate', $yr.'-'.$month, 'after');
		$arrData = $this->db->get('tblEmpDTR')->result_array();

		# Regular Holiday
		$this->db->join('tblHolidayYear','tblHolidayYear.holidayCode = tblHoliday.holidayCode','inner');
		$this->db->like('holidayDate', $yr.'-'.$month, 'after');
		$reg_holidays = $this->db->get('tblHoliday')->result_array();

		# Local Holiday
		$emplocholiday = $this->getLocalHolidays($empid,$month,$yr);

		# Local Holiday
		$arremp_leaves = array();
		$empleaves = $this->getleaves($empid);
		foreach($empleaves as $leave):
			$leavedate = $leave['leaveFrom'];
			$leave_to = $leave['leaveTo'];
			while (strtotime($leavedate) <= strtotime($leave_to))
			{
				$leavedatekey = array_search($leavedate, array_column($arremp_leaves, 'date'));
				$arrleavedata = array('leaveID'		  => $leave['leaveID'],
									  'dateFiled'	  => $leave['dateFiled'],
									  'date'		  => $leavedate,
									  'leaveCode'     => $leave['leaveCode'],
									  'specificLeave' => $leave['specificLeave'],
									  'reason'    	  => $leave['reason'],
									  'leaveFrom'     => $leave['leaveFrom'],
									  'leaveTo'		  => $leave['leaveTo'],
									  'certifyHR'     => $leave['certifyHR'],
									  'approveChief'  => $leave['approveChief'],
									  'approveRequest'=> $leave['approveRequest'],
									  'remarks'		  => $leave['remarks'],
									  'inoutpatient'  => $leave['inoutpatient'],
									  'vllocation'    => $leave['vllocation'],
									  'commutation'   => $leave['commutation'],
									  'leaveType'     => $leave['leaveType'],
									  'numOfDays'     => $leave['numOfDays'],
									  'system'    	  => $leave['system']);
				if(is_numeric($leavedatekey)):
					$arremp_leaves[$leavedatekey] = $arrleavedata;
				else:
					$arremp_leaves[] = $arrleavedata;
				endif;
				
				$leavedate = date('Y-m-d', strtotime($leavedate . ' +1 day'));
			}
		endforeach;
		
		# Travel Order
		$arremp_to = array();
		$empto = $this->gettos($empid);
		foreach($empto as $to):
			$todate = $to['toDateFrom'];
			$to_to = $to['toDateTo'];
			while (strtotime($todate) <= strtotime($to_to))
			{
				$todatekey = array_search($todate, array_column($arremp_to, 'date'));
				$arrtodata = array( 'toID'			=> $to['toID'],
									'dateFiled'		=> $to['dateFiled'],
									'date'			=> $todate,
									'toDateFrom'    => $to['toDateFrom'],
									'toDateTo'    	=> $to['toDateTo'],
									'destination'   => $to['destination'],
									'purpose'  		=> $to['purpose'],
									'fund'    		=> $to['fund'],
									'transportation'=> $to['transportation'],
									'perdiem'		=> $to['perdiem'],
									'wmeal'  		=> $to['wmeal']);
				if(is_numeric($todatekey)):
					$arremp_to[$todatekey] = $arrtodata;
				else:
					$arremp_to[] = $arrtodata;
				endif;
				
				$todate = date('Y-m-d', strtotime($todate . ' +1 day'));
			}
		endforeach;
		
		# OB
		$arremp_ob = array();
		$empob = $this->getobs($empid);

		foreach($empob as $ob):
			$obdate = $ob['obDateFrom'];
			$schedto = $ob['obDateTo'];
			while (strtotime($obdate) <= strtotime($schedto))
			{
				$obdatekey = array_search($obdate, array_column($arremp_ob, 'date'));
				$arrobdata = array( 'obid'			=> $ob['obID'],
									'dateFiled'		=> $ob['dateFiled'],
									'date'			=> $obdate,
									'obTimeFrom'    => $ob['obTimeFrom'],
									'obTimeTo'    	=> $ob['obTimeTo'],
									'obPlace'   	=> $ob['obPlace'],
									'obMeal'  		=> $ob['obMeal'],
									'purpose'    	=> $ob['purpose'],
									'official' 		=> $ob['official'],
									'approveRequest'=> $ob['approveRequest'],
									'approveChief'  => $ob['approveChief'],
									'approveHR'  	=> $ob['approveHR']);
				if(is_numeric($obdatekey)):
					$arremp_ob[$obdatekey] = $arrobdata;
				else:
					$arremp_ob[] = $arrobdata;
				endif;
				
				$obdate = date('Y-m-d', strtotime($obdate . ' +1 day'));
			}
		endforeach;

		# Broken Sched
		$arrbrokensched = array();
		$brokensched = $this->getBrokenschedules($empid);
		foreach($brokensched as $bs):
			$bsdate = $bs['dateFrom'];
			$schedto = $bs['dateTo'];
			while (strtotime($bsdate) <= strtotime($bs['dateTo']))
			{
				$bsdatekey = array_search($bsdate, array_column($arrbrokensched, 'date'));
				$arrbsdata  = array('recid'			=> $bs['rec_ID'],
									'date'			=> $bsdate,
									'schemeCode'    => $bs['schemeCode'],
									'schemeName'    => $bs['schemeName'],
									'schemeType'    => $bs['schemeType'],
									'amTimeinFrom'  => $bs['amTimeinFrom'],
									'amTimeinTo'    => $bs['amTimeinTo'],
									'pmTimeoutFrom' => $bs['pmTimeoutFrom'],
									'pmTimeoutTo'   => $bs['pmTimeoutTo'],
									'nnTimeoutFrom' => $bs['nnTimeoutFrom'],
									'nnTimeoutTo'   => $bs['nnTimeoutTo'],
									'nnTimeinFrom'  => $bs['nnTimeinFrom'],
									'nnTimeinTo' 	=> $bs['nnTimeinTo'],
									'overtimeStarts'=> $bs['overtimeStarts'],
									'overtimeEnds'  => $bs['overtimeEnds'],
									'gracePeriod'	=> $bs['gracePeriod'],
									'gpLeaveCredits'=> $bs['gpLeaveCredits'],
									'gpLate'	  	=> $bs['gpLate'],
									'wrkhrLeave'	=> $bs['wrkhrLeave'],
									'hlfLateUnd'	=> $bs['hlfLateUnd'],
									'fixMonday'		=> $bs['fixMonday']);
				if(is_numeric($bsdatekey)):
					$arrbrokensched[$bsdatekey] = $arrbsdata;
				else:
					$arrbrokensched[] = $arrbsdata;
				endif;
				
				$bsdate = date('Y-m-d', strtotime($bsdate . ' +1 day'));
			}
		endforeach;
		
		# Attendance Scheme
		$emp_scheme = $this->db->get_where('tblEmpPosition', array('empNumber' => $empid))->result_array();
		$att_scheme = $this->db->get_where('tblAttendanceScheme', array('schemeCode' => $emp_scheme[0]['schemeCode']))->result_array();
		$att_scheme = $att_scheme[0];

		$date_absents = array();
		$total_undertime = 0;
		$total_late = 0;
		$total_ot_wkdays = 0;
		$total_ot_wkendsholi = 0;

		$arrdtrData = array();
		foreach(range(1, cal_days_in_month(CAL_GREGORIAN, $month, $yr)) as $day):
			$bsremarks = '';
			$obremarks = '';
			$toremarks = '';
			$leaveremarks = '';

			$late = 0;
			$late_am = 0;
			$late_pm = 0;
			$undertime = 0;
			$undertime_am = 0;
			$undertime_pm = 0;
			$overtime = 0;

			$mins_timein = 0;
			$expected_timein = '';
			$expected_timeout = '';

			$ddate = $yr.'-'.$month.'-'.sprintf('%02d', $day);
			$dday = date('D', strtotime($ddate));

			# Dtr data
			$dtrkey = array_search($ddate, array_column($arrData, 'dtrDate'));
			$dtrdata = is_numeric($dtrkey) ? $arrData[$dtrkey] : array();

			# Holiday
			$holikey = array_search($ddate, array_column($reg_holidays, 'holidayDate'));
			$holiday = is_numeric($holikey) ? $reg_holidays[$holikey]['holidayName'] : '';

			# Local Holiday
			$locholikey = array_search($day, array_column($emplocholiday, 'holidayDay'));
			$localholi = is_numeric($locholikey) ? $emplocholiday[$locholikey]['holidayName'] : '';

			# Attendance Scheme from broken sched
			if(count($arrbrokensched) > 0):
				$dtr_bskey = array_search($ddate, array_column($arrbrokensched, 'date'));
				if(is_numeric($dtr_bskey)):
					$att_scheme =  $arrbrokensched[$dtr_bskey];
					$bsremarks = $arrbrokensched[$dtr_bskey]['schemeName'].'-'.$arrbrokensched[$dtr_bskey]['schemeType'].' ('.substr($arrbrokensched[$dtr_bskey]['amTimeinFrom'],0,5).'-'.substr($arrbrokensched[$dtr_bskey]['amTimeinTo'],0,5).', '.substr($arrbrokensched[$dtr_bskey]['pmTimeoutFrom'],0,5).' - '.substr($arrbrokensched[$dtr_bskey]['pmTimeoutTo'],0,5).')';
				else:
					$att_scheme =  $att_scheme;
				endif;
			endif;

			# Remarks for Employee's OB
			if(count($arremp_ob) > 0):
				$dtr_obkey = array_search($ddate, array_column($arremp_ob, 'date'));
				if(is_numeric($dtr_obkey)):
					// TODO:: IF REQUEST IS APPROVED
					if($arremp_ob[$dtr_obkey]['approveRequest'] == 'Y'):
						$obremarks = json_encode($arremp_ob[$dtr_obkey]);
						if(count($dtrdata) > 0):
							$dtrdata['remarks'] = '';
						endif;
					endif;
				endif;
			endif;

			# Remarks for Employee's TO
			if(count($arremp_to) > 0):
				$dtr_tokey = array_search($ddate, array_column($arremp_to, 'date'));
				if(is_numeric($dtr_tokey)):
					// TODO:: IF TO HAS REQUEST AND IF IT IS APPROVED
					$toremarks = json_encode($arremp_to[$dtr_tokey]);
					if(count($dtrdata) > 0):
						$dtrdata['remarks'] = '';
					endif;
				endif;
			endif;

			# Remarks for Employee's Leave
			if(count($arremp_leaves) > 0):
				$dtr_leavekey = array_search($ddate, array_column($arremp_leaves, 'date'));
				if(is_numeric($dtr_leavekey)):
					// TODO:: IF REQUEST IS APPROVED : approveRequest or approveChief
					if($arremp_leaves[$dtr_leavekey]['certifyHR'] == 'Y'):
						$leaveremarks = json_encode($arremp_leaves[$dtr_leavekey]);
						if(count($dtrdata) > 0):
							$dtrdata['remarks'] = '';
						endif;
					endif;
				endif;
			endif;

			if(count($dtrdata) > 0):
				$dtrin_out = array($dtrdata['inAM'], $dtrdata['outAM'], $dtrdata['inPM'], $dtrdata['outPM'], $dtrdata['inOT'], $dtrdata['outOT']);

				# Attendance Scheme
				$am_timein_from = date('H:i:s', strtotime($att_scheme['amTimeinFrom'].' AM'));
				$am_timein_to = date('H:i:s', strtotime($att_scheme['amTimeinTo'].' AM'));
				$nn_timein_from = date('H:i:s', strtotime($att_scheme['nnTimeoutFrom'].' PM'));
				$nn_timein_to = date('H:i:s', strtotime($att_scheme['nnTimeoutTo'].' PM'));
				$pm_timeout_from = date('H:i:s', strtotime($att_scheme['pmTimeoutFrom'].' PM'));
				$pm_timeout_to = date('H:i:s', strtotime($att_scheme['pmTimeoutTo'].' PM'));

				# morning
				$am_time_in = date('H:i:s', strtotime($dtrdata['inAM'].' AM'));
				if($dtrdata['outAM'] >= '12:00:00'):
					$am_time_out = date('H:i:s', strtotime($dtrdata['outAM'].' PM'));
				else:
					$am_time_out = date('H:i:s', strtotime($dtrdata['outAM'].' AM'));
				endif;

				# afternoon
				$pm_time_in = date('H:i:s', strtotime($dtrdata['inPM'].' PM'));
				$pm_time_out = date('H:i:s', strtotime($dtrdata['outPM'].' PM'));
			endif;

			if($holiday == '' && $localholi == '' && count($dtrdata) > 0 && !in_array($dday, array('Sat','Sun'))):
				# if Fix Monday and Monday
				if($att_scheme['fixMonday'] == 'Y' && $dday == 'Mon'):
					/* amTimeinTo in monday will change; then minutes from att-scheme-am-timein-to minus flag-cer-time will added to att-scheme-pm-timeout-from and become att-scheme-pm-timeout-to */
					$fc_minutes = toMinutes($am_timein_to) - toMinutes(date('H:i:s', strtotime($_ENV['FLAGCRMNY'].' AM')));
					$am_timein_to = date('H:i:s', strtotime($_ENV['FLAGCRMNY'].' AM'));
					$pm_timeout_to = date("H:i:s", strtotime('+'.$fc_minutes.' minutes', strtotime($pm_timeout_from)));

					$late_am = toMinutes($am_time_in) - toMinutes($_ENV['FLAGCRMNY']);
					$late_pm = toMinutes($pm_time_in) - toMinutes($nn_timein_to);
				# if Not Fix Monday and Not Monday
				else:
					$late_am = toMinutes($am_time_in) - toMinutes($am_timein_to);
					$late_pm = toMinutes($pm_time_in) - toMinutes($nn_timein_to);
				endif;

				# Compute Total Late
				/* if employee has no AM timein*/
				if($am_time_in == '00:00:00'):
					$late_am = toMinutes($nn_timein_from) - toMinutes($am_timein_to);
				endif;

				# check if emp has dtr record
				if (!(count(array_unique($dtrin_out)) === 1 && end($dtrin_out) === '00:00:00')):
					$late = $late_am > 0 ? $late_am : 0;
					$late = $late + ($late_pm > 0 ? $late_pm : 0);
				endif;

				#  UnderTime
				## Get employee's expected time out first to check if employee gets undertime
				/* if employee has AM time in*/
				if($am_time_in != '00:00:00'):
					## AM UnderTime
					if($am_time_out <= $nn_timein_from):
						$undertime_am = toMinutes($nn_timein_from) - toMinutes($am_time_out);
					endif;

					## PM UnderTime
					/* if employee's timein is earlier than att scheme amTimeinFrom, set the timein to the amTimeinFrom */
					if($am_time_in < $am_timein_from):
						$expected_timein = $am_timein_from;
					else:
						$expected_timein = $am_time_in;
					endif;
					/* if employee is late, the expected time out will be the pmTimeoutTo */
					if($late_am > 0):
						$expected_timeout = $pm_timeout_to;
					else:
						$mins_timein = toMinutes($expected_timein) - toMinutes($am_timein_from);
						$expected_timeout = date("H:i:s", strtotime('+'.$mins_timein.' minutes', strtotime($pm_timeout_from)));
					endif;
				else:
					# No AM Undertime
					/* if employee has no AM time in; expected time out is pmTimeoutTo */
					$expected_timeout = $pm_timeout_to;
				endif;
				## PM UnderTime
				# check undertime using expected_timeout
				/* Check if employee has PM timein */
				if($pm_time_in != '00:00:00'):
					if($expected_timeout > $pm_time_out):
						$undertime_pm = toMinutes($expected_timeout) - toMinutes($pm_time_out);
					endif;
				else:
					$undertime_pm = toMinutes($expected_timeout) - toMinutes($nn_timein_to);
				endif;

				# Compute Total UnderTime
				# check if emp has dtr record
				if (!(count(array_unique($dtrin_out)) === 1 && end($dtrin_out) === '00:00:00')):
					$undertime = $undertime_am > 0 ? $undertime_am : 0;
					$undertime = $undertime + ($undertime_pm > 0 ? $undertime_pm : 0);
				endif;
				
				# Compute Overtime
				# check if emp has dtr record
				if (!(count(array_unique($dtrin_out)) === 1 && end($dtrin_out) === '00:00:00')):
					if($undertime >= 0):
						$lateunder = $late + $undertime_am;
						$overtime = toMinutes($pm_time_out) - toMinutes($expected_timeout);
						$overtime = $overtime > $lateunder ? ($overtime - $lateunder) : 0;
					endif;
				endif;

				# Overtime weekdays
				$total_ot_wkdays = $total_ot_wkdays + $overtime;

			else:
				# if holiday or weekends
				if(count($dtrdata) > 0):
					# check if emp has dtr record
					if (!(count(array_unique($dtrin_out)) === 1 && end($dtrin_out) === '00:00:00')):
						$overtime_am = toMinutes($nn_timein_from) - toMinutes($am_time_in);
						$overtime_pm = toMinutes($pm_time_out) - toMinutes($nn_timein_to);
						$overtime = $overtime_am + $overtime_pm;
					endif;
				endif;
				# Overtime weekends, holidays
				$total_ot_wkendsholi = $total_ot_wkendsholi + $overtime;
			endif;

			$emp_dtrdata = array('date' => $ddate,
								  'day'  => $dday,
								  'late' => date('H:i', mktime(0, $late)),
								  'undertime'=> date('H:i', mktime(0, $undertime)),
								  'overtime' => date('H:i', mktime(0, $overtime)),
								  'holiday'  => $holiday!='' ? $localholi!='' ? $holiday.' + '.$localholi : $holiday : '',
								  'bsremarks'=> $bsremarks,
								  'obremarks'=> $obremarks,
								  'toremarks'=> $toremarks,
								  'leaveremarks' => $leaveremarks,
								  'dtrdata'  => $dtrdata);

			$arrdtrData[] = $emp_dtrdata;

			# Absent
			if($holiday == '' && $localholi == '' && !in_array($dday, array('Sat','Sun'))):
				# check if no remarks
				if($bsremarks == '' && $obremarks == '' && $toremarks == '' && $leaveremarks == ''):
					if(count($dtrdata) < 1):
						array_push($date_absents, $ddate);
					else:
						if (count(array_unique($dtrin_out)) === 1 && end($dtrin_out) === '00:00:00'):
							array_push($date_absents, $ddate);
						endif;
					endif;
				endif;
			endif;

			# Total late
			$total_late = $total_late + $late;
			# Total undertime
			$total_undertime = $total_undertime + $undertime;

			// echo '<hr>';
		endforeach;
		
		$arrdtrData = array('dtr' 			 	 => $arrdtrData,
							'date_absents' 	 	 => $date_absents,
							'total_late' 	 	 => $total_late,
							'total_undertime'	 => $total_undertime,
							'total_ot_wkdays'	 => $total_ot_wkdays,
							'total_ot_wkendsholi'=> $total_ot_wkendsholi);
		// print_r($arrdtrData);
		return $arrdtrData;
		// return array('dtr' => $arrdtrData, 'date_absents' => $date_absents);

		# PRINTDIE
		// print_r($arrdtrData);
		// die();
	}

	# Begin Broken Sched
	public function add_brokensched($arrData)
	{
		$this->db->insert('tblBrokenSched', $arrData);
		return $this->db->insert_id();		
	}

	function edit_brokensched($arrData, $id)
	{
		$this->db->where('rec_ID', $id);
		$this->db->update('tblBrokenSched', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_brokensched($id)
	{
		$this->db->where('rec_ID', $id);
		$this->db->delete('tblBrokenSched'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getBrokenschedules($empid)
	{
		$this->db->join('tblAttendanceScheme', 'tblAttendanceScheme.schemeCode = tblBrokenSched.schemeCode', 'left');
		return $this->db->get_where('tblBrokenSched', array('empNumber' => $empid))->result_array();
	}

	public function getSchedule($id)
	{
		return $this->db->get_where('tblBrokenSched', array('rec_ID' => $id))->result_array();
	}
	# End Broken Sched

	# Begin Broken Sched
	public function add_localholiday($arrData)
	{
		$this->db->insert('tblEmpLocalHoliday', $arrData);
		return $this->db->insert_id();		
	}

	function edit_localholiday($arrData, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('tblEmpLocalHoliday', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_localholiday($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tblEmpLocalHoliday');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getLocalHolidays($empid,$month='',$yr='')
	{
		$arrcond = array('empNumber' => $empid);
		if($month!='' && $yr!=''):
			$arrcond['holidayYear'] = $yr;
			$arrcond['holidayMonth'] = (int) $month;
		endif;
		$this->db->join('tblLocalHoliday', 'tblLocalHoliday.holidayCode = tblEmpLocalHoliday.holidayCode', 'left');
		return $this->db->get_where('tblEmpLocalHoliday', $arrcond)->result_array();
	}

	public function getHoliday($id)
	{
		return $this->db->get_where('tblEmpLocalHoliday', array('id' => $id))->result_array();
	}
	# End Broken Sched

	# Begin OB
	public function add_ob($arrData)
	{
		$this->db->insert('tblEmpOB', $arrData);
		return $this->db->insert_id();		
	}

	function edit_ob($arrData, $id)
	{
		$this->db->where('obID', $id);
		$this->db->update('tblEmpOB', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_ob($id)
	{
		$this->db->where('obID', $id);
		$this->db->delete('tblEmpOB');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getobs($empid)
	{
		return $this->db->get_where('tblEmpOB', array('empNumber' => $empid))->result_array();
	}

	public function getOb($id)
	{
		return $this->db->get_where('tblEmpOB', array('obID' => $id))->result_array();
	}
	# End OB

	# Begin Leave
	public function add_leave($arrData)
	{
		$this->db->insert('tblEmpLeave', $arrData);
		return $this->db->insert_id();		
	}

	function edit_leave($arrData, $id)
	{
		$this->db->where('leaveID', $id);
		$this->db->update('tblEmpLeave', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_leave($id)
	{
		$this->db->where('leaveID', $id);
		$this->db->delete('tblEmpLeave');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getleaves($empid)
	{
		$this->db->join('tblLeave', 'tblLeave.leaveCode = tblEmpLeave.leaveCode', 'left');
		return $this->db->get_where('tblEmpLeave', array('empNumber' => $empid))->result_array();
	}

	public function getLeave($id)
	{
		$this->db->join('tblLeave', 'tblLeave.leaveCode = tblEmpLeave.leaveCode', 'left');
		return $this->db->get_where('tblEmpLeave', array('leaveID' => $id))->result_array();
	}

	public function getSpecificLeave($type)
	{
		return $this->db->get_where('tblSpecificLeave', array('leaveCode' => $type))->result_array();
	}

	public function getTotalnoofdays($leavefrom,$leaveto)
	{
		$totaldays = 0;
		while (strtotime($leavefrom) <= strtotime($leaveto)) {
			$validday = date('D', strtotime($leavefrom)); # holiday no included
			if($validday != 'Sat' && $validday != 'Sun'){
				$totaldays++;
			}
			$leavefrom = date ("Y-m-d", strtotime("+1 day", strtotime($leavefrom)));
		}
		return $totaldays;
	}
	# End Leave

	# Begin Compensatory Leave
	function edit_comp_leave($arrData, $empnumber, $dtrdate)
	{
		$this->db->where('empNumber', $empnumber);
		$this->db->where('dtrDate', $dtrdate);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getcomp_leaves($empid)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'remarks' => 'CL'))->result_array();
	}
	# End Compensatory Leave

	# Begin Time
	function edit_dtrTime($arrData, $empnumber, $dtrdate)
	{
		$this->db->where('empNumber', $empnumber);
		$this->db->where('dtrDate', $dtrdate);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getdtrTimes($empid)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'remarks' => ''))->result_array();
	}
	# End Time

	# Begin Travel Order
	public function add_to($arrData)
	{
		$this->db->insert('tblEmpTravelOrder', $arrData);
		return $this->db->insert_id();		
	}

	function edit_to($arrData, $id)
	{
		$this->db->where('toID', $id);
		$this->db->update('tblEmpTravelOrder', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function delete_to($id)
	{
		$this->db->where('toID', $id);
		$this->db->delete('tblEmpTravelOrder');
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function gettos($empid)
	{
		return $this->db->get_where('tblEmpTravelOrder', array('empNumber' => $empid))->result_array();
	}

	public function getTo($id)
	{
		return $this->db->get_where('tblEmpTravelOrder', array('toID' => $id))->result_array();
	}
	# End Travel Order

	# Begin Flag Ceremony
	public function add_flagcrmy($arrData)
	{
		$this->db->insert('tblEmpDTR', $arrData);
		return $this->db->insert_id();		
	}

	function edit_flagcrmy($arrData, $empnumber, $dtrdate)
	{
		$this->db->where('empNumber', $empnumber);
		$this->db->where('dtrDate', $dtrdate);
		$this->db->update('tblEmpDTR', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function getflagcrmys($empid)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'remarks' => 'FC'))->result_array();
	}

	public function getFlagcrmy($id)
	{
		return $this->db->get_where('tblEmpDTR', array('id' => $id))->result_array();
	}

	public function checkEntry($empid, $dtrdate)
	{
		return $this->db->get_where('tblEmpDTR', array('empNumber' => $empid, 'dtrDate' => $dtrdate))->result_array();
	}
	# End Flag Ceremony


}
/* End of file Dtr_model.php */
/* Location: ./application/modules/finance/models/Dtr_model.php */