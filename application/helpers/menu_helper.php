<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_libraries'))
{
    function get_libraries()
    {
		$CI =& get_instance();
		/* array('module/controller'=>'Label for Library menu')*/
		return array(
			'agencyprofile'=>'Agency Profile',
			'appointmentstatus'=>'Appointment Status',
			'attendancescheme'=>'Attendance Scheme',
			'backup'=>'Back-up',
			'course'=>'Course',
			'country'=>'Country',
			'dutiesresponsibilities'=>'Duties and Responsibilities',
			'educlevel'=>'Educational Level',
			'examtype'=>'Exam Type',
			'holiday'=>'Holiday',
			'leavetype'=>'Leave Type',
			'orgstructure'=>'Org Structure',
			'payrollgroup'=>'Payroll Group',
			'plantilladuties'=>'Plantilla Duties',
			'positioncode'=>'Position Code',
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


if ( ! function_exists('deduction_type'))
{
    function deduction_type()
    {
		return array('Regular', 'Contribution', 'Loan', 'Others');
	}

}

if ( ! function_exists('income_type'))
{
    function income_type()
    {
		return array('Benefit', 'Bonus', 'Additional');
	}

}
