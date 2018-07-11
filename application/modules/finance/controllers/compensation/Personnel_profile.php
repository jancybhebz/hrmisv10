<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnel_profile extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employees/employees_model'));
    }

	public function index()
	{
		$this->arrData['arrEmployees'] = $this->employees_model->getData();
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_all',$this->arrData);
	}

	public function employee($empid)
	{
		$res = $this->employees_model->getData($empid);
		$this->arrData['arrData'] = $res[0];
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}



}
/* End of file Deductions.php
 * Location: ./application/modules/finance/controllers/libraries/Deductions.php */