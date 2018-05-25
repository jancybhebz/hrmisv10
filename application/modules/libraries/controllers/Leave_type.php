<?php 
/** 
Purpose of file:    Controller for Leave type Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_type extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/leave_type_model'));
    }

	public function index()
	{
		$this->arrData['arrLeave'] = $this->leave_type_model->getData();
		$this->template->load('template/template_view', 'libraries/leave_type/list_view', $this->arrData);
	}
	
	//ADD HOLIDAY NAME
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/leave_type/add_view',$this->arrData);	
		}
		else
		{	
			$strLeaveCode = $arrPost['strLeaveCode'];
			$strLeaveType = $arrPost['strLeaveType'];
			$intDays = $arrPost['intDays'];
			if(!empty($strLeaveCode) && !empty($strLeaveType) && !empty($intDays))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->leave_type_model->checkExist($strLeaveCode, $strLeaveType))==0)
				{
					$arrData = array(
						'leaveCode'=>$strLeaveCode,
						'leaveType'=>$strLeaveType,
						'numOfDays'=>$intDays	
					);
					$blnReturn  = $this->leave_type_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblleave','Added '.$strLeaveCode.' Leave_type',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Leave type added successfully.');
					}
					redirect('libraries/leave_type');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Leave type already exists.');
					$this->session->set_flashdata('strLeaveCode',$strLeaveCode);
					$this->session->set_flashdata('strLeaveType',$strLeaveType);
					redirect('libraries/leave_type/add');
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
			$strCode = urldecode($this->uri->segment(4));
			$this->arrData['arrLeave']=$this->leave_type_model->getData($strCode);
			$this->template->load('template/template_view','libraries/leave_type/edit_view', $this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			$strLeaveCode = $arrPost['strLeaveCode'];
			$strLeaveType = $arrPost['strLeaveType'];
			$intDays = $arrPost['intDays'];
			if(!empty($strLeaveCode) AND !empty($strLeaveType)) 
			{
				$arrData = array(
					'leaveCode'=>$strLeaveCode,
					'leaveType'=>$strLeaveType,
					'numOfDays'=>$intDays
					
				);
				$blnReturn = $this->leave_type_model->save($arrData, $strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblleave','Edited '.$strLeaveCode.' Leave_type',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Leave type saved successfully.');
				}
				redirect('libraries/leave_type');
			}
		}	
	}

	public function add_special()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrLeave'] = $this->leave_type_model->getData();
			$this->template->load('template/template_view','libraries/leave_type/add_special_view',$this->arrData);	
		}
		else
		{	
			$strSpecialLeaveCode = $arrPost['strSpecialLeaveCode'];
			$strSpecial = $arrPost['strSpecial'];
			if(!empty($strSpecialLeaveCode) && !empty($strSpecial))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->leave_type_model->check($strSpecial))==0)
				{
					$arrData = array(
						'leaveCode'=>$strSpecialLeaveCode,
						'specifyLeave'=>$strSpecial
					);
					$blnReturn  = $this->leave_type_model->add_special($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblspecificleave','Added '.$strSpecialLeaveCode.' Leave_type',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Leave type added successfully.');
					}
					redirect('libraries/leave_type/add_special');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Special leave already exists.');
					$this->session->set_flashdata('strSpecialLeaveCode',$strSpecialLeaveCode);
					$this->session->set_flashdata('strSpecial',$strSpecial);
					redirect('libraries/leave_type/add_special');
				}
			}
		}    	
    }

	public function edit_special()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$strSpecialCode = urldecode($this->uri->segment(4));
			$this->arrData['arrSpecialLeave']=$this->leave_type_model->getSpecialLeave($strSpecialCode);
			$this->template->load('template/template_view','libraries/leave_type/edit_special_view', $this->arrData);
		}
		else
		{
			$strSpecialCode = $arrPost['strSpecialCode'];
			$strSpecialLeaveCode = $arrPost['strSpecialLeaveCode'];
			$strSpecial = $arrPost['strSpecial'];
			
			if(!empty($strSpecialLeaveCode) AND !empty($strSpecial)) 
			{
				$arrData = array(
					'leaveCode'=>$strSpecialLeaveCode,
					'specifyLeave'=>$strSpecial
					
				);
				$blnReturn = $this->leave_type_model->save_special($arrData, $strSpecialCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblspecificleave','Edited '.$strSpecialLeaveCode.' Leave_type',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Special leave saved successfully.');
				}
				redirect('libraries/leave_type/add_special');
			}
		}	
	}
	
	public function delete_special()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$strSpecialCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrLeave']=$this->leave_type_model->getSpecialLeave($strSpecialCode);
			$this->template->load('template/template_view','libraries/leave_type/delete_special_view',$this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			//add condition for checking dependencies from other tables
			if(!empty($strCode))
			{
				$arrLeave = $this->leave_type_model->getData($strSpecialCode);
				$strSpecial = $arrLeave[0]['specifyLeave'];	
				$blnReturn = $this->leave_type_model->delete_special($strSpecialCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblspecificleave','Deleted '.$strSpecialLeaveCode.' Holiday',implode(';',$arrHoliday[0]),'');
	
					$this->session->set_flashdata('strMsg','Special leave deleted successfully.');
				}
				redirect('libraries/holiday');
			}
		}
		
	}

	
}
