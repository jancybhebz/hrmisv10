<?php 
/** 
Purpose of file:    Controller for Payroll Group Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payroll_group extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/payroll_group_model','libraries/project_code_model'));
    }

	public function index()
	{
		$this->arrData['arrPayrollGroup'] = $this->payroll_group_model->getData();
		$this->arrData['arrProject']=$this->project_code_model->getData(); 
		// $this->arrTemplateData['arrPG']=$this->employeename_model->getDetails();
		$this->template->load('template/template_view', 'libraries/payroll_group/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	

			$this->template->load('template/template_view','libraries/payroll_group/add_view',$this->arrData);	
		}
		else
		{	
			$strProject = $arrPost['strProject'];
			$strPayrollGroupCode = $arrPost['strPayrollGroupCode'];
			$strPayrollGroupDesc = $arrPost['strPayrollGroupDesc'];
			$strPayrollGroupOrder = $arrPost['strPayrollGroupOrder'];
			$strResponsibilityCntr = $arrPost['strResponsibilityCntr'];
			if(!empty($strProject) && !empty($strPayrollGroupCode) && !empty($strPayrollGroupDesc) && !empty($strPayrollGroupOrder) && !empty($strResponsibilityCntr))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->payroll_group_model->checkExist($strProject, $strPayrollGroupCode))==0)
				{
					$arrData = array(
						'projectCode'=>$strProject,
						'payrollGroupCode'=>$strPayrollGroupCode,
						'payrollGroupName'=>$strPayrollGroupDesc,
						'payrollGroupOrder'=>$strPayrollGroupOrder,
						'payrollGroupRC'=>$strResponsibilityCntr
					);
					$blnReturn  = $this->payroll_group_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblpayrollgroup','Added '.$strProject.' Payroll_Group',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strMsg','Payroll group added successfully.');
					}
					redirect('libraries/payroll_group');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Payroll group already exists.');
					$this->session->set_flashdata('strProject',$strProject);
					$this->session->set_flashdata('strPayrollGroupCode',$strPayrollGroupCode);
					$this->session->set_flashdata('strPayrollGroupDesc',$strPayrollGroupDesc);	
					$this->session->set_flashdata('strPayrollGroupOrder',$strPayrollGroupOrder);
					$this->session->set_flashdata('strResponsibilityCntr',$strResponsibilityCntr);				//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/payroll_group/add');
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
			$this->arrData['arrPayrollGroup']=$this->payroll_group_model->getData($intPayrollGroupId);
			$this->template->load('template/template_view','libraries/payroll_group/edit_view', $this->arrData);
		}
		else
		{
			$intPayrollGroupId = $arrPost['intPayrollGroupId'];
			$strProject = $arrPost['strProject'];
			$strPayrollGroupCode = $arrPost['strPayrollGroupCode'];
			$strPayrollGroupDesc = $arrPost['strPayrollGroupDesc'];
			$strPayrollGroupOrder = $arrPost['strPayrollGroupOrder'];
			$strResponsibilityCntr = $arrPost['strResponsibilityCntr'];
			if(!empty($strProject) AND !empty($strPayrollGroupCode) AND !empty($strPayrollGroupDesc)) 
			{
				$arrData = array(
					'projectCode'=>$strProject,
					'projectDesc'=>$strPayrollGroupCode,
					'projectOrder'=>$strPayrollGroupDesc,
					'projectOrder'=>$strPayrollGroupOrder,
					'projectOrder'=>$strResponsibilityCntr
				);
				$blnReturn = $this->payroll_group_model->save($arrData, $intPayrollGroupId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblpayrollgroup','Edited '.$strProject.' Payroll_Group',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Payroll group saved successfully.');
				}
				redirect('libraries/payroll_group');
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
			$this->template->load('template/template_view','libraries/payroll_group/delete_view',$this->arrData);
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
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblpayrollgroup','Deleted '.$strProject.' Payroll_Group',implode(';',$arrPayrollGroup[0]),'');
	
					$this->session->set_flashdata('strMsg','Payroll group deleted successfully.');
				}
				redirect('libraries/payroll_group');
			}
		}
		
	}
}
