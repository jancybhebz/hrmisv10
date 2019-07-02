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
        $this->load->model(array('libraries/user_account_model','hr/hr_model','finance/payroll_group_model'));
    }

	public function index()
	{
		$this->arrData['arrUser'] = $this->user_account_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
		$this->arrData['arrEmployees'] = $this->hr_model->getData();
		// $this->arrData['pGroups'] = $this->payroll_group_model->getData();

		$this->template->load('template/template_view', 'libraries/user_account/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->load->model(array('hr/hr_model','finance/payroll_group_model'));
			// $this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			// $this->arrData['pGroups'] = $this->payroll_group_model->getData();
			$this->arrData['arrGroups'] = $this->user_account_model->getPayrollGroup();
			$this->template->load('template/template_view','libraries/user_account/add_view',$this->arrData);	
		}
		else
		{	
			$strAccessLevel = $arrPost['strAccessLevel'];
			$strEmpName = $arrPost['strEmpName'];
			$strUsername = $arrPost['strUsername'];
			$strPassword = password_hash($arrPost['strPassword'],PASSWORD_BCRYPT);
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
					
						$this->session->set_flashdata('strSuccessMsg','User Account added successfully.');
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
			// $this->arrData['arrUserLevel']=$this->user_account_model->getUserLevel();
			$this->arrData['arrUserLevel']=$this->user_account_model->getUserLevel();
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			$this->template->load('template/template_view','libraries/user_account/edit_view', $this->arrData);
		}
		else
		{
			$intEmpNumber = $arrPost['intEmpNumber'];
			$strAccessLevel = $arrPost['strAccessLevel'];
			$strEmpName = $arrPost['strEmpName'];
			$strUsername = $arrPost['strUsername'];
			if(!empty($strAccessLevel) AND !empty($strEmpName) AND !empty($strUsername))
			{
				$arrData = array(
					'userLevel'=>$strAccessLevel,
					'empNumber'=>$strEmpName,
					'userName'=>$strUsername
				);

				$blnReturn = $this->user_account_model->save($arrData, $intEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Edited '.$strUsername.' User_account',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','User Account saved successfully.');
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

	public function changePassword()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array('userPassword' => password_hash($arrPost['txtnewpass'],PASSWORD_BCRYPT));

			$res = $this->user_account_model->save($arrData, $this->session->userdata('sessEmpNo'));
			if(count($res)>0):
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Update Password '.$strUsername.' User_account',implode(';',$arrData),'');
				
				$this->session->set_flashdata('strSuccessMsg','Password updated successfully.');
			endif;
			redirect('home');
		endif;
	}

	public function reset()
	{
		// $this->template->load('template/template_view', 'libraries/user_account/reset_view', $this->arrData);

		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$intEmpNumber = urldecode($this->uri->segment(4));
			$this->template->load('template/template_view','libraries/user_account/reset_view', $this->arrData);
		}
		else
		{
			$intEmpNumber = $arrPost['intEmpNumber'];
			$strPassword = password_hash($arrPost['strPassword'],PASSWORD_BCRYPT);
			if(!empty($strPassword)) 
			{
				$arrData = array(
					'userPassword'=>$strPassword
				);

				// print_r($arrPost);
				// exit(1);
				$blnReturn = $this->user_account_model->save($arrData, $intEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Edited User Password for '.$intEmpNumber,implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Password updated successfully.');
				}
				redirect('libraries/user_account');
			}
		}
	}


}
