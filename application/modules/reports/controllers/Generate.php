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

class Generate extends MY_Controller
{
	var $arrData;
	
	function __construct() {
        parent::__construct();
        //$this->load->model(array('hr/reports_model','libraries/user_account_model','hr/Hr_model'));
    }
	
	public function report()
    {
    	$arrGet = $this->input->get();
    	$rpt = $arrGet['rpt'];
    	$empno = $arrGet['empno'];

    	$this->load->library('fpdf_gen');
		$this->fpdf = new FPDF();
		$this->fpdf->AliasNbPages();
		//$this->fpdf->Open();

    	switch($rpt) 
    	{
    		case 'AR': 
    			$this->load->model('AcceptanceResignation_model');
    			//$this->load->model('hr/reports_model');
    			//include('report/AcceptanceResignation_model');
    			
    			//print_r($arrGet);
				$arrData=array(
					'empno'=>$empno
				);
				$this->AcceptanceResignation_model->generate($arrGet);
    		break;
    	}

    	
	}
   
	
}
