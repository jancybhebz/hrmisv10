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
	
	public function submitProfile()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			// $strProfileType=$arrPost['strProfileType'];
			$strSname=$arrPost['strSname'];
			$strFname=$arrPost['strFname'];
			$strMname=$arrPost['strMname'];
			$strExtension=$arrPost['strExtension'];
			$dtmBirthdate=$arrPost['dtmBirthdate'];
			$strBirthplace=$arrPost['strBirthplace'];
			$strCS=$arrPost['strCS'];
			$intWeight=$arrPost['intWeight'];
			$intHeight=$arrPost['intHeight'];
			$strBlood=$arrPost['strBlood'];
			$intGSIS=$arrPost['intGSIS'];
			$intPagibig=$arrPost['intPagibig'];
			$intPhilhealth=$arrPost['intPhilhealth'];
			$intTin=$arrPost['intTin'];
			$strBlk1=$arrPost['strBlk1'];
			$strStreet1=$arrPost['strStreet1'];
			$strSubd1=$arrPost['strSubd1'];
			$strBrgy1=$arrPost['strBrgy1'];
			$strCity1=$arrPost['strCity1'];
			$strProv1=$arrPost['strProv1'];
			$strZipCode1=$arrPost['strZipCode1'];
			$strTel1=$arrPost['strTel1'];
			$strStreet2=$arrPost['strStreet2'];
			$strSubd2=$arrPost['strSubd2'];
			$strBrgy2=$arrPost['strBrgy2'];
			$strCity2=$arrPost['strCity2'];
			$strProv2=$arrPost['strProv2'];
			$strZipCode2=$arrPost['strZipCode2'];
			$intTel2=$arrPost['intTel2'];
			$strEmail=$arrPost['strEmail'];
			$strCP=$arrPost['strCP'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($strSname))
			{	
				if( count($this->pds_update_model->checkExist($strSname, $strFname))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strSname.';'.$strFname.';'.$strMname.';'.$strExtension.';'.$dtmBirthdate.';'.$strBirthplace.';'.$strCS.';'.$intWeight.';'.$intHeight.';'.$strBlood.';'.$intGSIS.';'.$intPagibig.';'.$intPhilhealth.';'.$intTin.';'.$strBlk1.';'.$strStreet1.';'.$strSubd1.';'.$strBrgy1.';'.$strCity1.';'.$strProv1.';'.$strZipCode1.';'.$strTel1.';'.$strStreet2.';'.$strSubd2.';'.$strBrgy2.';'.$strCity2.';'.$strProv2.';'.$strZipCode2.';'.$intTel2.';'.$strEmail.';'.$strCP.';'.$strStatus.';'.$strCode,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitProfile($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strSname.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitFam()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			// $strProfileType=$arrPost['strProfileType'];
			$strSSurname=$arrPost['strSSurname'];
			$strSFirstname=$arrPost['strSFirstname'];
			$strSMidname=$arrPost['strSMidname'];
			$strSNameExt=$arrPost['strSNameExt'];
			$strSOccupation=$arrPost['strSOccupation'];
			$strSBusname=$arrPost['strSBusname'];
			$strSBusadd=$arrPost['strSBusadd'];
			$strSTel=$arrPost['strSTel'];
			$strFSurname=$arrPost['strFSurname'];
			$strFFirstname=$arrPost['strFFirstname'];
			$strFMidname=$arrPost['strFMidname'];
			$strFExtension=$arrPost['strFExtension'];
			$strMSurname=$arrPost['strMSurname'];
			$strMFirstname=$arrPost['strMFirstname'];
			$strMMidname=$arrPost['strMMidname'];
			$strPaddress=$arrPost['strPaddress'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($strSSurname))
			{	
				if( count($this->pds_update_model->checkExist($strSSurname))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strSSurname.';'.$strSFirstname.';'.$strSMidname.';'.$strSNameExt.';'.$strSOccupation.';'.$strSBusname.';'.$strSBusadd.';'.$strSTel.';'.$strFSurname.';'.$strFFirstname.';'.$strFMidname.';'.$strFExtension.';'.$strMSurname.';'.$strMFirstname.';'.$strMMidname.';'.$strPaddress,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitFam($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strSSurname.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitEduc()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strLevelDesc=$arrPost['strLevelDesc'];
			$strSchName=$arrPost['strSchName'];
			$strDegree=$arrPost['strDegree'];
			$dtmFrmYr=$arrPost['dtmFrmYr'];
			$dtmTo=$arrPost['dtmTo'];
			$intUnits=$arrPost['intUnits'];
			$strScholarship=$arrPost['strScholarship'];
			$strHonors=$arrPost['strHonors'];
			$strLicensed=$arrPost['strLicensed'];
			$strGraduated=$arrPost['strGraduated'];
			$strYrGraduated=$arrPost['strYrGraduatedstrYrGraduated'];
			
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($strLevelDesc))
			{	
				if( count($this->pds_update_model->checkExist($strLevelDesc))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strLevelDesc.';'.$strSchName.';'.$strDegree.';'.$dtmFrmYr.';'.$dtmTo.';'.$intUnits.';'.$strScholarship.';'.$strHonors.';'.$strLicensed.';'.$strGraduated.';'.$strYrGraduated,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitEduc($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strLevelDesc.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitTraining()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strTrainTitle=$arrPost['strTrainTitle'];
			$dtmStartDate=$arrPost['dtmStartDate'];
			$dtmEndDate=$arrPost['dtmEndDate'];
			$dtmHours=$arrPost['dtmHours'];
			$strTypeLD=$arrPost['strTypeLD'];
			$strConduct=$arrPost['strConduct'];
			$intCost=$arrPost['intCost'];
			$dtmContract=$arrPost['dtmContract'];
			
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($strTrainTitle))
			{	
				if( count($this->pds_update_model->checkExist($strTrainTitle))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strTrainTitle.';'.$dtmStartDate.';'.$dtmEndDate.';'.$dtmHours.';'.$strTypeLD.';'.$strConduct.';'.$intCost.';'.$dtmContract,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitTraining($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strTrainTitle.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitExam()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strExamDesc=$arrPost['strExamDesc'];
			$strChildName=$arrPost['strChildName'];
			$dtmExamDate=$arrPost['dtmExamDate'];
			$strPlaceExam=$arrPost['strPlaceExam'];
			$intLicenseNo=$arrPost['intLicenseNo'];
			$dtmRelease=$arrPost['dtmRelease'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($strExamDesc))
			{	
				if( count($this->pds_update_model->checkExist($strExamDesc))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strExamDesc.';'.$strChildName.';'.$dtmExamDate.';'.$strPlaceExam.';'.$intLicenseNo.';'.$dtmRelease,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitExam($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strExamDesc.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitChild()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strChildName=$arrPost['strChildName'];
			$dtmChildBdate=$arrPost['dtmChildBdate'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($strChildName))
			{	
				if( count($this->pds_update_model->checkExist($strChildName))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strChildName.';'.$dtmChildBdate,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitChild($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strChildName.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitTax()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$intTaxCert=$arrPost['intTaxCert'];
			$strIssuedAt=$arrPost['strIssuedAt'];
			$dtmIssuedOn=$arrPost['dtmIssuedOn'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			if(!empty($intTaxCert))
			{	
				if( count($this->pds_update_model->checkExist($intTaxCert))==0 )
				{
					$arrData = array(
						'requestDetails'=>$intTaxCert.';'.$strIssuedAt.';'.$dtmIssuedOn,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						
					);
					$blnReturn  = $this->pds_update_model->submitTax($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$intTaxCert.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/pds_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/pds_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }



}