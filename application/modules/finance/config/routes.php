<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# libraries
// Deductions
$route['finance/libraries/deductions/(:num)'] = 'finance/libraries/deductions/index/$1';

// income
$route['finance/libraries/income'] = 'finance/libraries/income/index';
$route['finance/libraries/income/(:num)'] = 'finance/libraries/income/index/$1';

// agency
$route['finance/libraries/agency/add'] = 'finance/libraries/deductions/add_agency';
$route['finance/libraries/agency/edit/(:any)'] = 'finance/libraries/deductions/edit_agency/$1';

## Update
// Payroll Process
$route['finance/process_payroll'] = 'finance/process_payroll/Payroll_process/index';

# NOTIFICATIONS
$route['finance/notifications/npayroll'] = 'finance/notifications/notifications/npayroll';
$route['finance/notifications/nlongi'] = 'finance/notifications/notifications/nlongi';
$route['finance/notifications/matureloans'] = 'finance/notifications/notifications/matureloans';

# REPORTS
$route['finance/reports/monthly'] = 'finance/reports/MonthlyReports';
$route['finance/reports/remittance'] = 'finance/reports/RemittanceReports';
$route['finance/reports/loanbalance'] = 'finance/reports/LoanBalanceReports';

# UPDATE
$route['finance/payroll_update/process'] = 'finance/payroll_update/Payrollupdate/index';
$route['finance/payroll_update/update_or'] = 'finance/payroll_update/Payrollupdate/update_or';