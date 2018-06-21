<?php 
/** 
Purpose of file:    Controller for Request Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Request extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/request_model','employees/employees_model'));
    }

	public function index()
	{
		$this->arrData['arrRequest'] = $this->request_model->getData();
		$this->arrData['arrEmployees'] = $this->employees_model->getData();
		
		//$this->arrData['arrPayrollGroup'] = $this->payroll_group_model->getProjectDetails();
		
		// $this->arrTemplateData['arrPG']=$this->employeename_model->getDetails();
		$this->template->load('template/template_view', 'libraries/request/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrRequestType'] = $this->request_model->getRequestType();
			$this->arrData['arrApplicant'] = $this->request_model->getApplicant();
			$this->arrData['arrOfficeName'] = $this->request_model->getOfficeName();
			$this->arrData['arrEmployees'] = $this->employees_model->getData();
			$this->arrData['arrAction'] = $this->request_model->getAction();
			$this->arrData['arrSignatory'] = $this->request_model->getSignatory();
			$this->template->load('template/template_view','libraries/request/add_view',$this->arrData);	
		}
		else
		{	
			$strReqType = $arrPost['strReqType'];
			$strGenApplicant = $arrPost['strGenApplicant'];
			$strOfficeName = $arrPost['strOfficeName'];
			$strName = $arrPost['strName'];
			$str1stSigAction = $arrPost['str1stSigAction'];
			$str1stSignatory = $arrPost['str1stSignatory'];
			$str1stOfficer = $arrPost['str1stOfficer'];
			$str2ndSigAction = $arrPost['str2ndSigAction'];
			$str2ndSignatory = $arrPost['str2ndSignatory'];
			$str2ndOfficer = $arrPost['str2ndOfficer'];
			$str3rdSigAction = $arrPost['str3rdSigAction'];
			$str3rdSignatory = $arrPost['str3rdSignatory'];
			$str3rdOfficer = $arrPost['str3rdOfficer'];
			$str4thSigAction = $arrPost['str4thSigAction'];
			$str4thSignatory = $arrPost['str4thSignatory'];
			$str4thOfficer = $arrPost['str4thOfficer'];
			
			if(!empty($strReqType) && !empty($strGenApplicant) && !empty($str1stOfficer) && !empty($str4thOfficer))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->request_model->checkExist($strReqType, $strGenApplicant))==0)
				{
					$arrData = array(
						'RequestType'=>$strReqType,
						'Applicant'=>$strGenApplicant,
						// 'Applicant'=>$strOfficeName,
						// 'Applicant'=>$strName,
						// 'Signatory1'=>$str1stSigAction,
						// 'Signatory1'=>$str1stSignatory,
						'Signatory1'=>$str1stOfficer,
						// 'Signatory2'=>$str2ndSigAction,
						// 'Signatory2'=>$str2ndSignatory,
						'Signatory2'=>$str2ndOfficer,
						// 'Signatory3'=>$str3rdSigAction,
						// 'Signatory3'=>$str3rdSignatory,
						'Signatory3'=>$str3rdOfficer,
						// 'Signatory4'=>$str4thSigAction,
						// 'Signatory4'=>$str4thSignatory,
						'Signatory4'=>$str4thOfficer
					);
					$blnReturn  = $this->request_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblrequestflow','Added '.$strReqType.' Request',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request signatory added successfully.');
					}
					redirect('libraries/request');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request signatory already exists.');
					$this->session->set_flashdata('strReqType',$strReqType);
					$this->session->set_flashdata('strGenApplicant',$strGenApplicant);	
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/request/add');
				}
			}
		}
    }

    public function edit()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$intPayrollGroupId = urldecode($this->uri->segment(4));
			$this->arrData['arrProject']=$this->project_code_model->getData(); 
			$this->arrData['arrPayrollGroup']=$this->payroll_group_model->getData($intPayrollGroupId);
		
			$this->template->load('template/template_view','libraries/request/edit_view', $this->arrData);
		}
		else
		{
			$intPayrollGroupId = $arrPost['intPayrollGroupId'];
			$strProject = $arrPost['strProject'];
			$strPayrollGroupCode = $arrPost['strPayrollGroupCode'];
			$strPayrollGroupDesc = $arrPost['strPayrollGroupDesc'];
			$intPayrollGroupOrder = $arrPost['intPayrollGroupOrder'];
			$strResponsibilityCntr = $arrPost['strResponsibilityCntr'];
			//print_r($arrPost);
			if(!empty($strProject) AND !empty($strPayrollGroupCode) AND !empty($strPayrollGroupDesc) AND !empty($intPayrollGroupOrder) AND !empty($strResponsibilityCntr)) 
			{ //print_r($arrPost);
				$arrData = array(
					'projectCode'=>$strProject,
					'payrollGroupCode'=>$strPayrollGroupCode,
					'payrollGroupName'=>$strPayrollGroupDesc,
					'payrollGroupOrder'=>$intPayrollGroupOrder,
					'payrollGroupRC'=>$strResponsibilityCntr
				);
				$blnReturn = $this->payroll_group_model->save($arrData, $intPayrollGroupId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblpayrollgroup','Edited '.$strPayrollGroupCode.' Payroll_Group',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Payroll Group updated successfully.');
				}
				redirect('libraries/request');
			}
		}
		
	}

	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intPayrollGroupId = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->payroll_group_model->getData($intPayrollGroupId);
			$this->template->load('template/template_view','libraries/request/delete_view',$this->arrData);
		}
		else
		{
			$intPayrollGroupId = $arrPost['intPayrollGroupId'];
			//add condition for checking dependencies from other tables
			if(!empty($intPayrollGroupId))
			{
				$arrPayrollGroup = $this->payroll_group_model->getData($intPayrollGroupId);
				$strProject = $arrPayrollGroup[0]['strProject'];	
				$blnReturn = $this->payroll_group_model->delete($intPayrollGroupId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblpayrollgroup','Deleted '.$strPayrollGroupCode.' Payroll_Group',implode(';',$arrPayrollGroup[0]),'');
	
					$this->session->set_flashdata('strMsg','Payroll group deleted successfully.');
				}
				redirect('libraries/request');
			}
		}
		
	}
}
