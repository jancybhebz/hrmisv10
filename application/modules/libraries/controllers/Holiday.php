<?php 
/** 
Purpose of file:    Controller for Holiday Library
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
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHoliday','Added '.$strHolidayCode.' Holiday',implode(';',$arrData),'');
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
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHoliday','Edited '.$strHolidayCode.' Holiday',implode(';',$arrData),'');
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
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHoliday','Deleted '.$strHolidayCode.' Holiday',implode(';',$arrHoliday[0]),'');
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
			$this->arrData['arrHoliday'] = $this->holiday_model->getData();
			$this->template->load('template/template_view','libraries/holiday/add_local_view',$this->arrData);	
		}
		else
		{	
			$strLocalName = $arrPost['strLocalName'];
			$dtmHolidayDate = $arrPost['dtmHolidayDate'];
			if(!empty($strLocalName) && !empty($dtmHolidayDate))
			{	
				// check if holiday name/date desc already exist
				if(count($this->holiday_model->checkLocExist($dtmHolidayDate))==0)
				{   
					$rs = $this->holiday_model->getData($strCode);
					$strLocalName = count($rs)>0?$rs[0]['holidayName']:'';
					$arrData = array(
						'holidayCode'=>$strLocalCode, 
						'holidayName'=>$strLocalName,
						'holidayDate'=>$dtmHolidayDate
				
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
					$this->session->set_flashdata('strLocalName',$strLocalName);
					$this->session->set_flashdata('dtmHolidayDate',$dtmHolidayDate);
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
			$strCode = urldecode($this->uri->segment(4));
			$this->arrData['arrLocHoliday'] = $this->holiday_model->getLocalHoliday($strCode);
			$this->template->load('template/template_view','libraries/holiday/edit_local_view', $this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			$strLocalName = $arrPost['strLocalName'];
			$dtmHolidate = $arrPost['dtmHolidate'];
			// $dtmYear = $arrPost['dtmYear'];
			// $dtmMonth = $arrPost['dtmMonth'];
			// $dtmDay = $arrPost['dtmDay'];
			if(!empty($strLocalName) && !empty($dtmHolidate))
			{	
				$arrData = array(
						'holidayName'=>$strLocalName,
						'holidayDate'=>$dtmHolidate
						// 'holidayYear'=>$dtmYear,
						// 'holidayMonth'=>$dtmMonth,
						// 'holidayDay'=>$dtmDay
					
				);
				$blnReturn = $this->holiday_model->save_local($arrData, $strCode);
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
		$strCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->holiday_model->getLocalHoliday($strCode);
			$this->template->load('template/template_view','libraries/holiday/delete_local_view',$this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			//add condition for checking dependencies from other tables
			if(!empty($strCode))
			{
				$arrLocHoliday = $this->holiday_model->getData($strCode);
				$strLocalName = $arrLocHoliday[0]['holidayName'];	
				$blnReturn = $this->holiday_model->delete_local($strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tbllocalholiday','Deleted '.$strLocalName.' Holiday',implode(';',$arrSignatory[0]),'');
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
			// $this->arrData['arrHolidayDate']=$this->holiday_model->getHolidayDate();
			$this->arrData['arrHoliday']=$this->holiday_model->getData();
			// $this->arrData['arrManageHoliday'] = $this->holiday_model->getHolidayDate();
			$this->template->load('template/template_view','libraries/holiday/manage_add_view',$this->arrData);	
		}
		else
		{	
			$strHolidayCode = $arrPost['strHolidayCode'];
			$dtmHolidayDate = $arrPost['dtmHolidayDate'];
			// $dtmYear = $arrPost['dtmYear'];
			// $dtmMonth = $arrPost['dtmMonth'];
			// $dtmDay = $arrPost['dtmDay'];
			if(!empty($strHolidayName) && !empty($strHolidayCode))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->holiday_model->checkHolidayExist($strHolidayCode, $dtmHolidayDate))==0)
				{
					$arrData = array(
						'holidayCode'=>$strHolidayCode,
						'holidayDate'=>$dtmHolidayDate,
						// 'holidayYear'=>$dtmYear,
						// 'holidayMonth'=>$dtmMonth,
						// 'holidayDay'=>$dtmDay,
						
					);
					$blnReturn  = $this->holiday_model->manage_add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHolidayYear','Added '.$strHolidayCode.' Holiday',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Holiday added successfully.');
					}
					redirect('libraries/holiday/manage_add');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Holiday name and/or date already exists.');
					$this->session->set_flashdata('strHolidayCode',$strHolidayCode);
					$this->session->set_flashdata('dtmHolidayDate',$dtmHolidayDate);
					// $this->session->set_flashdata('dtmMonth',$dtmMonth);
					// $this->session->set_flashdata('dtmDay',$dtmDay);
					redirect('libraries/holiday/manage_add');
				}
			}
		}
    	
    }
    public function edit_manage_holiday()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$strLocCode = urldecode($this->uri->segment(4));
			$this->arrData['arrHoliday'] = $this->holiday_model->getLocalHoliday($strCode);
			$this->template->load('template/template_view','libraries/holiday/manage_local_view', $this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			$strHolidayCode = $arrPost['strHolidayCode'];
			$dtmHolidayDate = $arrPost['dtmHolidayDate'];
			// $dtmYear = $arrPost['dtmYear'];
			// $dtmMonth = $arrPost['dtmMonth'];
			// $dtmDay = $arrPost['dtmDay'];
			if(!empty($strHolidayCode) && !empty($dtmHolidayDate))
			{	
				$arrData = array(
						'holidayCode'=>$strHolidayCode,
						'holidayDate'=>$dtmHolidayDate
						// 'holidayYear'=>$dtmYear,
						// 'holidayMonth'=>$dtmMonth,
						// 'holidayDay'=>$dtmDay
					
				);
				$blnReturn = $this->holiday_model->save_manage_holiday($arrData, $strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHolidayYear','Edited '.$strHolidayCode.' Holiday',implode(';',$arrData),'');
					$this->session->set_flashdata('strMsg','Holiday saved successfully.');
				}
				redirect('libraries/holiday/manage_holiday');
			}
		}
	}

	 //ADD WORK SUSPENSION
    public function add_worksuspension()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrHoliday'] = $this->holiday_model->getData();
			$this->template->load('template/template_view','libraries/holiday/add_worksuspension_view',$this->arrData);	
		}
		else
		{	
			$dtmSuspensionDate = $arrPost['dtmSuspensionDate'];
			$dtmSuspensionTime = $arrPost['dtmSuspensionTime'];
			if(!empty($dtmSuspensionDate) && !empty($dtmSuspensionTime))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->holiday_model->checkWorkSuspensionExist($dtmSuspensionDate))==0)
				{
					$arrData = array(
						'holidayDate'=>$dtmSuspensionDate,
						'holidayTime'=>$dtmSuspensionTime,

					);
					$blnReturn  = $this->holiday_model->add_worksuspension($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHolidayYear','Added '.$dtmSuspensionDate.' Holiday',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Work Suspension added successfully.');
					}
					redirect('libraries/holiday/');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Work Suspension already exists.');
					$this->session->set_flashdata('dtmSuspensionDate',$dtmSuspensionDate);
					$this->session->set_flashdata('dtmSuspensionTime',$dtmSuspensionTime);
					redirect('libraries/holiday/add_worksuspension');
				}
			}
		}
    }

    public function edit_worksuspension()
	{
		$arrPost = $this->input->post();
		//print_r($arrPost);
		if(empty($arrPost))
		{
			$intHolidayId = urldecode($this->uri->segment(4));
			$this->arrData['arrLocHoliday'] = $this->holiday_model->getLocalHoliday();
			$this->arrData['arrHoliday'] = $this->holiday_model->getData();
			$this->arrData['arrWorkSus'] = $this->holiday_model->getWorkSuspension($intHolidayId);
			$this->template->load('template/template_view','libraries/holiday/edit_worksuspension_view', $this->arrData);
		}
		else
		{
			$intHolidayId = $arrPost['intHolidayId'];
			$dtmSuspensionDate = $arrPost['dtmSuspensionDate'];
			$dtmSuspensionTime = $arrPost['dtmSuspensionTime'];
			if(!empty($dtmSuspensionDate) && !empty($dtmSuspensionTime))
			{	
				$arrData = array(
						'holidayDate'=>$dtmSuspensionDate,
						'holidayTime'=>$dtmSuspensionTime
					
				);
				$blnReturn = $this->holiday_model->save_worksuspension($arrData, $intHolidayId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHolidayYear','Edited '.$dtmSuspensionDate.' Holiday',implode(';',$arrData),'');
					$this->session->set_flashdata('strMsg','Work Suspension saved successfully.');
				}
				redirect('libraries/holiday');
			}
		}
	}

	public function delete_worksuspension()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intHolidayId = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrLocHoliday'] = $this->holiday_model->getLocalHoliday();
			$this->arrData['arrHoliday'] = $this->holiday_model->getData();
			$this->arrData['arrWorkSus'] = $this->holiday_model->getWorkSuspension();
			$this->template->load('template/template_view','libraries/holiday/delete_worksuspension_view',$this->arrData);
		}
		else
		{
			$intHolidayId = $arrPost['intHolidayId'];
			//add condition for checking dependencies from other tables
			if(!empty($intHolidayId))
			{
				$arrWorkSus = $this->holiday_model->getData($intHolidayId);
				$holidayDate = $arrLocHoliday[0]['holidayDate'];	
				$blnReturn = $this->holiday_model->delete_worksuspension($intHolidayId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblHolidayYear','Deleted '.$dtmSuspensionDate.' Holiday',implode(';',$arrSignatory[0]),'');
					$this->session->set_flashdata('strMsg','Work Suspension deleted successfully.');
				}
				redirect('libraries/holiday');
			}
		}
		
	}

}
