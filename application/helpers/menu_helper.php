<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_libraries'))
{
    function get_libraries()
    {
		$CI =& get_instance();
		/* array('module/controller'=>'Label for Library menu')*/
		return array(
			'agency_profile'=>'Agency Profile',
			'appointment_status'=>'Appointment Status',
			'attendance_scheme'=>'Attendance Scheme',
			'backup'=>'Back-up',
			'course'=>'Course',
			'country'=>'Country',
			'duties_responsibilities'=>'Duties and Responsibilities',
			'educ_level'=>'Educational Level',
			'exam_type'=>'Exam Type',
			'holiday'=>'Holiday',
			'leave_type'=>'Leave Type',
			'org_structure'=>'Org Structure',
			'payroll_group'=>'Payroll Group',
			'plantilla'=>'Plantilla',
			'plantilla_group'=>'Plantilla Group',
			'plantilla_duties'=>'Plantilla Duties',
			'position'=>'Position Code',
			'project_code'=>'Project Code',
			'request'=>'Request',
			'salary_schedule'=>'Salary Schedule',
			'scholarship'=>'Scholarship',
			'separation_mode'=>'Separation Mode',
			'service_code'=>'Service Code',
			'signatory'=>'Signatory',
			'user_account'=>'User Account',
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
