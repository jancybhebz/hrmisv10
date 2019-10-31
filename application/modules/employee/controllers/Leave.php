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
	
	function getworking_days()
	{
		$this->load->helper('dtr_helper');
		$this->load->model('libraries/Holiday_model');
		
		$empid = $_GET['empid'];
		$datefrom = $_GET['datefrom'];
		$dateto = $_GET['dateto'];
		$holidays = $this->Holiday_model->getAllHolidates($empid,$datefrom,$dateto);
		$working_days = get_workingdays('','',$holidays,$datefrom,$dateto);
		echo json_encode($working_days);
	}
	
    function add_leave()
    {
    	echo '<pre>';
    	$arrPost = $this->input->post();
		if(!empty($arrPost)) {
			print_r($arrPost);
			$curr_leave = $this->leave_model->getleave($arrPost['txtempno'],$arrPost['dtmLeavefrom'],$arrPost['dtmLeaveto']);
			if(count($curr_leave) < 1):
				$arrData = array(
					'requestDetails' => implode(',',array($arrPost['strDay'],$arrPost['dtmLeavefrom'],$arrPost['dtmLeaveto'],$arrPost['intDaysApplied'],$arrPost['str1stSignatory'],$arrPost['str2ndSignatory'],$arrPost['strReason'],$arrPost['intVL'],$arrPost['intSL'])),	
					'requestDate'	 => date('Y-m-d'),
					'requestStatus'  => 'Filed Request',
					'requestCode'	 => 'Leave',
					'empNumber'		 => $arrPost['txtempno']);
				$this->leave_model->add_leave_request($arrData);

				if($_FILES['userfile']['name'] != ''):
					$strEmpNum = $_SESSION['sessEmpNo'];

					$config['upload_path']   = 'uploads/employees/attachments/leave/'.$strEmpNum.'/';
					$config['allowed_types'] = 'pdf';
					$config['file_name'] = $strEmpNum."_".date('YmdHis').".pdf"; 
					$config['overwrite'] = TRUE;

					$this->load->library('upload', $config);
					$this->upload->initialize($config);
						
					if(!is_dir($config['upload_path'])):
						mkdir($config['upload_path'], 0777, TRUE);
					endif;

					if(!$this->upload->do_upload('userfile')):
						$error = array('error' => $this->upload->display_errors());
						$this->session->set_flashdata('strErrorMsg','Please try again!');
					else:
						$data = $this->upload->data();
						$this->session->set_flashdata('strSuccessMsg','Upload successfully saved.');
					endif;
				endif;

				$this->session->set_flashdata('strSuccessMsg','Leave has been submitted.');

				if(count($blnReturn) > 0):
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDay.' Leave',implode(';',$arrData),'');
				endif;
				redirect('employee/leave');
			else:
				$this->session->set_flashdata('strErrorMsg','Leave already exists.');
				redirect('employee/leave');
			endif;
		}
    }

    # begin employee leave balance
    public function leave_balance()
    {
    	$empid = $this->uri->segment(3);
    	$yr = isset($_GET['yr']) ? $_GET['yr'] : date('Y');
    	$this->arrData['leave_balance'] = $this->leave_model->getleave($empid, 0, $yr);

    	$this->template->load('template/template_view','employee/leave/leave_employee_view', $this->arrData);
    }
    # end employee leave balance
}
