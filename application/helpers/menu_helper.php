<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_libraries'))
{
    function get_libraries()
    {
		$CI =& get_instance();
		/* array('module/controller'=>'Label for Library menu')*/
		return array(
			'agencyprofile'=>'Agency Profile',
			'appointment_status'=>'Appointment Status',
			'attendancescheme'=>'Attendance Scheme',
			'backup'=>'Back-up',
			'course'=>'Course',
			'country'=>'Country',
			'dutiesresponsibilities'=>'Duties and Responsibilities',
			'educ_level'=>'Educational Level',
			'exam_type'=>'Exam Type',
			'holiday'=>'Holiday',
			'leavetype'=>'Leave Type',
			'orgstructure'=>'Org Structure',
			'payrollgroup'=>'Payroll Group',
			'plantilla'=>'Plantilla',
			'plantilla_group'=>'Plantilla Group',
			'plantilladuties'=>'Plantilla Duties',
			'position'=>'Position Code',
			'projectcode'=>'Project Code',
			'request'=>'Request',
			'salaryschedule'=>'Salary Schedule',
			'scholarship'=>'Scholarship',
			'separationmode'=>'Separation Mode',
			'servicecode'=>'Service Code',
			'signatories'=>'Signatory',
			'useraccount'=>'User Account',
			'zone'=>'Zone'
		);
	}
}