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

class Pds_update extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/pds_update_model','hr/Hr_model'));
    }

	public function index()
	{

		$strEmpNo = $_SESSION['sessEmpNo'];
		$this->arrData['arrData'] = $this->Hr_model->getData($strEmpNo);
		if(count($this->arrData['arrData'])==0) redirect('pds');

		$this->arrData['arrData'] = $this->pds_update_model->getData($strEmpNo);
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
			$strSname	  = $arrPost['strSname'];
			$strFname	  = $arrPost['strFname'];
			$strMname	  = $arrPost['strMname'];
			$strExtension = $arrPost['strExtension'];
			$dtmBirthdate = $arrPost['dtmBirthdate'];
			$strBirthplace= $arrPost['strBirthplace'];
			$strCS	  	  = $arrPost['strCS'];
			$intWeight	  = $arrPost['intWeight'];
			$intHeight	  = $arrPost['intHeight'];
			$strBlood	  = $arrPost['strBlood'];
			$intGSIS	  = $arrPost['intGSIS'];
			$intPagibig	  = $arrPost['intPagibig'];
			$intPhilhealth= $arrPost['intPhilhealth'];
			$intTin	  	  = $arrPost['intTin'];
			$strBlk1	  = $arrPost['strBlk1'];
			$strStreet1	  = $arrPost['strStreet1'];
			$strSubd1	  = $arrPost['strSubd1'];
			$strBrgy1	  = $arrPost['strBrgy1'];
			$strCity1	  = $arrPost['strCity1'];
			$strProv1	  = $arrPost['strProv1'];
			$strZipCode1  = $arrPost['strZipCode1'];
			$strTel1	  = $arrPost['strTel1'];
			$strStreet2	  = $arrPost['strStreet2'];
			$strSubd2	  = $arrPost['strSubd2'];
			$strBrgy2	  = $arrPost['strBrgy2'];
			$strCity2	  = $arrPost['strCity2'];
			$strProv2	  = $arrPost['strProv2'];
			$strZipCode2  = $arrPost['strZipCode2'];
			$intTel2	  = $arrPost['intTel2'];
			$strEmail	  = $arrPost['strEmail'];
			$strCP	  	  = $arrPost['strCP'];
			$strStatus	  = $arrPost['strStatus'];
			$strCode	  = $arrPost['strCode'];

			$arrData = array(
				'requestDetails'  => $strSname.';'.$strFname.';'.$strMname.';'.$strExtension.';'.$dtmBirthdate.';'.$strBirthplace.';'.$strCS.';'.$intWeight.';'.$intHeight.';'.$strBlood.';'.$intGSIS.';'.$intPagibig.';'.$intPhilhealth.';'.$intTin.';'.$strBlk1.';'.$strStreet1.';'.$strSubd1.';'.$strBrgy1.';'.$strCity1.';'.$strProv1.';'.$strZipCode1.';'.$strTel1.';'.$strStreet2.';'.$strSubd2.';'.$strBrgy2.';'.$strCity2.';'.$strProv2.';'.$strZipCode2.';'.$intTel2.';'.$strEmail.';'.$strCP.';'.$strStatus.';'.$strCode,
				'requestDate'	  => date('Y-m-d'),
				'requestStatus'   => $strStatus,
				'requestCode' 	  => $strCode,
				'empNumber' 	  => $_SESSION['sessEmpNo']);

			$blnReturn  = $this->pds_update_model->submit_request($arrData);
			if(count($blnReturn)>0)
			{	
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strSname.' PDS Update',implode(';',$arrData),'');
				$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
			}
			redirect('employee/update_pds');
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitFam()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strSSurname	= $arrPost['strSSurname'];
			$strSFirstname	= $arrPost['strSFirstname'];
			$strSMidname	= $arrPost['strSMidname'];
			$strSNameExt	= $arrPost['strSNameExt'];
			$strSOccupation	= $arrPost['strSOccupation'];
			$strSBusname	= $arrPost['strSBusname'];
			$strSBusadd		= $arrPost['strSBusadd'];
			$strSTel		= $arrPost['strSTel'];
			$strFSurname	= $arrPost['strFSurname'];
			$strFFirstname	= $arrPost['strFFirstname'];
			$strFMidname	= $arrPost['strFMidname'];
			$strFExtension	= $arrPost['strFExtension'];
			$strMSurname	= $arrPost['strMSurname'];
			$strMFirstname	= $arrPost['strMFirstname'];
			$strMMidname	= $arrPost['strMMidname'];
			$strPaddress	= $arrPost['strPaddress'];
			$strStatus		= $arrPost['strStatus'];
			$strCode		= $arrPost['strCode'];

			$arrData = array(
				'requestDetails' => $strSSurname.';'.$strSFirstname.';'.$strSMidname.';'.$strSNameExt.';'.$strSOccupation.';'.$strSBusname.';'.$strSBusadd.';'.$strSTel.';'.$strFSurname.';'.$strFFirstname.';'.$strFMidname.';'.$strFExtension.';'.$strMSurname.';'.$strMFirstname.';'.$strMMidname.';'.$strPaddress,
				'requestDate' 	 => date('Y-m-d'),
				'requestStatus'  => $strStatus,
				'requestCode' 	 => $strCode,
				'empNumber' 	 => $_SESSION['sessEmpNo']);

			$blnReturn  = $this->pds_update_model->submit_request($arrData);
			if(count($blnReturn)>0)
			{	
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strSSurname.' PDS Update',implode(';',$arrData),'');
				$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
			}
			redirect('employee/update_pds');
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitEduc()
    {
    	$arrPost = $this->input->post();
    	if(!empty($arrPost)):
    		$arrData = array(
    			'requestDetails' => implode(',',array($arrPost['strLevelDesc'],$arrPost['strSchName'],$arrPost['strDegree'],$arrPost['dtmFrmYr'],$arrPost['dtmTo'],$arrPost['intUnits'],$arrPost['strScholarship'],$arrPost['strHonors'],$arrPost['strLicensed'],$arrPost['strGraduated'],$arrPost['strYrGraduated'],$arrPost['txteducid'])),
    			'requestDate'	 => date('Y-m-d'),
    			'requestStatus'	 => $arrPost['strStatus'],
    			'requestCode'	 => $arrPost['strCode'],
    			'empNumber'		 => $_SESSION['sessEmpNo']);

    		$blnReturn = $this->pds_update_model->submit_request($arrData);
    		if(count($blnReturn)>0):
    			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strLevelDesc.' PDS Update',implode(';',$arrData),'');
    			$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
    		endif;

    		redirect('employee/update_pds');
    	endif;
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

			$allPost = array($arrPost['strTrainTitle'],$arrPost['dtmStartDate'],$arrPost['dtmEndDate'],$arrPost['dtmHours'],$arrPost['strTypeLD'],$arrPost['strConduct'],$arrPost['intCost'],$arrPost['dtmContract'],$arrPost['txttraid']);

			if(count(array_unique($allPost)) === 1 && end($allPost) === ''):
				$this->session->set_flashdata('strErrorMsg','Request is empty.');
				redirect('employee/update_pds');
			else:
				$arrData = array(
					'requestDetails' => $strTrainTitle.';'.$dtmStartDate.';'.$dtmEndDate.';'.$dtmHours.';'.$strTypeLD.';'.$strConduct.';'.$intCost.';'.$dtmContract.';'.$arrPost['txttraid'],
					'requestDate'    => date('Y-m-d'),
					'requestStatus'  => $strStatus,
					'requestCode'    => $strCode,
					'empNumber' 	 => $_SESSION['sessEmpNo']);

				$blnReturn  = $this->pds_update_model->submit_request($arrData);
				if(count($blnReturn)>0)
				{	
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strTrainTitle.' PDS Update',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
				}
				redirect('employee/update_pds');
			endif;
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitExam()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$arrPost['strExamDesc'] = $arrPost['strExamDesc']=='0'?'':$arrPost['strExamDesc'];
			$strExamDesc  = $arrPost['strExamDesc'];
			$strrating    = $arrPost['strrating'];
			$dtmExamDate  = $arrPost['dtmExamDate'];
			$strPlaceExam = $arrPost['strPlaceExam'];
			$intLicenseNo = $arrPost['intLicenseNo'];
			$dtmRelease   = $arrPost['dtmRelease'];
			$strStatus    = $arrPost['strStatus'];
			$strCode      = $arrPost['strCode'];

			$allPost = array($arrPost['txtexamid'],$arrPost['strExamDesc'],$arrPost['strrating'],$arrPost['dtmExamDate'],$arrPost['strPlaceExam'],$arrPost['intLicenseNo'],$arrPost['dtmRelease']);

			if(count(array_unique($allPost)) === 1 && end($allPost) === ''):
				$this->session->set_flashdata('strErrorMsg','Request is empty.');
				redirect('employee/update_pds');
			else:
				$arrData = array(
					'requestDetails'=>$strExamDesc.';'.$strrating.';'.$dtmExamDate.';'.$strPlaceExam.';'.$intLicenseNo.';'.$dtmRelease.';'.$arrPost['txtexamid'],
					'requestDate'=>date('Y-m-d'),
					'requestStatus'=>$strStatus,
					'requestCode'=>$strCode,
					'empNumber'=>$_SESSION['sessEmpNo']);

				$blnReturn  = $this->pds_update_model->submit_request($arrData);
				if(count($blnReturn)>0)
				{	
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strExamDesc.' PDS Update',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
				}
				redirect('employee/update_pds');
			endif;
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitChild()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strChildName  = $arrPost['strChildName'];
			$dtmChildBdate = $arrPost['dtmChildBdate'];

			$strStatus 	   = $arrPost['strStatus'];
			$strCode 	   = $arrPost['strCode'];

			$allPost = array($arrPost['txtchildid'],$arrPost['strChildName'],$arrPost['dtmChildBdate']);

			if(count(array_unique($allPost)) === 1 && end($allPost) === ''):
				$this->session->set_flashdata('strErrorMsg','Request is empty.');
				redirect('employee/update_pds');
			else:
				$arrData = array(
							'requestDetails'=>$strChildName.';'.$dtmChildBdate.';'.$arrPost['txtchildid'],
							'requestDate'=>date('Y-m-d'),
							'requestStatus'=>$strStatus,
							'requestCode'=>$strCode,
							'empNumber'=>$_SESSION['sessEmpNo']);
				$blnReturn  = $this->pds_update_model->submitChild($arrData);
				if(count($blnReturn)>0)
				{	
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strChildName.' PDS Update',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
				}
				redirect('employee/update_pds');
			endif;
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

			$arrData = array(
						'requestDetails'=>$intTaxCert.';'.$strIssuedAt.';'.$dtmIssuedOn,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']);

			$blnReturn  = $this->pds_update_model->submit_request($arrData);
			if(count($blnReturn)>0)
			{	
				log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$intTaxCert.' PDS Update',implode(';',$arrData),'');
				$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
			}
			redirect('employee/update_pds');
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitRef()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strRefName=$arrPost['strRefName'];
			$strRefAdd=$arrPost['strRefAdd'];
			$intRefContact=$arrPost['intRefContact'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			$allPost = array($arrPost['txtrefid'],$arrPost['strRefName'],$arrPost['strRefAdd'],$arrPost['intRefContact']);
			if(count(array_unique($allPost)) === 1 && end($allPost) === ''):
				$this->session->set_flashdata('strErrorMsg','Request is empty.');
				redirect('employee/update_pds');
			else:
				$arrData = array(
					'requestDetails'=>$strRefName.';'.$strRefAdd.';'.$intRefContact.';'.$arrPost['txtrefid'],
					'requestDate'=>date('Y-m-d'),
					'requestStatus'=>$strStatus,
					'requestCode'=>$strCode,
					'empNumber'=>$_SESSION['sessEmpNo']);

					$blnReturn  = $this->pds_update_model->submit_request($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strRefName.' PDS Update',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
					}
					redirect('employee/update_pds');
			endif;
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitVol()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strVolName=$arrPost['strVolName'];
			$strVolAdd=$arrPost['strVolAdd'];
			$dtmVolDateFrom=$arrPost['dtmVolDateFrom'];
			$dtmVolDateTo=$arrPost['dtmVolDateTo'];
			$intVolHours=$arrPost['intVolHours'];
			$strNature=$arrPost['strNature'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			$allPost = array($arrPost['txtvolid'],$arrPost['strVolName'],$arrPost['strVolAdd'],$arrPost['dtmVolDateFrom'],$arrPost['dtmVolDateTo'],$arrPost['intVolHours'],$arrPost['strNature']);
			if(count(array_unique($allPost)) === 1 && end($allPost) === ''):
				$this->session->set_flashdata('strErrorMsg','Request is empty.');
				redirect('employee/update_pds');
			else:
				$arrData = array(
					'requestDetails'=>$strVolName.';'.$strVolAdd.';'.$dtmVolDateFrom.';'.$dtmVolDateTo.';'.$intVolHours.';'.$strNature.';'.$arrPost['txtvolid'],
					'requestDate'=>date('Y-m-d'),
					'requestStatus'=>$strStatus,
					'requestCode'=>$strCode,
					'empNumber'=>$_SESSION['sessEmpNo']);

				$blnReturn  = $this->pds_update_model->submit_request($arrData);
				if(count($blnReturn)>0)
				{	
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strVolName.' PDS Update',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
				}
				redirect('employee/update_pds');
			endif;
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

    public function submitWorkExp()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$arrPost['strExpPer'] = $arrPost['strExpPer'] == 0 ? '' : $arrPost['strExpPer'];
			$arrPost['strAStatus'] = $arrPost['strAStatus'] == 0 ? '' : $arrPost['strAStatus'];
			$arrPost['strBranch'] = $arrPost['strBranch'] == 0 ? '' : $arrPost['strBranch'];
			$arrPost['strSepCause'] = $arrPost['strSepCause'] == 0 ? '' : $arrPost['strSepCause'];

			$dtmExpDateFrom=$arrPost['dtmExpDateFrom'];
			$dtmExpDateTo=$arrPost['dtmExpDateTo'];
			$strPosTitle=$arrPost['strPosTitle'];
			$strExpDept=$arrPost['strExpDept'];
			$strSalary=$arrPost['strSalary'];
			$strExpPer=$arrPost['strExpPer'];
			$strCurrency=$arrPost['strCurrency'];
			$strExpSG=$arrPost['strExpSG'];
			$strAStatus=$arrPost['strAStatus'];
			$strGovn=$arrPost['strGovn'];
			$strBranch=$arrPost['strBranch'];
			$strSepCause=$arrPost['strSepCause'];
			$strSepDate=$arrPost['strSepDate'];
			$strLV=$arrPost['strLV'];

			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];

			$allPost = array($arrPost['dtmExpDateFrom'],$arrPost['dtmExpDateTo'],$arrPost['strPosTitle'],$arrPost['strExpDept'],$arrPost['strSalary'],$arrPost['strExpPer'],$arrPost['strCurrency'],$arrPost['strExpSG'],$arrPost['strAStatus'],$arrPost['strBranch'],$arrPost['strSepCause'],$arrPost['strSepDate'],$arrPost['strLV']);
			if(count(array_unique($allPost)) === 1 && end($allPost) === ''):
				$this->session->set_flashdata('strErrorMsg','Request is empty.');
				redirect('employee/update_pds');
			else:
				$arrData = array(
					'requestDetails'=>$dtmExpDateFrom.';'.$dtmExpDateTo.';'.$strPosTitle.';'.$strExpDept.';'.$strSalary.';'.$strExpPer.';'.$strCurrency.';'.$strExpSG.';'.$strAStatus.';'.$strGovn.';'.$strBranch.';'.$strSepCause.';'.$strSepDate.';'.$strLV.';'.$arrPost['txtwxpid'],
					'requestDate'=>date('Y-m-d'),
					'requestStatus'=>$strStatus,
					'requestCode'=>$strCode,
					'empNumber'=>$_SESSION['sessEmpNo']
				);
				$blnReturn  = $this->pds_update_model->submit_request($arrData);
				if(count($blnReturn)>0)
				{	
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$dtmExpDateFrom.' PDS Update',implode(';',$arrData),'');
					$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
				}
				redirect('employee/update_pds');
			endif;
		}
    	$this->template->load('template/template_view','employee/pds_update/pds_update_view',$this->arrData);
    }

}