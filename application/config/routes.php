<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['Finance/deductions'] = 'Finance/deductions';
$route['Finance/deductions/add'] = 'Finance/add';
$route['Finance/deductions/edit/(:any)'] = 'Finance/edit/$1';
