<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Process_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getData($month, $yr)
	{
		$process = $this->db->join('tblAppointment', 'tblAppointment.appointmentCode = tblProcess.employeeAppoint', 'left')
							->order_by('employeeAppoint ASC, processCode ASC, processDate DESC')
							->where('processMonth',$month)
							->where('processYear',$yr)
							->get('tblProcess')->result_array();

		$arrProcess = array();
		foreach($process as $key => $proc):
			$proc['payroll_period'] = $proc['employeeAppoint']!='P' ? ' - period'.$proc['period'] : '';
			$p_groupname = $this->db->get_where('tblPayrollGroup', array('payrollGroupCode' => $proc['payrollGroupCode']))->result_array();
			$proc['payrollgroup_name'] = count($p_groupname) > 0 ? $p_groupname[0]['payrollGroupName'] : '';
			array_push($arrProcess, $proc);
		endforeach;
		return $arrProcess;
	}

}
/* End of file Rata_model.php */
/* Location: ./application/modules/finance/models/Rata_model.php */