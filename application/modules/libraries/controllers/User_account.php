<?php 
/** 
Purpose of file:    Controller for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_account extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/user_account_model','hr/hr_model'));
    }

	public function index()
	{
		$this->arrData['arrUser'] = $this->user_account_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
		$this->arrData['arrEmployees'] = $this->hr_model->getData();
		$this->template->load('template/template_view', 'libraries/user_account/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->load->model(array('hr/hr_model'));
			// $this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			$this->template->load('template/template_view','libraries/user_account/add_view',$this->arrData);	
		}
		else
		{	
			$strAccessLevel = $arrPost['strAccessLevel'];
			$strEmpName = $arrPost['strEmpName'];
			$strUsername = $arrPost['strUsername'];
			$strPassword = $arrPost['strPassword'];
			if(!empty($strAccessLevel) && !empty($strEmpName) && !empty($strUsername) && !empty($strPassword))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->user_account_model->checkExist($strAccessLevel, $strUsername))==0)
				{
					$arrData = array(
						'userLevel'=>$strAccessLevel,
						'empNumber'=>$strEmpName,
						'userName'=>$strUsername,
						'userPassword'=>$strPassword
					);
					$blnReturn  = $this->user_account_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Added '.$strUsername.' User_account',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strMsg','User Account added successfully.');
					}
					redirect('libraries/user_account');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Username/password already exists.');
					$this->session->set_flashdata('strAccessLevel',$strAccessLevel);
					$this->session->set_flashdata('strEmpName',$strEmpName);
					$this->session->set_flashdata('strUsername',$strUsername);
					$this->session->set_flashdata('strPassword',$strPassword);					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/user_account/add');
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
			$intEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrUser']=$this->user_account_model->getData($intEmpNumber);
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			$this->template->load('template/template_view','libraries/user_account/edit_view', $this->arrData);
		}
		else
		{
			$intEmpNumber = $arrPost['intEmpNumber'];
			$strAccessLevel = $arrPost['strAccessLevel'];
			$strEmpName = $arrPost['strEmpName'];
			$strUsername = $arrPost['strUsername'];
			$strPassword = $arrPost['strPassword'];
			if(!empty($strAccessLevel) AND !empty($strEmpName) AND !empty($strUsername) AND !empty($strPassword)) 
			{
				$arrData = array(
					'userLevel'=>$strAccessLevel,
					'empNumber'=>$strEmpName,
					'userName'=>$strUsername,
					'userPassword'=>$strPassword
				);
				$blnReturn = $this->user_account_model->save($arrData, $intEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Edited '.$strUsername.' User_account',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','User Account saved successfully.');
				}
				redirect('libraries/user_account');
			}
		}
		
	}
	public function delete()
	{
		$arrPost = $this->input->post();
		$intEmpNumber = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->user_account_model->getData($intEmpNumber);
			$this->template->load('template/template_view','libraries/user_account/delete_view',$this->arrData);
		}
		else
		{
			$intEmpNumber = $arrPost['intEmpNumber'];
			//add condition for checking dependencies from other tables
			if(!empty($intEmpNumber))
			{
				$arrUser = $this->user_account_model->getData($intEmpNumber);
				$strUsername = $arrUser[0]['userName'];	
				$blnReturn = $this->user_account_model->delete($intEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Deleted '.$strUsername.' User_account',implode(';',$arrUser[0]),'');
	
					$this->session->set_flashdata('strMsg','User Account deleted successfully.');
				}
				redirect('libraries/user_account');
			}
		}
		
	}
}
