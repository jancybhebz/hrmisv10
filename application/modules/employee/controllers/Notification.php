<?php 
/** 
Purpose of file:    Controller for Notification
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/notification_model'));
    }

	public function index()
	{
		// $this->arrData['arrOB'] = $this->official_business_model->getData();
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
		
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			// $this->arrData['arrEmployees'] = $this->hr_model->getData();
			// $this->arrData['arrUser'] = $this->user_account_model->getData();
			$this->template->load('template/template_view','employee/notification/add_view',$this->arrData);	
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

	
		
	
}
