<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// Libraries/Deductions
$route['finance/deductions'] = 'finance/libraries/deductions/index/$1';
$route['finance/deductions/(:num)'] = 'finance/libraries/deductions/index/$1';
$route['finance/deductions/add'] = 'finance/libraries/deductions/add';
$route['finance/deductions/edit/(:any)'] = 'finance/libraries/deductions/edit/$1';
$route['finance/deductions/delete'] = 'finance/libraries/deductions/delete';
$route['finance/agency/add'] = 'finance/libraries/deductions/add_agency';
$route['finance/agency/edit/(:any)'] = 'finance/libraries/deductions/edit_agency/$1';

// Libraries/Income
$route['finance/income'] = 'finance/libraries/income/index';
$route['finance/income/(:num)'] = 'finance/libraries/income/index/$1';
$route['finance/income/add'] = 'finance/libraries/income/add';
$route['finance/income/edit/(:any)'] = 'finance/libraries/income/edit/$1';