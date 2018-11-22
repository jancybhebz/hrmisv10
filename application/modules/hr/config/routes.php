<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';

$route['hr/attendance_summary/index/(:any)'] = 'hr/attendance/attendance_summary/$1';
$route['hr/attendance_summary/leave_balance/(:any)'] = 'hr/attendance/leave_balance/$1';
$route['hr/attendance_summary/leave_balance_update/(:any)'] = 'hr/attendance/leave_balance_update/$1';
$route['hr/attendance_summary/leave_monetization/(:any)'] = 'hr/attendance/leave_monetization/$1';
$route['hr/attendance_summary/filed_request/(:any)'] = 'hr/attendance/filed_request/$1';

$route['hr/attendance_summary/dtr/(:any)'] = 'hr/attendance/dtr/$1';
	$route['hr/attendance_summary/dtr/broken_sched/(:any)'] = 'hr/attendance/dtr_broken_sched/$1';
		$route['hr/attendance_summary/dtr/broken_sched_add/(:any)'] = 'hr/attendance/dtr_add_broken_sched/$1';

	$route['hr/attendance_summary/dtr/local_holiday/(:any)'] = 'hr/attendance/dtr_local_holiday/$1';
		$route['hr/attendance_summary/dtr/local_holiday_add/(:any)'] = 'hr/attendance/dtr_add_local_holiday/$1';

	$route['hr/attendance_summary/dtr/certify_offset/(:any)'] = 'hr/attendance/dtr_certify_offset/$1';

	$route['hr/attendance_summary/dtr/ob/(:any)'] = 'hr/attendance/dtr_ob/$1';
		$route['hr/attendance_summary/dtr/ob_add/(:any)'] = 'hr/attendance/dtr_add_ob/$1';

	$route['hr/attendance_summary/dtr/leave/(:any)'] = 'hr/attendance/dtr_leave/$1';
		$route['hr/attendance_summary/dtr/leave_add/(:any)'] = 'hr/attendance/dtr_add_leave/$1';

	$route['hr/attendance_summary/dtr/compensatory_leave/(:any)'] = 'hr/attendance/dtr_compensatory_leave/$1';
		$route['hr/attendance_summary/dtr/compensatory_leave_add/(:any)'] = 'hr/attendance/dtr_add_compensatory_leave/$1';
		
	$route['hr/attendance_summary/dtr/time/(:any)'] = 'hr/attendance/dtr_time/$1';
		$route['hr/attendance_summary/dtr/time_add/(:any)'] = 'hr/attendance/dtr_add_time/$1';

	$route['hr/attendance_summary/dtr/to/(:any)'] = 'hr/attendance/dtr_to/$1';
		$route['hr/attendance_summary/dtr/to_add/(:any)'] = 'hr/attendance/dtr_add_to/$1';
	

$route['hr/attendance_summary/override/(:any)'] = 'hr/attendance/override/$1';
$route['hr/attendance_summary/qr_code/(:any)'] = 'hr/attendance/qr_code/$1';
