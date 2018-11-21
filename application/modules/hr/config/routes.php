<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['404_override'] = '';

$route['hr/attendance_summary/index/(:any)'] = 'hr/attendance/attendance_summary/$1';
$route['hr/attendance_summary/leave_balance/(:any)'] = 'hr/attendance/leave_balance/$1';
$route['hr/attendance_summary/leave_balance_update/(:any)'] = 'hr/attendance/leave_balance_update/$1';
$route['hr/attendance_summary/leave_monetization/(:any)'] = 'hr/attendance/leave_monetization/$1';
$route['hr/attendance_summary/filed_request/(:any)'] = 'hr/attendance/filed_request/$1';
$route['hr/attendance_summary/dtr/(:any)'] = 'hr/attendance/dtr/$1';
$route['hr/attendance_summary/override/(:any)'] = 'hr/attendance/override/$1';
$route['hr/attendance_summary/qr_code/(:any)'] = 'hr/attendance/qr_code/$1';
