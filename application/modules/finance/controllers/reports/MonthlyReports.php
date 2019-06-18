<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class MonthlyReports extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Payroll_process_model','libraries/Position_model'));
        $this->arrData = array();
    }

	public function index()
	{
		$this->arrData['arrProcess'] = $this->Payroll_process_model->get_payroll_process(currmo(),curryr());
		$this->template->load('template/template_view','finance/reports/monthly_reports/mreports_view',$this->arrData);
	}

	public function payslip()
	{
		$this->load->model('reports/payslip/Payslip');
		$this->Payslip->generate();
	}

	public function remittances()
	{
		$this->load->model('reports/remittances/Remittances');
		$this->Remittances->generate();
	}

	public function all_payslip()
	{
		// http://192.168.33.10/hrmis/finance/reports/monthlyreports/payslip?empno=0313-CO0-2012&rtype=1&remitt=&month=05&ps_yr=2019&remit_fr=2019&remit_to=2019&pgroup=5666&file_gen=&period=1&sign=&appt=
		$employees = $this->Position_model->getEmployee_Position($_GET['appt']);
		$this->load->model('reports/payslip/Payslip');
		$this->Payslip->generate_allemployees(array('employees' => array_column($employees,'empNumber'), 'pgroup' => $_GET['pprocess'], 'ps_yr' => $_GET['yr'], 'month' => $_GET['month'], 'period' => $_GET['period']));
	}


}
/* End of file MonthlyReports.php
 * Location: ./application/modules/finance/controllers/reports/MonthlyReports.php */