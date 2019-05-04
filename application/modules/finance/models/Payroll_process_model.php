<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payroll_process_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
	}
	
	function getEmployees($appt_code,$yr,$month,$empid='')
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
							    tblEmpPosition.authorizeSalary,tblEmpPosition.actualSalary,tblEmpPosition.hpFactor");
			$this->db->join('tblEmpPersonal', 'tblEmpPersonal.empNumber = tblEmpPosition.empNumber');
			$this->db->where_in('appointmentCode', explode(',',$payroll_process[0]['processWith']));
			$employees = $this->db->get_where('tblEmpPosition',$condition)->result_array();

			// echo $this->db->last_query();
			// die();
			return $employees;
		endif;
	}


}
/* End of file Process_model.php */
/* Location: ./application/modules/finance/models/Process_model.php */