<?php 
/** 
Purpose of file:    Controller for Leave
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/leave_model', 'libraries/user_account_model','hr/hr_model'));
    }

	public function index()
	{
		$this->arrData['arrUser'] = $this->user_account_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
		$this->arrData['arrEmployees'] = $this->hr_model->getData();

		$this->arrData['arrBalance'] = $this->leave_model->getLatestBalance($_SESSION['sessEmpNo']);
		$this->template->load('template/template_view', 'employee/leave/leave_view', $this->arrData);
	}
	
	
    public function submitFL()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];

			$strStatus=$arrPost['strStatus'];
			$strCode1=$arrPost['strCode1'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDay.';'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$intDaysApplied.';'.$str1stSignatory.';'.$str2ndSignatory.';'.$intVL.';'.$intSL,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode1,
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitFL($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }

    public function submitSPL()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];
			$strReason=$arrPost['strReason'];

			$strStatus=$arrPost['strStatus'];
			$strCodeSPL=$arrPost['strCodeSPL'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDay.';'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$intDaysApplied.';'.$str1stSignatory.';'.$str2ndSignatory.';'.$strReason.';'.$intVL.';'.$intSL,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCodeSPL,
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitSPL($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }

    public function submitSL()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];
			$strReason=$arrPost['strReason'];
			$strIncaseSL=$arrPost['strIncaseSL'];

			$strStatus=$arrPost['strStatus'];
			$strCode3=$arrPost['strCode3'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDay.';'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$intDaysApplied.';'.$str1stSignatory.';'.$str2ndSignatory.';'.$strReason.';'.$strIncaseSL.';'.$intVL.';'.$intSL,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode3,
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitSL($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }
    public function submitVL()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];
			$strReason=$arrPost['strReason'];
			$strIncaseVL=$arrPost['strIncaseVL'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						#$leavetype;$"leave";$date_from;date_to;$reason;$nodays;$vlbalance;$slbalance;$period;$signatory1;$signatory2
						'requestDetails'=>'VL;Leave;'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$strReason.';'.$strIncaseVL.';'.$intVL.';'.$intSL.';;'.$str1stSignatory.';'.$str2ndSignatory,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>'Filed Request',
						'requestCode'=>'Leave',
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitVL($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }
    public function submitML()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];
			$strReason=$arrPost['strReason'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDay.';'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$intDaysApplied.';'.$str1stSignatory.';'.$str2ndSignatory.';'.$strReason.';'.$intVL.';'.$intSL,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitML($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }
    public function submitPL()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];
			$strReason=$arrPost['strReason'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDay.';'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$intDaysApplied.';'.$str1stSignatory.';'.$str2ndSignatory.';'.$strReason.';'.$intVL.';'.$intSL,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitPL($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }
    public function submitSTL()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDay=$arrPost['strDay'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];
			$dtmLeaveto=$arrPost['dtmLeaveto'];
			$intDaysApplied=$arrPost['intDaysApplied'];
			$str1stSignatory=$arrPost['str1stSignatory'];
			$str2ndSignatory=$arrPost['str2ndSignatory'];
			$strReason=$arrPost['strReason'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			$intVL=$arrPost['intVL'];
			$intSL=$arrPost['intSL'];
			if(!empty($strDay))
			{	
				if( count($this->leave_model->checkExist($strDay))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDay.';'.$dtmLeavefrom.';'.$dtmLeaveto.';'.$intDaysApplied.';'.$str1stSignatory.';'.$str2ndSignatory.';'.$strReason.';'.$intVL.';'.$intSL,	
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
					);
					$blnReturn  = $this->leave_model->submitSTL($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave already exists.');
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }

    # begin employee leave balance
    public function leave_balance()
    {
    	// echo '<pre>';
    	$empid = $this->uri->segment(3);
    	$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
    	// print_r($lbalance);
    	// die();
    	$this->arrData['leave_balance'] = $this->leave_model->getleave($empid, 0, $yr);

    	$this->template->load('template/template_view','employee/leave/leave_employee_view', $this->arrData);
    }
    # end employee leave balance

    public function uploadLeaveDocs()
	{
		$arrPost = $this->input->post();
		$strEmpNum = $_SESSION['sessEmpNo'];
		$config['upload_path']          = 'uploads/employees/attachments/leave/'.$strEmpNum.'/';
        $config['allowed_types']        = 'pdf';
        $path = $_FILES['image']['userfile'];
		// $newName = "<Whatever name>".".".pathinfo($path, PATHINFO_EXTENSION); 
		$config['file_name'] = $strEmpNum.".pdf"; 
		$config['overwrite'] = TRUE;
		// print_r($config);
		// exit(1);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (!is_dir($config['upload_path'])) {
    		mkdir($config['upload_path'], 0777, TRUE);
			}

		if ( ! $this->upload->do_upload('userfile'))
		{
			// echo $this->upload->display_errors();
			$error = array('error' => $this->upload->display_errors());
			print_r($error);
			exit(1);
			$this->session->set_flashdata('strErrorMsg','Please try again!');
		}
		else
		{
			$data = $this->upload->data();
			$this->session->set_flashdata('strSuccessMsg','Upload successfully saved.');
			//rename($data['full_path'],$data['file_path'].$idTraining.$data['file_ext']);
			// print_r($data);
			// exit(1);
			
		}
		// print_r($error);
		// print_r($data);
		// exit(1);
		redirect('employee/leave');
		
	}


}
