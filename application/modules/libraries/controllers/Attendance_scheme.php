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
			$strSchemeType = $arrPost['strSchemeType'];
			$strSchemeCode = $arrPost['strSchemeCode'];
			$strSchemeName = $arrPost['strSchemeName'];
			// fixed
			$dtmFtimeIn = $arrPost['dtmFtimeIn'];
			$dtmFtimeOutFrom = $arrPost['dtmFtimeOutFrom'];
			$dtmFtimeOutTo = $arrPost['dtmFtimeOutTo'];
			$dtmFtimeInFrom = $arrPost['dtmFtimeInFrom'];
			$dtmFtimeInTo = $arrPost['dtmFtimeInTo'];
			$dtmFtimeOut = $arrPost['dtmFtimeOut'];
			// sliding
			$dtmStimeInFrom = $arrPost['dtmStimeInFrom'];
			$dtmStimeInTo = $arrPost['dtmStimeInTo'];
			$dtmStimeOutFromNN = $arrPost['dtmStimeOutFromNN'];
			$dtmStimeOutToNN = $arrPost['dtmStimeOutToNN'];
			$dtmStimeInFromNN = $arrPost['dtmStimeInFromNN'];
			$dtmStimeInToNN = $arrPost['dtmStimeInToNN'];
			$dtmStimeOutFrom = $arrPost['dtmStimeOutFrom'];
			$dtmStimeOutTo = $arrPost['dtmStimeOutTo'];

			if(!empty($strSchemeCode) && !empty($strSchemeName))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->attendance_scheme_model->checkExist($strSchemeCode, $strSchemeName))==0)
				{
					$arrData = array(
						'schemeType'=>$strSchemeType,
						'schemeCode'=>$strSchemeCode,
						'schemeName'=>$strSchemeName,
						// fixed
					  'amTimeinFrom'=>$dtmFtimeIn,
					 'nnTimeoutFrom'=>$dtmFtimeOutFrom, 
					   'nnTimeoutTo'=>$dtmFtimeOutTo, 
					  'nnTimeinFrom'=>$dtmFtimeInFrom,
						'nnTimeinTo'=>$dtmFtimeInTo, 
					   'pmTimeoutTo'=>$dtmFtimeOut, 
					   // sliding
					  'amTimeinFrom'=>$dtmStimeInFrom,
						'amTimeinTo'=>$dtmStimeInTo,
					 'nnTimeoutFrom'=>$dtmStimeOutFromNN,
					   'nnTimeoutTo'=>$dtmStimeOutToNN, 
					  'nnTimeinFrom'=>$dtmStimeInFromNN,
						'nnTimeinTo'=>$dtmStimeInToNN, 
					 'pmTimeoutFrom'=>$dtmStimeOutFrom,
					   'pmTimeoutTo'=>$dtmStimeOutTo 
						
					);
					$blnReturn  = $this->attendance_scheme_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblAttendanceScheme','Added '.$strSchemeCode.' Attendance_scheme',implode(';',$arrData),'');
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
			$strCode = urldecode($this->uri->segment(4));
			$this->arrData['arrAttendance']=$this->attendance_scheme_model->getData();
			$this->arrData['arrType'] = $this->attendance_scheme_model->getType();
			$this->arrData['arrName'] = $this->attendance_scheme_model->getName();
			$this->template->load('template/template_view','libraries/attendance_scheme/edit_view', $this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			$strSchemeType = $arrPost['strSchemeType'];
			$strSchemeCode = $arrPost['strSchemeCode'];
			$strSchemeName = $arrPost['strSchemeName'];
			// fixed
			$dtmFtimeIn = $arrPost['dtmFtimeIn'];
			$dtmFtimeOutFrom = $arrPost['dtmFtimeOutFrom'];
			$dtmFtimeOutTo = $arrPost['dtmFtimeOutTo'];
			$dtmFtimeInFrom = $arrPost['dtmFtimeInFrom'];
			$dtmFtimeInTo = $arrPost['dtmFtimeInTo'];
			$dtmFtimeOut = $arrPost['dtmFtimeOut'];
			// sliding
			$dtmStimeInFrom = $arrPost['dtmStimeInFrom'];
			$dtmStimeInTo = $arrPost['dtmStimeInTo'];
			$dtmStimeOutFromNN = $arrPost['dtmStimeOutFromNN'];
			$dtmStimeOutToNN = $arrPost['dtmStimeOutToNN'];
			$dtmStimeInFromNN = $arrPost['dtmStimeInFromNN'];
			$dtmStimeInToNN = $arrPost['dtmStimeInToNN'];
			$dtmStimeOutFrom = $arrPost['dtmStimeOutFrom'];
			$dtmStimeOutTo = $arrPost['dtmStimeOutTo'];
			if(!empty($strSchemeCode) AND !empty($strSchemeName)) 
			{
				$arrData = array(
					'schemeType'=>$strSchemeType,
					'schemeCode'=>$strSchemeCode,
					'schemeName'=>$strSchemeName,
					// fixed
				  'amTimeinFrom'=>$dtmFtimeIn,
				 'nnTimeoutFrom'=>$dtmFtimeOutFrom, 
				   'nnTimeoutTo'=>$dtmFtimeOutTo, 
				  'nnTimeinFrom'=>$dtmFtimeInFrom,
					'nnTimeinTo'=>$dtmFtimeInTo, 
				   'pmTimeoutTo'=>$dtmFtimeOut, 
				   // sliding
				  'amTimeinFrom'=>$dtmStimeInFrom,
					'amTimeinTo'=>$dtmStimeInTo,
				 'nnTimeoutFrom'=>$dtmStimeOutFromNN,
				   'nnTimeoutTo'=>$dtmStimeOutToNN, 
				  'nnTimeinFrom'=>$dtmStimeInFromNN,
					'nnTimeinTo'=>$dtmStimeInToNN, 
				 'pmTimeoutFrom'=>$dtmStimeOutFrom,
				   'pmTimeoutTo'=>$dtmStimeOutTo 
				);
				$blnReturn = $this->attendance_scheme_model->save($arrData, $strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblAttendanceScheme','Edited '.$strSchemeName.' Attendance_scheme',implode(';',$arrData),'');
					
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
		$strCode = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->attendance_scheme_model->getData($strCode);
			$this->template->load('template/template_view','libraries/attendance_scheme/delete_view',$this->arrData);
		}
		else
		{
			$strCode = $arrPost['strCode'];
			//add condition for checking dependencies from other tables
			if(!empty($strCode))
			{
				$arrScheme = $this->attendance_scheme_model->getData($strCode);
				$strSchemeName = $arrScheme[0]['schemeName'];	
				$blnReturn = $this->attendance_scheme_model->delete($strCode);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblAttendanceScheme','Deleted '.$strSchemeName.' Attendance_scheme',implode(';',$arrScheme[0]),'');
	
					$this->session->set_flashdata('strMsg','Attendance Scheme deleted successfully.');
				}
				redirect('libraries/attendance_scheme');
			}
		}
		
	}
}
