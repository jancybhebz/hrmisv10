<?php 
/** 
Purpose of file:    Controller for Reports
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller 
{
	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/reports_model'));
    }

	public function index()
	{
		$this->arrData['arrReports'] = $this->reports_model->getData();
		$this->template->load('template/template_view', 'hr/reports/reports_view', $this->arrData);
	}

	
	public function reports()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','hr/reports_view',$this->arrData);	
		}

	}

	
   
	
}
