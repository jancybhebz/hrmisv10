<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payroll_process_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getData($process_id=0)
	{
		if($process_id == 0):
			return $this->db->get('tblProcess')->result_array();
		else:
			return $this->db->get_where('tblProcess',array('processID' => $process_id))->result_array();
		endif;
	}

	function get_rata_details($code='')
	{
		if($code != ''):
			return $this->db->get_where('tblRATA',array('RATACode' => $code))->result_array();
		else:
			return $this->db->get('tblRATA')->result_array();
		endif;
	}

	function get_process_code($process_id)
	{
		$deduction_codes = $this->db->group_by('deductionCode')->get_where('tblEmpDeductionRemit',array('processID' => $process_id))->result_array();
		$income_codes = $this->db->group_by('incomeCode')->get_where('tblEmpIncome',array('processID' => $process_id))->result_array();
		return array_filter(array_merge(array_column($deduction_codes,'deductionCode'),array_column($income_codes,'incomeCode')));
	}

	function get_process_by_appointment($appt,$month,$yr)
	{
		$process = $this->db->get_where('tblProcess',array('employeeAppoint' => $appt, 'processMonth' => ltrim($month,'0'), 'processYear' => $yr))->result_array();
		foreach($process as $key => $p):
			$process[$key]['codes'] = $this->get_process_code($p['processID']);
		endforeach;

		return $process;
	}

	function get_payroll_process($month,$yr)
	{
		$process = $this->db->get_where('tblProcess',array('processMonth' => ltrim($month,'0'), 'processYear' => $yr))->result_array();
		return $process;
	}

	# Add payroll process
	function add_payroll_process($arrData)
	{
		$this->db->insert('tblProcess', $arrData);
		return $this->db->insert_id();
	}

	# delete payroll process
	function delete_payroll_process($month,$yr)
	{
		$this->db->delete('tblProcess', array('processMonth' => ltrim($month,'0'), 'processYear' => $yr));
	}

	function getall_process($month='all',$yr)
	{
		if($month == 'all'):
			$condition = array('processYear' => $yr);
		else:
			$condition = array('processMonth' => $month, 'processYear' => $yr);
		endif;

		$this->db->order_by('processDate');
		$this->db->join('tblAppointment','tblAppointment.appointmentCode = tblProcess.employeeAppoint','left');
		$process = $this->db->get_where('tblProcess', $condition)->result_array();
		foreach($process as $key => $proc):
			$process[$key]['details'] = implode(', ',$this->getprocess_details($proc['processID']));
		endforeach;
		
		return $process;
	}

	function getprocess_details($process_id)
	{
		$this->db->group_by('deductionCode');
		$process_details = $this->db->get_where('tblEmpDeductionRemit', array('processID' => $process_id))->result_array();
		return array_column($process_details,'deductionCode');
	}

	function edit_payroll_process($arrData,$procid)
	{
		$this->db->where('processID',$procid);
		$this->db->update('tblProcess', $arrData);
		return $this->db->affected_rows();
	}

	function getEmployees($appt_code,$empid='')
	{
		$payroll_process = $this->db->get_where('tblPayrollProcess', array('appointmentCode' => $appt_code))->result_array();
		if(count($payroll_process) > 0):
			$condition['statusOfAppointment'] = 'In-Service';
			$condition['payrollSwitch'] = 'Y';
			if($empid!=''):
				$condition['tblEmpPersonal.empNumber'] = $empid;
			endif;
			# Employees
			$this->db->select("tblEmpPersonal.empNumber,tblEmpPersonal.surname,tblEmpPersonal.firstname,tblEmpPersonal.middlename,tblEmpPersonal.middleInitial,
							    tblEmpPosition.authorizeSalary,tblEmpPosition.actualSalary,tblEmpPosition.hpFactor,tblEmpPosition.RATACode,tblEmpPosition.RATAVehicle,
							    tblEmpPosition.schemeCode");
			$this->db->join('tblEmpPersonal', 'tblEmpPersonal.empNumber = tblEmpPosition.empNumber');
			$this->db->where_in('appointmentCode', explode(',',$payroll_process[0]['processWith']));
			$employees = $this->db->get_where('tblEmpPosition',$condition)->result_array();

			// echo $this->db->last_query();
			// die();
			return $employees;
		endif;
	}

	function process_with($appt_code)
	{
		$res = $this->db->get_where('tblPayrollProcess', array('appointmentCode' => $appt_code))->result_array();
		return count($res) > 0 ? $res[0] : null;
	}




}
/* End of file Process_model.php */
/* Location: ./application/modules/finance/models/Process_model.php */