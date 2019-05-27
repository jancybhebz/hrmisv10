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
        $this->load->model(array('Process_model'));
        $this->arrData = array();
    }

	public function index()
	{
		$this->arrData['arrProcess'] = $this->Process_model->getData(10,2016);
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

}
/* End of file MonthlyReports.php
 * Location: ./application/modules/finance/controllers/reports/MonthlyReports.php */