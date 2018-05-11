<?php 
/** 
Purpose of file:    Controller for Project Code Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Holiday extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/holiday_model'));
    }

	public function index()
	{
		$this->arrData['arrProject'] = $this->holiday_model->getData();
		$this->template->load('template/template_view', 'libraries/holiday/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/holiday/add_view',$this->arrData);	
		}
		else
		{	
			$strHolidayCode = $arrPost['strHolidayCode'];
			$strHolidayName = $arrPost['strHolidayName'];
			if(!empty($strHolidayCode) && !empty($strHolidayName))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->holiday_model->checkExist($strHolidayCode, $strHolidayName))==0)
				{
					$arrData = array(
						'holidayCode'=>$strHolidayCode,
						'holidayName'=>$strHolidayName
						
					);
					$blnReturn  = $this->holiday_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblholiday','Added '.$strHolidayCode.' Holiday',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strMsg','Holiday added successfully.');
					}
					redirect('libraries/holiday');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Holiday code and/or Holiday Name already exists.');
					$this->session->set_flashdata('strHolidayCode',$strHolidayCode);
					$this->session->set_flashdata('strHolidayName',$strHolidayName);
					redirect('libraries/holiday/add');
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
			$intProjectId = urldecode($this->uri->segment(4));
			$this->arrData['arrHoliday']=$this->holiday_model->getData($intProjectId);
			$this->template->load('template/template_view','libraries/project_code/edit_view', $this->arrData);
		}
		else
		{
			$intProjectId = $arrPost['intProjectId'];
			$strProjectCode = $arrPost['strProjectCode'];
			$strProjectDescription = $arrPost['strProjectDescription'];
			$intProjectOrder = $arrPost['intProjectOrder'];
			if(!empty($strProjectCode) AND !empty($strProjectDescription) AND !empty($intProjectOrder)) 
			{
				$arrData = array(
					'projectCode'=>$strProjectCode,
					'projectDesc'=>$strProjectDescription,
					'projectOrder'=>$intProjectOrder
				);
				$blnReturn = $this->project_code_model->save($arrData, $intProjectId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblproject','Edited '.$strProjectDescription.' Project_code',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Project code saved successfully.');
				}
				redirect('libraries/project_code');
			}
		}
		
	}
	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intProjectId = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->project_code_model->getData($intProjectId);
			$this->template->load('template/template_view','libraries/project_code/delete_view',$this->arrData);
		}
		else
		{
			$intProjectId = $arrPost['intProjectId'];
			//add condition for checking dependencies from other tables
			if(!empty($intProjectId))
			{
				$arrProject = $this->project_code_model->getData($intProjectId);
				$strProjectDescription = $arrProject[0]['projectDesc'];	
				$blnReturn = $this->project_code_model->delete($intProjectId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblproject','Deleted '.$strProjectDescription.' Project_code',implode(';',$arrProject[0]),'');
	
					$this->session->set_flashdata('strMsg','Project code deleted successfully.');
				}
				redirect('libraries/project_code');
			}
		}
		
	}
}
