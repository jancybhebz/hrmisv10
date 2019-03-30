<?php 
/** 
Purpose of file:    Controller for Reports
Author:             Louie Carl R. Mandapat
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
		$this->fpdf->Open();

    	switch($rpt) 
    	{
    		case 'AR': 
    			$this->load->model('AcceptanceResignation_model');
				$this->AcceptanceResignation_model->generate($arrGet);
    		break;
    		case 'ALC':
    			$this->load->model('AccumulatedLeaveCredits_model');
				$this->AccumulatedLeaveCredits_model->generate($arrGet);
    		break;
    		case 'ADR':
    			$this->load->model('AssumptionDutiesResponsibilities_model');
				$this->AssumptionDutiesResponsibilities_model->generate($arrGet);
    		break;
    		case 'CDR':
    			$this->load->model('CertificateDutiesResponsibilities_model');
				$this->CertificateDutiesResponsibilities_model->generate($arrGet);
    		break;
    		case 'CEC':
    			$this->load->model('CertificateEmployeeCompensation_model');
				$this->CertificateEmployeeCompensation_model->generate($arrGet);
    		break;
    		case 'CNAC':
    			$this->load->model('CertificateNoAdministrativeCharge_model');
				$this->CertificateNoAdministrativeCharge_model->generate($arrGet);
    		break;
    		case 'CNACLP':
    			$this->load->model('CertificateNoAdministrativeChargeLegalPurpose_model');
				$this->CertificateNoAdministrativeChargeLegalPurpose_model->generate($arrGet);
    		break;
    		case 'CNACL':
    			$this->load->model('CertificateServiceLoyaltyAward_model');
				$this->CertificateServiceLoyaltyAward_model->generate($arrGet);
    		break;
    		case 'LEA':
    			$this->load->model('ListEducationalAttainment_model');
				$this->ListEducationalAttainment_model->generate($arrGet);
    		break;
    		case 'LEAGE':
    			$this->load->model('ListEmployeesAge_model');
				$this->ListEmployeesAge_model->generate($arrGet);
    		break;
    		case 'LEDH':
    			$this->load->model('ListEmployeesDateHired_model');
				$this->ListEmployeesDateHired_model->generate($arrGet);
    		break;
    	}

    	
	}
   
	
}
