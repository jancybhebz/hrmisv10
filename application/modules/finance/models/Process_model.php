<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Process_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function add($arrData)
	{
		$this->db->insert('tblPayrollProcess', $arrData);
		return $this->db->insert_id();		
	}

	function edit($arrData, $apptCode)
	{
		$this->db->where('appointmentCode', $apptCode);
		$this->db->update('tblpayrollprocess', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	public function delete($code)
	{
		$this->db->where('appointmentCode', $code);
		$this->db->delete('tblpayrollprocess');
		return $this->db->affected_rows(); 
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

	function getProcessData($appointmentCode='')
	{
		if($appointmentCode==''):
			return $this->db->join('tblAppointment', 'tblPayrollProcess.appointmentCode = tblAppointment.appointmentCode', 'inner')
							->distinct()
							->select('tblPayrollProcess.appointmentCode,tblPayrollProcess.processWith,tblPayrollProcess.computation, tblAppointment.appointmentDesc')
							->get('tblPayrollProcess')->result_array();
		else:
			$arrData = $this->db->get_where('tblpayrollprocess',array('appointmentCode' => $appointmentCode))->result_array();
			return $arrData[0];
		endif;
	}

	function isCodeExists($code, $action)
	{
		$result = $this->db->get_where('tblpayrollprocess', array('appointmentCode' => $code))->result_array();
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

}
/* End of file Process_model.php */
/* Location: ./application/modules/finance/models/Process_model.php */