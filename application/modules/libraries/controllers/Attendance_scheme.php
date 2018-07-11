<?php 
/** 
Purpose of file:    Controller for Attendance Scheme Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance_scheme extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/attendance_scheme_model'));
    }

	public function index()
	{
		$this->arrData['arrAttendance'] = $this->attendance_scheme_model->getData();
		$this->template->load('template/template_view', 'libraries/attendance_scheme/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/attendance_scheme/add_view',$this->arrData);	
		}
		else
		{	
			$strSchemeCode = $arrPost['strSchemeCode'];
			$strSchemeName = $arrPost['strSchemeName'];
			$strSchemeType = $arrPost['strSchemeType'];
			$dtmTimeIn = $arrPost['dtmTimeIn'];
			$strSchemeType = $arrPost['strSchemeType'];
			$strSchemeType = $arrPost['strSchemeType'];
			if(!empty($strSchemeCode) && !empty($strSchemeName) && !empty($strSchemeType))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->attendance_scheme_model->checkExist($strSchemeCode, $strSchemeName))==0)
				{
					$arrData = array(
						'schemeCode'=>$strSchemeCode,
						'schemeName'=>$strSchemeName,
						'schemeType'=>$strSchemeType
					);
					$blnReturn  = $this->attendance_scheme_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblattendancescheme','Added '.$strSchemeCode.' Attendance_scheme',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Attendance scheme added successfully.');
					}
					redirect('libraries/attendance_scheme');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Attendance scheme already exists.');
					$this->session->set_flashdata('strSchemeCode',$strSchemeCode);
					$this->session->set_flashdata('strSchemeName',$strSchemeName);
					$this->session->set_flashdata('strSchemeType',$strSchemeType);					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/attendance_scheme/add');
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
			$intSchemeCode = urldecode($this->uri->segment(4));
			$this->arrData['arrAttendance']=$this->attendance_scheme_model->getData($intSchemeCode);
			$this->template->load('template/template_view','libraries/attendance_scheme/edit_view', $this->arrData);
		}
		else
		{
			$intSchemeCode = $arrPost['intSchemeCode'];
			$strSchemeCode = $arrPost['strSchemeCode'];
			$strSchemeName = $arrPost['strSchemeName'];
			$strSchemeType = $arrPost['strSchemeType'];
			if(!empty($strSchemeCode) AND !empty($strSchemeName) AND !empty($strSchemeType)) 
			{
				$arrData = array(
					'schemeCode'=>$strSchemeCode,
					'schemeName'=>$strSchemeName,
					'schemeType'=>$strSchemeType
				);
				$blnReturn = $this->attendance_scheme_model->save($arrData, $intSchemeCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblattendancescheme','Edited '.$strSchemeName.' Attendance_scheme',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Attendance Scheme saved successfully.');
				}
				redirect('libraries/attendance_scheme');
			}
		}
		
	}
	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intSchemeCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->attendance_scheme_model->getData($intSchemeCode);
			$this->template->load('template/template_view','libraries/project_code/delete_view',$this->arrData);
		}
		else
		{
			$intSchemeCode = $arrPost['intSchemeCode'];
			//add condition for checking dependencies from other tables
			if(!empty($intProjectId))
			{
				$arrProject = $this->attendance_scheme_model->getData($intSchemeCode);
				$strSchemeName = $arrAttendance[0]['schemeName'];	
				$blnReturn = $this->attendance_scheme_model->delete($intSchemeCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblattendancescheme','Deleted '.$strSchemeName.' Attendance_scheme',implode(';',$arrProject[0]),'');
	
					$this->session->set_flashdata('strMsg','Attendance Scheme deleted successfully.');
				}
				redirect('libraries/attendance_scheme');
			}
		}
		
	}
}
