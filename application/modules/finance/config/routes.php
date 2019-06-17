<?php
defined('BASEPATH') OR exit('No direct script access allowed');

# BEGIN libraries
// Deductions
$route['finance/libraries/deductions/(:num)'] = 'finance/libraries/deductions/index/$1';

// income
$route['finance/libraries/income'] = 'finance/libraries/income/index';
$route['finance/libraries/income/(:num)'] = 'finance/libraries/income/index/$1';

// agency
$route['finance/libraries/agency/add'] = 'finance/libraries/deductions/add_agency';
$route['finance/libraries/agency/edit/(:any)'] = 'finance/libraries/deductions/edit_agency/$1';

// payroll group
$route['finance/libraries/payrollgroup'] = 'finance/libraries/PayrollGroup/index';
$route['finance/libraries/payrollgroup/add'] = 'finance/libraries/PayrollGroup/add';
$route['finance/libraries/payrollgroup/edit/(:any)'] = 'finance/libraries/PayrollGroup/edit/$1';

// Payroll Process
$route['finance/libraries/payrollprocess'] = 'finance/libraries/PayrollProcess/index';
$route['finance/libraries/payrollprocess/add'] = 'finance/libraries/PayrollProcess/add';
$route['finance/libraries/payrollprocess/edit/(:any)'] = 'finance/libraries/PayrollProcess/edit/$1';

// Project Code
$route['finance/libraries/projectcode'] = 'finance/libraries/ProjectCode/index';
$route['finance/libraries/projectcode/add'] = 'finance/libraries/ProjectCode/add';
$route['finance/libraries/projectcode/edit/(:any)'] = 'finance/libraries/ProjectCode/edit/$1';

// Signatory
$route['finance/libraries/signatory'] = 'finance/libraries/Signatory/index';
$route['finance/libraries/signatory/add'] = 'finance/libraries/Signatory/add';
$route['finance/libraries/signatory/edit/(:any)'] = 'finance/libraries/Signatory/edit/$1';

# END libraries

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
$route['finance/payroll_update/process'] = 'finance/payroll_update/payrollupdate/index';
$route['finance/payroll_update/select_benefits_perm'] = 'finance/payroll_update/payrollupdate/select_benefits_perm';
$route['finance/payroll_update/compute_benefits_perm'] = 'finance/payroll_update/payrollupdate/compute_benefits_perm';
$route['finance/payroll_update/save_benefits_perm'] = 'finance/payroll_update/payrollupdate/save_benefits_perm';
$route['finance/payroll_update/select_deductions_perm'] = 'finance/payroll_update/payrollupdate/select_deductions_perm';
$route['finance/payroll_update/complete_process_perm'] = 'finance/payroll_update/payrollupdate/complete_process_perm';
$route['finance/payroll_update/reports'] = 'finance/payroll_update/payrollupdate/reports';

# Semimonthl / Bimonthly
$route['finance/payroll_update/select_benefits_nonperm'] = 'finance/payroll_update/payrollupdate_nonperm/select_benefits_nonperm';
$route['finance/payroll_update/computation_nonperm'] = 'finance/payroll_update/payrollupdate_nonperm/computation_nonperm';
$route['finance/payroll_update/select_deductions_nonperm'] = 'finance/payroll_update/payrollupdate_nonperm/select_deductions_nonperm';
$route['finance/payroll_update/save_computation_nonperm'] = 'finance/payroll_update/payrollupdate_nonperm/save_computation_nonperm';

# daily
$route['finance/payroll_update/select_benefits_nonperm_trc'] = 'finance/payroll_update/Payrollupdate_nonperm_daily/select_benefits_nonperm_trc';
$route['finance/payroll_update/compute_benefits_nonperm_trc'] = 'finance/payroll_update/Payrollupdate_nonperm_daily/compute_benefits_nonperm_trc';
$route['finance/payroll_update/select_deduction_nonperm_trc'] = 'finance/payroll_update/Payrollupdate_nonperm_daily/select_deduction_nonperm_trc';
$route['finance/payroll_update/save_computation_nonperm_trc'] = 'finance/payroll_update/Payrollupdate_nonperm_daily/save_computation_nonperm_trc';
