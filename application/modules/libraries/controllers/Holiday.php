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
		$this->arrData['arrHoliday'] = $this->holiday_model->getData();
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
			$strCode = urldecode($this->uri->segment(4));
			$this->arrData['arrHoliday']=$this->holiday_model->getData($strCode);
			$this->template->load('template/template_view','libraries/holiday/edit_view', $this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			$strHolidayCode = $arrPost['strHolidayCode'];
			$strHolidayName = $arrPost['strHolidayName'];
			if(!empty($strHolidayCode) AND !empty($strHolidayName)) 
			{
				$arrData = array(
					'holidayCode'=>$strHolidayCode,
					'holidayName'=>$strHolidayName
					
				);
				$blnReturn = $this->holiday_model->save($arrData, $strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblholiday','Edited '.$strHolidayCode.' Holiday',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Holiday saved successfully.');
				}
				redirect('libraries/holiday');
			}
		}
		
	}
	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$strCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->holiday_model->getData($strCode);
			$this->template->load('template/template_view','libraries/holiday/delete_view',$this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			//add condition for checking dependencies from other tables
			if(!empty($strCode))
			{
				$arrHoliday = $this->holiday_model->getData($strCode);
				$strHolidayCode = $arrHoliday[0]['holidayCode'];	
				$blnReturn = $this->holiday_model->delete($strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblholiday','Deleted '.$strHolidayCode.' Holiday',implode(';',$arrHoliday[0]),'');
	
					$this->session->set_flashdata('strMsg','Holiday deleted successfully.');
				}
				redirect('libraries/holiday');
			}
		}
		
	}
}
