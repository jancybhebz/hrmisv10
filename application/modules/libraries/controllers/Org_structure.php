<?php 
/** 
Purpose of file:    Controller for Org Structure Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Org_structure extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/org_structure_model','employees/employees_model'));
    }

	public function index()
	{
		$this->arrData['arrOrganization'] = $this->org_structure_model->getData();
		$this->template->load('template/template_view', 'libraries/org_structure/list_view', $this->arrData);
	}
	
	//ADD HOLIDAY NAME
	public function add_exec()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrEmployees'] = $this->employees_model->getData();
			$this->template->load('template/template_view','libraries/org_structure/add_exec_view',$this->arrData);	
		}
		else
		{	
			$strExecOffice = $arrPost['strExecOffice'];
			$strExecName = $arrPost['strExecName'];
			$strExecHead = $arrPost['strExecHead'];
			$strHeadTitle = $arrPost['strHeadTitle'];
			$strSecretary = $arrPost['strSecretary'];
			if(!empty($strExecOffice) && !empty($strExecName) && !empty($strExecHead) && !empty($strHeadTitle) && !empty($strSecretary))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->org_structure_model->checkExist($strExecOffice, $strExecName))==0)
				{
					$arrData = array(
						'group1Code'=>$strExecOffice,
						'group1Name'=>$strExecName,
						'empNumber'=>$strExecHead,
						'group1HeadTitle'=>$strHeadTitle,
						'empNumber'=>$strSecretary,	
					);
					$blnReturn  = $this->org_structure_model->add_exec($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblgroup1','Added '.$strExecOffice.' Org_structure',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Executive Office added successfully.');
					}
					redirect('libraries/org_structure');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Organization Executive Office already exists.');
					$this->session->set_flashdata('strExecOffice',$strExecOffice);
					$this->session->set_flashdata('strExecName',$strExecName);
					redirect('libraries/org_structure/add_exec');
				}
			}
		}    	
    }

	public function edit_exec()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$strCode = urldecode($this->uri->segment(4));
			$this->arrData['arrOrganization']=$this->org_structure_model->getData($strCode);
			$this->arrData['arrEmployees'] = $this->employees_model->getData();
			$this->template->load('template/template_view','libraries/org_structure/edit_exec_view', $this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			$strExecOffice = $arrPost['strExecOffice'];
			$strExecName = $arrPost['strExecName'];
			$strExecHead = $arrPost['strExecHead'];
			$strHeadTitle = $arrPost['strHeadTitle'];
			$strSecretary= $arrPost['strSecretary'];
			if(!empty($strExecOffice) AND !empty($strExecName)) 
			{
				$arrData = array(
					'group1Code'=>$strExecOffice,
					'group1Name'=>$strExecName,
					'empNumber'=>$strExecHead,
					'group1HeadTitle'=>$strHeadTitle,
					'empNumber'=>$strSecretary
					
				);
				$blnReturn = $this->org_structure_model->save_exec($arrData, $strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblgroup1','Edited '.$strExecOffice.' Org_structure',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Executive name saved successfully.');
				}
				redirect('libraries/org_structure');
			}
		}	
	}

	
	public function delete_exec()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$strCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrOrganization'] = $this->org_structure_model->getData($strCode);
			$this->template->load('template/template_view','libraries/org_structure/delete_exec_view',$this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			//add condition for checking dependencies from other tables
			if(!empty($strCode))
			{
				$arrOrganization = $this->org_structure_model->getData($strCode);
				$strExecName = $arrOrganization[0]['group1Name'];	
				$blnReturn = $this->org_structure_model->delete_exec($strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblgroup1','Deleted '.$strExecOffice.' Org_structure',implode(';',$arrOrganization[0]),'');
	
					$this->session->set_flashdata('strMsg','Executive name deleted successfully.');
				}
				redirect('libraries/org_structure');
			}
		}
		
	}

	
}
