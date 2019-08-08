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
		if(empty($arrPost)):

			$this->load->model(array('hr/hr_model','finance/payroll_group_model'));
			// $this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
			// $this->arrData['pGroups'] = $this->payroll_group_model->getData();
			$this->arrData['arrGroups'] = $this->user_account_model->getPayrollGroup();
			$this->template->load('template/template_view','libraries/user_account/add_view',$this->arrData);	
		
		else:

			$empNumber = $arrPost['strEmpName'];
			$userName = $arrPost['strUsername'];
			$userPassword = password_hash($arrPost['strPassword'],PASSWORD_BCRYPT);
			$userLevel = $arrPost['strAccessLevel'];
			$userPermission = ucwords(userlevel($userLevel));
			$oth_access = '';
			$is_assistant = 0;
			$access = '';
			switch ($userLevel):
				case 1:
					if($arrPost['hrmodule'] == 'hrassistant'):
						$notif 	= isset($arrPost['chkNotif']) ? $arrPost['chkNotif'] : '';
						$att 	= isset($arrPost['chkAttdnce']) ? $arrPost['chkAttdnce'] : '';
						$libs 	= isset($arrPost['chkLib']) ? $arrPost['chkLib'] : '';
						$sect	= isset($arrPost['chk201']) ? $arrPost['chk201'] : '';
						$rep 	= isset($arrPost['chkReports']) ? $arrPost['chkReports'] : '';
						$comp 	= isset($arrPost['chkCompen']) ? $arrPost['chkCompen'] : '';
						$access = implode('',array($notif,$sect,$att,$rep,$libs,$comp));
					else:
						$access = '123456';
						$is_assistant = 1;
					endif;
					$oth_access = $arrPost['hrmodule'];

					break;
				case 2:
					if($arrPost['financemodule'] == 'fassistant'):
						$notif 	= isset($arrPost['chkNotif2']) ? $arrPost['chkNotif2'] : '';
						$compen	= isset($arrPost['chkCompen2']) ? $arrPost['chkCompen2'] : '';
						$update	= isset($arrPost['chkUpdate']) ? $arrPost['chkUpdate'] : '';
						$rep 	= isset($arrPost['chkReports2']) ? $arrPost['chkReports2'] : '';
						$lib 	= isset($arrPost['chkLib2']) ? $arrPost['chkLib2'] : '';
						$access = implode('',array($notif,$compen,$update,$rep,$lib));
					else:
						$access = '01234';
						$is_assistant = 1;
					endif;
					$oth_access = $arrPost['financemodule'];

					break;
			endswitch;

			$arrData = array('empNumber' 		=> $empNumber,
							 'userName'			=> $userName,
							 'userPassword' 	=> $userPassword,
							 'userLevel' 		=> $userLevel,
							 'userLevel' 		=> $userLevel,
							 'is_assistant' 	=> $userPermission,
							 'accessPermission' => $access);
			
			if(count($this->user_account_model->check_user_exists($userName,$empNumber)) > 0):
				$this->session->set_flashdata('strErrorMsg','Username / Employee already exists.');
				$this->session->set_flashdata('empNumber',$empNumber);
				$this->session->set_flashdata('userName',$userName);
				$this->session->set_flashdata('userPassword',$userPassword);
				$this->session->set_flashdata('userLevel',$userLevel);
				$this->session->set_flashdata('userPermission',$userPermission);
				$this->session->set_flashdata('accessPermission',$access);
				$this->session->set_flashdata('oth_access',$oth_access);
				redirect('libraries/user_account/add');
			else:
				$new_employee = $this->user_account_model->add($arrData);

				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempaccount','Added '.$userName.' User_account',implode(';',$arrData),'');
				$this->session->set_flashdata('strSuccessMsg','User Account added successfully.');
				redirect('libraries/user_account');
			endif;
		endif;

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
			// HR tabs
			$radio1 = isset($arrPost['radio1']) ? $arrPost['radio1'] : '0';
			$chkNotif = isset($arrPost['chkNotif']) ? $arrPost['chkNotif'] : '';
			$chkAttdnce = isset($arrPost['chkAttdnce']) ? $arrPost['chkAttdnce'] : '';
			$chkLib = isset($arrPost['chkLib']) ? $arrPost['chkLib'] : '';
			$chk201 = isset($arrPost['chk201']) ? $arrPost['chk201'] : '';
			$chkReports = isset($arrPost['chkReports']) ? $arrPost['chkReports'] : '';
			$chkCompen = isset($arrPost['chkCompen']) ? $arrPost['chkCompen'] : '';
			$radioHRMO = isset($arrPost['radioHRMO']) ? $arrPost['radioHRMO'] : '';
			$chkALL = isset($arrPost['chkALL']) ? $arrPost['chkALL'] : '';
			// Finance tabs
			$radio1 = isset($arrPost['radio1']) ? $arrPost['radio1'] : '0';
			$chkNotif2 = isset($arrPost['chkNotif2']) ? $arrPost['chkNotif2'] : '';
			$chkCompen2 = isset($arrPost['chkCompen2']) ? $arrPost['chkCompen2'] : '';
			$chkUpdate = isset($arrPost['chkUpdate']) ? $arrPost['chkUpdate'] : '';
			$chkReports2 = isset($arrPost['chkReports2']) ? $arrPost['chkReports2'] : '';
			$chkLib2 = isset($arrPost['chkLib2']) ? $arrPost['chkLib2'] : '';
			if(!empty($strAccessLevel) AND !empty($strEmpName) AND !empty($strUsername))
			{
				if ($strAccessLevel =='1')
				{
					$arrData = array(
						'userLevel'=>$strAccessLevel,
						'empNumber'=>$strEmpName,
						'userName'=>$strUsername,
						'accessPermission'=>$radio1.';'.$chkNotif.';'.$chkAttdnce.';'.$chkLib.';'.$chk201.';'.$chkReports.';'.$chkCompen.';'.$radioHRMO.';'.$chkALL 
				 );
				}
				if ($strAccessLevel =='2')
				{
					$arrData = array(
						'userLevel'=>$strAccessLevel,
						'empNumber'=>$strEmpName,
						'userName'=>$strUsername,
						'accessPermission'=>$radio1.';'.$chkNotif2.';'.$chkCompen2.';'.$chkUpdate.';'.$chkReports2.';'.$chkLib2
				 );
				}
				else 
				{
					$arrData = array(
						'userLevel'=>$strAccessLevel,
						'empNumber'=>$strEmpName,
						'userName'=>$strUsername,
						'accessPermission'=>''
				 );
				}
				// print_r($arrPost);
				// exit(1);
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
