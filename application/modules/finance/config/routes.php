<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// // Libraries/Deductions
// $route['finance/deductions'] = 'finance/libraries/deductions/index/$1';
// $route['finance/deductions/(:num)'] = 'finance/libraries/deductions/index/$1';
// $route['finance/deductions/add'] = 'finance/libraries/deductions/add';
// $route['finance/deductions/edit/(:any)'] = 'finance/libraries/deductions/edit/$1';
// $route['finance/deductions/delete'] = 'finance/libraries/deductions/delete';
$route['finance/libraries/agency/add'] = 'finance/libraries/deductions/add_agency';
$route['finance/libraries/agency/edit/(:any)'] = 'finance/libraries/deductions/edit_agency/$1';

// // Libraries/Income
// $route['finance/income'] = 'finance/libraries/income/index';
// $route['finance/income/(:num)'] = 'finance/libraries/income/index/$1';
// $route['finance/income/add'] = 'finance/libraries/income/add';
// $route['finance/income/edit/(:any)'] = 'finance/libraries/income/edit/$1';

// // Libraries/Payroll Process
// $route['finance/payrollprocess'] = 'finance/libraries/payrollprocess/index';
// $route['finance/payrollprocess/add'] = 'finance/libraries/payrollprocess/add';

// // Libraries/Project Code
// $route['finance/projectcode'] = 'finance/libraries/projectcode/index';
// $route['finance/projectcode/add'] = 'finance/libraries/projectcode/add';
// $route['finance/projectcode/edit/(:any)'] = 'finance/libraries/projectcode/edit/$1';

// // Libraries/Payroll Group
// $route['finance/payrollgroup'] = 'finance/libraries/payrollgroup/index';
// $route['finance/payrollgroup/add'] = 'finance/libraries/payrollgroup/add';
// $route['finance/payrollgroup/edit/(:any)'] = 'finance/libraries/payrollgroup/edit/$1';

// // Libraries/Signatory
// $route['finance/signatory'] = 'finance/libraries/signatory/index';
// $route['finance/signatory/add'] = 'finance/libraries/signatory/add';
// $route['finance/signatory/edit/(:any)'] = 'finance/libraries/signatory/edit/$1';

## Update
// Payroll Process

$route['finance/process_payroll'] = 'finance/process_payroll/Payroll_process/index';

# NOTIFICATIONS
$route['finance/notifications/npayroll'] = 'finance/notifications/notifications/npayroll';
$route['finance/notifications/nlongi'] = 'finance/notifications/notifications/nlongi';
$route['finance/notifications/matureloans'] = 'finance/notifications/notifications/matureloans';