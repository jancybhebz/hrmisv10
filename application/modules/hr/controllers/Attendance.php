<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('Hr_model'));
    }

    public function conversion_table()
	{
		$this->load->library('Conversion_table/Conversion');
		$this->Conversion = new Conversion();

        $this->arrData['convii'] = $this->Conversion->conversion_ii();
        $this->arrData['conv8hrs'] = $this->Conversion->conversion_based8hrs();
        $this->arrData['conviii'] = $this->Conversion->conversion_iii();
        $this->arrData['conviv1'] = $this->Conversion->conversion_iv(1);
        $this->arrData['conviv2'] = $this->Conversion->conversion_iv();
		$this->template->load('template/template_view','attendance/conversion_table/_view', $this->arrData);
	}

	public function view_all()
	{
		$this->arrData['arrEmployees'] = $this->Hr_model->getData('','','all');
		$this->template->load('template/template_view','attendance/attendance_summary/_viewall',$this->arrData);

	}

	public function attendance_summary()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance_update()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_monetization()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function filed_request()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function override()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function qr_code()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}


   
	
}
