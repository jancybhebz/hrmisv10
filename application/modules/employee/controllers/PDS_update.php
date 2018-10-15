<?php 
/** 
Purpose of file:    Controller for PDS update
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PDS_update extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/pds_update_model','hr/Hr_model'));
    }

	public function index()
	{

		$strEmpNo =$_SESSION['sessEmpNo'];
		$this->arrData['arrData'] = $this->Hr_model->getData($strEmpNo);
		if(count($this->arrData['arrData'])==0) redirect('pds');

		$this->arrData['arrData'] = $this->pds_update_model->getData();
		$this->arrData['arrEduc_CMB'] = $this->pds_update_model->getEducData();	
		$this->arrData['arrEduc'] = $this->pds_update_model->getEduc($strEmpNo);		
		$this->arrData['arrCourse'] = $this->pds_update_model->getCourseData();
		$this->arrData['arrScholarship'] = $this->pds_update_model->getScholarshipData();
		$this->arrData['arrSchool'] = $this->pds_update_model->getSchoolData();
		$this->arrData['arrTraining_CMB'] = $this->pds_update_model->getTrainingData();
		$this->arrData['arrTraining'] = $this->pds_update_model->getTraining($strEmpNo);
		$this->arrData['arrExamination_CMB'] = $this->pds_update_model->getExamData();
		$this->arrData['arrExamination'] = $this->pds_update_model->getExamination($strEmpNo);
		$this->arrData['arrReference'] = $this->pds_update_model->getRefData($strEmpNo);
		$this->arrData['arrVoluntary'] = $this->pds_update_model->getVoluntary($strEmpNo);
		$this->arrData['arrExperience_CMB'] = $this->pds_update_model->getExpData();
		$this->arrData['arrExperience'] = $this->pds_update_model->getExperience($strEmpNo);
		$this->arrData['arrAppointment'] = $this->pds_update_model->getAppointData();
		$this->arrData['arrSeparation'] = $this->pds_update_model->getSepCauseData();
		$this->arrData['arrDetails'] = $this->pds_update_model->getDetails();
		
		$this->template->load('template/template_view', 'employee/pds_update/pds_update_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/appointment_status/add_view',$this->arrData);	
		}
		else
		{	
			$strAppointmentCode = $arrPost['strAppointmentCode'];
			$strAppointmentDesc = $arrPost['strAppointmentDesc'];
			$chrLeaveEntitled = $arrPost['chrLeaveEntitled'];
			$intIncludedPlantilla = $arrPost['intIncludedPlantilla'];
			if(!empty($strAppointmentCode) && !empty($strAppointmentDesc))
			{	
				// check if appointment code or appointment desc already exist
				if(count($this->appointment_status_model->checkExist($strAppointmentCode, $strAppointmentDesc))==0)
				{
					$arrData = array(
						'appointmentCode'=>$strAppointmentCode,
						'appointmentDesc'=>$strAppointmentDesc,
						'leaveEntitled'=>$chrLeaveEntitled,
						'incPlantilla'=>$intIncludedPlantilla,
						'system'=>0
					);
					$blnReturn  = $this->appointment_status_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblAppointment','Added '.$strAppointmentDesc.' Appointment Status',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strMsg','Appointment Status added successfully.');
					}
					redirect('libraries/appointment_status');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Appointment code and/or Appointment  Description already exists.');
					$this->session->set_flashdata('strAppointmentCode',$strAppointmentCode);
					$this->session->set_flashdata('strAppointmentDesc',$strAppointmentDesc);
					$this->session->set_flashdata('chrLeaveEntitled',$chrLeaveEntitled);
					$this->session->set_flashdata('intIncludedPlantilla',$intIncludedPlantilla);
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/appointment_status/add');
				}
			}
		}
    	
    	
    }

	public function edit()
	{
		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$intAppointmentId = urldecode($this->uri->segment(4));
			$this->arrData['arrAppointStatuses']=$this->appointment_status_model->getData($intAppointmentId);
			$this->template->load('template/template_view','libraries/appointment_status/edit_view', $this->arrData);
		}
		else
		{
			$intAppointmentId = $arrPost['intAppointmentId'];
			$strAppointmentCode = $arrPost['strAppointmentCode'];
			$strAppointmentDesc = $arrPost['strAppointmentDesc'];
			$chrLeaveEntitled = $arrPost['chrLeaveEntitled'];
			$intIncludedPlantilla = $arrPost['intIncludedPlantilla'];
			if(!empty($strAppointmentCode) AND !empty($strAppointmentDesc)) 
			{
				$arrData = array(
					'appointmentId'=>$intAppointmentId,
					'appointmentCode'=>$strAppointmentCode,
					'appointmentDesc'=>$strAppointmentDesc,
					'leaveEntitled'=>$chrLeaveEntitled,
					'incPlantilla'=>$intIncludedPlantilla
				);
				$blnReturn = $this->appointment_status_model->save($arrData, $intAppointmentId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblAppointment','Edited '.$strAppointmentDesc.' Appointment status',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Appointment status saved successfully.');
				}
				redirect('libraries/appointment_status');
			}
		}
		
	}
	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intAppointmentId = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->appointment_status_model->getData($intAppointmentId);
			$this->template->load('template/template_view','libraries/appointment_status/delete_view',$this->arrData);
		}
		else
		{
			$intAppointmentId = $arrPost['intAppointmentId'];
			//add condition for checking dependencies from other tables
			if(!empty($intAppointmentId))
			{
				$arrAppointStatuses = $this->appointment_status_model->getData($intAppointmentId);
				$strAppointmentDesc = $arrAppointStatuses[0]['appointmentDesc'];	
				$blnReturn = $this->appointment_status_model->delete($intAppointmentId);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblAppointment','Deleted '.$strAppointmentDesc.' Appointment Status',implode(';',$arrAppointStatuses[0]),'');
	
					$this->session->set_flashdata('strMsg','Appointment Status deleted successfully.');
				}
				redirect('libraries/appointment_status');
			}
		}
		
	}
}
