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
	
	//ADD HOLIDAY NAME
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

	 //ADD LOCAL HOLIDAY
    public function add_local()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrLocHoliday'] = $this->holiday_model->getLocalHoliday();
			$this->template->load('template/template_view','libraries/holiday/add_local_view',$this->arrData);	
		}
		else
		{	
			$strLocalName = $arrPost['strLocalName'];
			$dtmHolidate = $arrPost['dtmHolidate'];
			// $dtmYear = $arrPost['dtmYear'];
			// $dtmMonth = $arrPost['dtmMonth'];
			// $dtmDay = $arrPost['dtmDay'];
			if(!empty($strLocalName) && !empty($dtmHolidate))
			{	
				// check if holiday name/date desc already exist
				if(count($this->holiday_model->checkLocExist($dtmHolidate))==0)
				{ //print_r($arrLocHoliday);
					$arrData = array(
						'holidayName'=>$strLocalName,
						'holidayDate'=>$dtmHolidate,
						// 'holidayYear'=>$dtmYear,
						// 'holidayMonth'=>$dtmMonth,
						// 'holidayDay'=>$dtmDay
					);
					$blnReturn  = $this->holiday_model->add_local($arrData);
					//print_r($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tbllocalholiday','Added '.$strLocalName.' Holiday',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Local Holiday added successfully.');
					}
					redirect('libraries/holiday');
				}
				else
				{	
					//print_r($arrData);
					$this->session->set_flashdata('strErrorMsg','Local Holiday already exists.');
					$this->session->set_flashdata('dtmHolidate',$dtmHolidate);
					// $this->session->set_flashdata('dtmYear',$dtmYear);
					// $this->session->set_flashdata('dtmMonth',$dtmMonth);
					// $this->session->set_flashdata('dtmDay',$dtmDay);
					redirect('libraries/holiday/add_local');
				}
			}
		}
    }

    public function edit_local()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$strLocCode = urldecode($this->uri->segment(4));
			$this->arrData['arrLocHoliday']=$this->holiday_model->getData($strLocCode);
			$this->arrData['arrLocHoliday'] = $this->holiday_model->getLocalHoliday();
			$this->template->load('template/template_view','libraries/holiday/edit_local_view', $this->arrData);
		}
		else
		{
			$strLocCode = $arrPost['strLocCode'];
			$strLocalName = $arrPost['strLocalName'];
			$dtmYear = $arrPost['dtmYear'];
			$dtmMonth = $arrPost['dtmMonth'];
			$dtmDay = $arrPost['dtmDay'];
			if(!empty($strLocalName) && !empty($dtmYear) && !empty($dtmMonth) && !empty($dtmDay))
			{	
				$arrData = array(
						'holidayName'=>$strLocalName,
						'holidayYear'=>$dtmYear,
						'holidayMonth'=>$dtmMonth,
						'holidayDay'=>$dtmDay
					
				);
				$blnReturn = $this->holiday_model->save_local($arrData, $strLocCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tbllocalholiday','Edited '.$strLocalName.' Holiday',implode(';',$arrData),'');
					$this->session->set_flashdata('strMsg','Local Holiday saved successfully.');
				}
				redirect('libraries/holiday');
			}
		}
	}

	public function delete_local()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$strLocCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->holiday_model->getData();
			$this->arrData['arrLocHoliday'] = $this->holiday_model->getLocalHoliday($strLocCode);
			$this->template->load('template/template_view','libraries/holiday/delete_local_view',$this->arrData);
		}
		else
		{
			$strLocCode = $arrPost['strLocCode'];
			//add condition for checking dependencies from other tables
			if(!empty($strLocCode))
			{
				$arrLocHoliday = $this->holiday_model->getData($strLocCode);
				$dtmYear = $arrLocHoliday[0]['holidayYear'];	
				$blnReturn = $this->holiday_model->delete_local($strLocCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tbllocalholiday','Deleted '.$strLocalName.' Holiday',implode(';',$arrLocHoliday[0]),'');
					$this->session->set_flashdata('strMsg','Local Holiday deleted successfully.');
				}
				redirect('libraries/holiday');
			}
		}
	}

    //MANAGE HOLIDAY 
    public function manage_add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrHoliday']=$this->holiday_model->getData();
			$this->arrData['arrManageHoliday'] = $this->holiday_model->getHolidayDate();
			$this->template->load('template/template_view','libraries/holiday/manage_add_view',$this->arrData);	
		}
		else
		{	
			$strHolidayName = $arrPost['strHolidayName'];
			$dtmYear = $arrPost['dtmYear'];
			$dtmMonth = $arrPost['dtmMonth'];
			$dtmDay = $arrPost['dtmDay'];
			if(!empty($strHolidayName) && !empty($dtmYear) && !empty($dtmMonth) && !empty($dtmDay))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->holiday_model->checkExist($strHolidayName, $dtmYear, $dtmMonth, $dtmDay))==0)
				{
					$arrData = array(
						'holidayName'=>$strHolidayName,
						'holidayYear'=>$dtmYear,
						'holidayMonth'=>$dtmMonth,
						'holidayDay'=>$dtmDay,
						
					);
					$blnReturn  = $this->holiday_model->manage_add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblholidayyear','Added '.$strHolidayName.' Holiday',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Holiday added successfully.');
					}
					redirect('libraries/holiday');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Holiday name and/or date already exists.');
					$this->session->set_flashdata('strHolidayName',$strHolidayName);
					$this->session->set_flashdata('dtmYear',$dtmYear);
					$this->session->set_flashdata('dtmMonth',$dtmMonth);
					$this->session->set_flashdata('dtmDay',$dtmDay);
					redirect('libraries/holiday/manage_add');
				}
			}
		}
    	
    }

}
