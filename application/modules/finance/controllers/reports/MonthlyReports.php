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
        $this->load->model(array('Payroll_process_model'));
        $this->arrData = array();
    }

	public function index()
	{
		$this->arrData['arrProcess'] = $this->Payroll_process_model->get_payroll_process(currmo(),curryr(),isset($_GET['appt']) ? $_GET['appt'] : '');
		$this->template->load('template/template_view','finance/reports/monthly_reports/mreports_view',$this->arrData);
	}

	public function payslip()
	{
		$arrGet=$this->input->get();
		// $rpt=$arrGet['rpt'];
		
		$this->load->model('reports/payslip/Payslip');
			$arrData=array('empno'=>$arrGet['empno']);
		$this->Payslip->generate($arrData);
	}

	public function remittances()
	{
		$this->load->model('reports/remittances/Remittances');
		$this->Remittances->generate();
	}

}
/* End of file MonthlyReports.php
 * Location: ./application/modules/finance/controllers/reports/MonthlyReports.php */