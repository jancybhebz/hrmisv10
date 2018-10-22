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
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strOBtype=$arrPost['strOBtype'];
			$dtmOBrequestdate=$arrPost['dtmOBrequestdate'];
			$dtmOBdatefrom=$arrPost['dtmOBdatefrom'];
			$dtmOBdateto=$arrPost['dtmOBdateto'];
			$dtmTimeFrom=$arrPost['dtmTimeFrom'];
			$dtmTimeTo=$arrPost['dtmTimeTo'];
			$strDestination=$arrPost['strDestination'];
			$strMeal=$arrPost['strMeal'];
			$strPurpose=$arrPost['strPurpose'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			if(!empty($strOBtype))
			{	
				if( count($this->official_business_model->checkExist($strOBtype, $dtmOBrequestdate))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strOBtype.';'.$dtmOBdatefrom.';'.$dtmOBdateto.';'.$dtmTimeFrom.';'.$dtmTimeTo.';'.$strDestination.';'.$strMeal.';'.$strPurpose,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						// 'requestStatus'=>
					);
					$blnReturn  = $this->official_business_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strOBtype.' Official Business',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/official_business');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/official_business');
				}
			}
		}
    	$this->template->load('template/template_view','employee/official_business/official_business_view',$this->arrData);
    }
}