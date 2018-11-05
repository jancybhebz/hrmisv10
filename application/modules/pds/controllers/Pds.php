<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pds extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		$this->load->model(array('hr/Hr_model','hr/chart_model','pds/pds_model'));
    }

	public function index()
	{
		$arrData['arrEmployees'] = $this->Hr_model->getData();
		//plantilla chart
		$arrPlantillaChart = $this->chart_model->plantilla_positions();
		$intFilled=0;$intVacant=0;
		foreach($arrPlantillaChart->result_array() as $row):
			if($row['empNumber']!='')
				$intFilled+=1;
			else
				$intVacant+=1;
		endforeach;
		$arrData['intFilled']=$intFilled;
		$arrData['intVacant']=$intVacant;
		//gender chart
		$arrAS = $this->Hr_model->appointment_status();
		$arrASFull = $this->Hr_model->appointment_status(TRUE);
		//print_r($arrASFull);
		foreach($arrASFull as $row):
			//echo $row."<br>";
			$arrGenderChart[$row]['M'] = $this->chart_model->gender_appointment($row,'M');
			$arrGenderChart[$row]['M']['appCode'] = appstatus_code($row);
			$arrGenderChart[$row]['F'] = $this->chart_model->gender_appointment($row,'F');
			$arrGenderChart[$row]['F']['appCode'] = appstatus_code($row);
			//echo "<br>";
			//$arrGenderChart[$row] = $this->chart_model->gender_appointment($row);
		endforeach;
		//total male
		$i=0;$arrGender=array('intTotalMale'=>0,'intTotalFemale'=>0);
        foreach($arrASFull as $row):
        	//echo $row.'=>M=>'.$arrGenderChart[$row]['M'][0]['total']."<br>";
        	//echo $row.'=>F=>'.$arrGenderChart[$row]['F'][0]['total'];
        	//echo '<br><br>';
            $arrGender['intTotalMale'] += $arrGenderChart[$row]['M'][0]['total'];
            $arrGender['intTotalFemale'] += $arrGenderChart[$row]['F'][0]['total'];
        endforeach;

		$arrData['arrAS'] = $arrAS;
		$arrData['arrASFull'] = $arrASFull;
		$arrData['arrGender'] = $arrGender;
		$arrData['arrGenderChart'] = $arrGenderChart;
		$this->template->load('template/template_view','pds/default_view',$arrData);
	}

    public function edit_personal()
	{
		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$strEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrData']=$this->pds_model->getData($strEmpNumber);
			$this->template->load('template/template_view','pds/personal_view', $this->arrData);
		}
		else
		{
			$strEmpNumber = $arrPost['strEmpNumber'];
			$strSalutation =$arrPost['strSalutation'];
			$strSurname=$arrPost['strSurname'];
			$strFirstname=$arrPost['strFirstname'];
			$strMiddlename=$arrPost['strMiddlename'];
			$strMidInitial=$arrPost['strMidInitial'];
			$strNameExt=$arrPost['strNameExt'];
			$dtmBday=$arrPost['dtmBday'];
			$strBirthPlace=$arrPost['strBirthPlace'];
			$strSex=$arrPost['strSex'];
			$strCvlStatus=$arrPost['strCvlStatus'];
			$strCitizenship=$arrPost['strCitizenship'];
			$strHeight=$arrPost['strHeight'];
			$strWeight=$arrPost['strWeight'];
			$strBloodType=$arrPost['strBloodType'];
			$intGSIS=$arrPost['intGSIS'];
			$intPagibig=$arrPost['intPagibig'];
			$intPhilhealth=$arrPost['intPhilhealth'];
			$intTin=$arrPost['intTin'];
			$strEmail=$arrPost['strEmail'];
			$intSSS=$arrPost['intSSS'];

			$strLot1=$arrPost['strLot1'];
			$strLot2=$arrPost['strLot2'];
			$strStreet1=$arrPost['strStreet1'];
			$strStreet2=$arrPost['strStreet2'];
			$strSubd1=$arrPost['strSubd1'];
			$strSubd2=$arrPost['strSubd2'];
			$strBrgy1=$arrPost['strBrgy1'];
			$strBrgy2=$arrPost['strBrgy2'];
			$strProv1=$arrPost['strProv1'];
			$strProv2=$arrPost['strProv2'];
			$strCity1=$arrPost['strCity1'];
			$strCity2=$arrPost['strCity2'];
			$intZipCode1=$arrPost['intZipCode1'];
			$intZipCode2=$arrPost['intZipCode2'];
			$intTel1=$arrPost['intTel1'];
			$intTel2=$arrPost['intTel2'];
			$intMobile=$arrPost['intMobile'];
			$intAccount=$arrPost['intAccount'];
		
			if(!empty($strSurname))
			{
				$arrData = array(
					'salutation'=>$strSalutation,
					'surname'=>$strSurname,
					'firstname'=>$strFirstname,
					'middlename'=>$strMiddlename,
					'middleInitial'=>$strMidInitial,
					'nameExtension'=>$strNameExt,
					'citizenship'=>$strCitizenship,
					'birthday'=>$dtmBday,
					'birthPlace'=>$strBirthPlace,
					'sex'=>$strSex,
					'civilStatus'=>$strCvlStatus,
					'gsisNumber'=>$intGSIS,
					'weight'=>$strWeight,
					'height'=>$strHeight,
					'tin'=>$intTin,
					'sssNumber'=>$intSSS,
					'bloodType'=>$strBloodType,
					'email'=>$strEmail,
					'pagibigNumber'=>$intPagibig,
					'philHealthNumber'=>$intPhilhealth,

					'lot1'=>$strLot1,
					'lot2'=>$strLot2,
					'street1'=>$strStreet1,
					'street2'=>$strStreet2,
					'subdivision1'=>$strSubd1,
					'subdivision2'=>$strSubd2,
					'barangay1'=>$strBrgy1,
					'barangay2'=>$strBrgy2,
					'city1'=>$strCity1,
					'city2'=>$strCity2,
					'province1'=>$strProv1,
					'province2'=>$strProv2,
					'zipCode1'=>$intZipCode1,
					'zipCode2'=>$intZipCode2,
					'telephone1'=>$intTel1,
					'telephone2'=>$intTel2,
					'Mobile'=>$intMobile,
					'AccountNum'=>$intAccount	
				);
				 // echo '='.$strEmpNumber;
				 // exit(1);
				$blnReturn = $this->pds_model->save_personal($arrData, $strEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPersonal','Edited '.$strSurname.' Personal',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Personal information updated successfully.');
				}
				redirect('hr/profile/'.$strEmpNumber);
			}
		}
		
	}

    public function edit_spouse()
	{
		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$strEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrSpouse']=$this->pds_model->getData($strEmpNumber);
			$this->template->load('template/template_view','pds/family_background_view', $this->arrData);
		}
		else
		{
			$strEmpNumber = $arrPost['strEmpNumber'];
			$strSSurname=$arrPost['strSSurname'];
			$strSFirstname=$arrPost['strSFirstname'];
			$strSMidllename=$arrPost['strSMidllename'];
			$strSExt=$arrPost['strSExt'];
			$strSOccupation=$arrPost['strSOccupation'];
			$strSEmployer=$arrPost['strSEmployer'];
			$strSBusAdd=$arrPost['strSBusAdd'];
			$strSTelephone=$arrPost['strSTelephone'];
		
			if(!empty($strEmpNumber))
			{
				$arrData = array(
					'spouseSurname'=>$strSSurname,
					'spouseFirstname'=>$strSFirstname,
					'spouseMiddlename'=>$strSMidllename,
					'spousenameExtension'=>$strSExt,
					'spouseWork'=>$strSOccupation,
					'spouseBusName'=>$strSEmployer,
					'spouseBusAddress'=>$strSBusAdd,
					'spouseTelephone'=>$strSTelephone		
				);
				$blnReturn = $this->pds_model->save_personal($arrData, $strEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPersonal','Edited '.$strSSurname.' Personal',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Spouse information updated successfully.');
				}
				redirect('hr/profile/'.$strEmpNumber);
			}
		}	
	}

    public function edit_parents()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$strEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrParents']=$this->pds_model->getData($strEmpNumber);
			$this->template->load('template/template_view','pds/family_background_view', $this->arrData);
		}
		else
		{
			$strEmpNumber = $arrPost['strEmpNumber'];
			$strFSurname =$arrPost['strFSurname'];
			$strFFirstname=$arrPost['strFFirstname'];
			$strFMidname=$arrPost['strFMidname'];
			$strFExtension=$arrPost['strFExtension'];
			$strMFirstname=$arrPost['strMFirstname'];
			$strMMiddlename=$arrPost['strMMiddlename'];
			$strMSurname=$arrPost['strMSurname'];
			$strPAddress=$arrPost['strPAddress'];
			if(!empty($strEmpNumber))
			{	
				$arrData = array(
					'fatherSurname'=>$strFSurname,
					'fatherFirstname'=>$strFFirstname,
					'fatherMiddlename' =>$strFMidname,
					'fathernameExtension'=>$strFExtension,
					'motherFirstname'=>$strMFirstname,
					'motherMiddlename'=>$strMMiddlename,
					'motherSurname'=>$strMSurname,
					'parentAddress'=>$strPAddress
				);
				$blnReturn = $this->pds_model->save_personal($arrData, $strEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPersonal','Edited '.$strFSurname.' Personal',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Parents information updated successfully.');
				}
				redirect('hr/profile/'.$strEmpNumber);
			}
		}	
	}

    public function edit_child()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$strEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrChild']=$this->pds_model->getChildData($strEmpNumber);
			$this->template->load('template/template_view','pds/family_background_view', $this->arrData);
		}
		else
		{
			$strEmpNumber = $arrPost['strEmpNumber'];
			$strCNname  =$arrPost['strCNname'];
			$dtmCBirthdate=$arrPost['dtmCBirthdate'];
		
			if(!empty($strEmpNumber))
			{	
				$arrData = array(
					'childName'=>$strCNname,
					'childBirthDate'=>$dtmCBirthdate			
				);
				// echo '='.$strEmpNumber;
				//  exit(1);
				$blnReturn = $this->pds_model->save_child($arrData, $strEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblempchild','Edited '.$strCName.' Personal',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Childs information updated successfully.');
				}
				redirect('hr/profile/'.$strEmpNumber);
			}
		}	
	}

    public function edit_Education()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strLvlDesc=$arrPost['strLvlDesc'];
			$strSchoolname=$arrPost['strSchoolname'];
			$strDegree=$arrPost['strDegree'];
			$dtmPeriod=$arrPost['dtmPeriod'];
			$intUnits=$arrPost['intUnits'];
			$dtmYearGrad=$arrPost['dtmYearGrad'];
			$strScholarsip=$arrPost['strScholarsip'];
			$strHonors=$arrPost['strHonors'];
			$strLicense=$arrPost['strLicense'];
			$levelCode = $this->uri->segment(4);
			if(!empty($strLvlDesc) && !empty($strSchoolname) && !empty($strDegree) && !empty($dtmPeriod) && !empty($intUnits))
			{	
				$arrData = array(
					'levelCode'=>$strLvlDesc,
					'schoolName'=>$strSchoolname,
					'course'=>$strDegree,
					'schoolFromDate'=>$dtmPeriod,
					'units'=>$intUnits,
					'yearGraduated'=>$dtmYearGrad,
					'ScholarshipCode'=>$strScholarsip,
					'honors'=>$strHonors,
					'licensed'=>$strLicense
				);
				$blnReturn=$this->Pds_model->save_Educ($arrData, $levelCode);
				logaction('Updated Educational Information',1);
				$this->session->set_flashdata('saving_status','Educational Information updated successfully.');
				redirect('pds/education_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->Pds_model->getData($strid);
			$this->template->load('template/main_layout', 'pds/education_view', $this->arrTemplateData);
		}
    }

    public function edit_Exam()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strExamDesc=$arrPost['strExamDesc'];
			$strRating=$arrPost['strRating'];
			$strExamPlace=$arrPost['strExamPlace'];
			$strLicense=$arrPost['strLicense'];
			$strValidity=$arrPost['strValidity'];
			$examCode = $this->uri->segment(4);
			if(!empty($strExamDesc) && !empty($strRating) && !empty($strExamPlace) && !empty($strLicense) && !empty($strValidity))
			{	
				$arrData = array(
					'examCode'=>$strExamDesc,
					'examRating'=>$strRating,
					'examPlace'=>$strExamPlace,
					'licenseNumber'=>$strLicense,
					'dateRelease'=>$strValidity
				);
				$blnReturn=$this->Pds_model->save_Exam($arrData, $examCode);
				logaction('Updated information',1);
				$this->session->set_flashdata('saving_status','Information updated successfully.');
				redirect('pds/examination_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->Pds_model->getData($strid);
			$this->template->load('template/main_layout', 'pds/examination_view', $this->arrTemplateData);
		}	
    }

    public function edit_Training()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strTitle=$arrPost['strTitle'];
			$strHours=$arrPost['strHours'];
			$strVenue=$arrPost['strVenue'];
			$strTypeofLD=$arrPost['strTypeofLD'];
			$strConducted=$arrPost['strConducted'];
			$strCost=$arrPost['strCost'];
			$dtmStartDate=$arrPost['dtmStartDate'];
			$dtmEndDate=$arrPost['dtmEndDate'];
			$XtrainingCode = $this->uri->segment(4);
			if(!empty($strTitle) && !empty($strHours) && !empty($strVenue) && !empty($strTypeofLD) && !empty($strConducted))
			{	
				$arrData = array(
					'trainingTitle'=>$strTitle,
					'trainingHours'=>$strHours,
					'trainingVenue'=>$strVenue,
					'trainingTypeofLD'=>$strTypeofLD,
					'trainingConductedBy'=>$strConducted,
					'trainingCost'=>$strCost,
					'trainingStartDate'=>$dtmStartDate,
					'trainingEndDate'=>$dtmEndDate
				);
				$blnReturn=$this->Pds_model->save_Training($arrData, $XtrainingCode);
				logaction('Training information',1);
				$this->session->set_flashdata('saving_status','Training Information updated successfully.');
				redirect('pds/training_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->Pds_model->getData($strid);
			$this->template->load('template/main_layout', 'pds/training_view', $this->arrTemplateData);
		}	
    }

    public function edit_VolWorks()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strOrgName=$arrPost['strOrgName'];
			$strAddress=$arrPost['strAddress'];
			$dtmDateFrom=$arrPost['dtmDateFrom'];
			$dtmDateTo=$arrPost['dtmDateTo'];
			$dtmHours=$arrPost['dtmHours'];
			$strNature=$arrPost['strNature'];
			$XtrainingCode = $this->uri->segment(4);
			if(!empty($strOrgName) && !empty($strAddress) && !empty($dtmDateFrom) && !empty($dtmDateTo) && !empty($strNature))
			{	
				$arrData = array(
					'vwName'=>$strOrgName,
					'vwAddress'=>$strAddress,
					'vwDateFrom'=>$dtmDateFrom,
					'vwDateTo'=>$dtmDateTo,
					'vwHours'=>$dtmHours,
					'vwPosition'=>$strNature
				);
				$blnReturn=$this->Pds_model->save_VolWorks($arrData, $XtrainingCode);
				logaction('Voluntary Work information',1);
				$this->session->set_flashdata('saving_status','Voluntary Work Information updated successfully.');
				redirect('pds/voluntary_works_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->Pds_model->getData($strid);
			$this->template->load('template/main_layout', 'pds/voluntary_works_view', $this->arrTemplateData);
		}	
    }

    public function edit_Position()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strServiceCode  =$arrPost['strServiceCode'];
			$strPayroll-=$arrPost['strPayroll'];
			$strItemNum-=$arrPost['strItemNum'];
			$dtmGovnDay-=$arrPost['dtmGovnDay'];
			$strIncludeDTR-=$arrPost['strIncludeDTR'];
			$strHead-=$arrPost['strHead'];
			$dtmAgencyDay-=$arrPost['dtmAgencyDay'];
			$strIncludePayroll-=$arrPost['strIncludePayroll'];
			$strActual-=$arrPost['strActual'];
			$intSalaryDate-=$arrPost['intSalaryDate'];
			$strAttendance-=$arrPost['strAttendance'];
			$strEmpBasis-=$arrPost['strEmpBasis'];
			$strHP-=$arrPost['strHP'];
			$strAuthorize-=$arrPost['strAuthorize'];
			$strModeofSep-=$arrPost['strModeofSep'];
			$strIncPHealth-=$arrPost['strIncPHealth'];
			$strStepNum-=$arrPost['strStepNum'];
			$dtmSepDate-=$arrPost['dtmSepDate'];
			$strIncPagibig-=$arrPost['strIncPagibig'];
			$strPosition-=$arrPost['strPosition'];
			$strCatService-=$arrPost['strCatService'];
			$strIncLife-=$arrPost['strIncLife'];
			$dtmDateInc-=$arrPost['dtmDateInc'];
			$strTaxStatus-=$arrPost['strTaxStatus'];
			$dtmPosDate-=$arrPost['dtmPosDate'];
			$strAppointmentDesc-=$arrPost['strAppointmentDesc'];
			$intDependents-=$arrPost['intDependents'];
			$strExecOffice-=$arrPost['strExecOffice'];
			$strPersonnel-=$arrPost['strPersonnel'];
			$strService-=$arrPost['strService'];
			$strDivision-=$arrPost['strDivision'];

			$empID = $this->uri->segment(4);
			if(!empty($strServiceCode ) && !empty($strPayroll)  && !empty($strItemNum) && !empty($dtmGovnDay))
			{	
				$arrData = array(
					'serviceCode'=>$strServiceCode,
					'payrollGroupCode'=>$strPayroll,
					'uniqueItemNumber'=>$strItemNum,
					'firstDayGov'=>$dtmGovnDay,
					'dtrSwitch'=>$strIncludeDTR,
					'head'=>$strHead,
					'firstDayAgency'=>$dtmAgencyDay,
					'payrollSwitch'=>$strIncludePayroll,
					'actualSalary'=>$strActual,
					'effectiveDate'=>$intSalaryDate,
					'schemeCode'=>$strAttendance,
					'salaryGradeNumber'=>$strSG,
					'employmentBasis'=>$strEmpBasis,			
					'hpFactor'=>$strHP,
					'authorizeSalary'=>$strAuthorize,
					'statusOfAppointment'=>$strModeofSep,
					'philhealthSwitch'=>$strIncPHealth,
					'stepNumber'=>$strStepNum,
					'contractEndDate'=>$dtmSepDate,
					'pagibigSwitch'=>$strIncPagibig,
					'positionCode'=>$strPosition,
					'categoryService'=>$strCatService,
					'lifeRetSwitch'=>$strIncLife,
					'dateIncremented'=>$dtmDateInc,
					'taxStatCode'=>$strTaxStatus,
					'positionDate'=>$dtmPosDate,
					'appointmentCode'=>$strAppointmentDesc,
					'dependents'=>$intDependents,
					'officeCode'=>$strExecOffice,
					'personnelAction'=>$strPersonnel,
					'service'=>$strService,
					'divisionCode'=>$strDivision
				);
				$blnReturn=$this->Pds_model->save_Position($arrData, $empID);
				logaction('Updated Position Information',1);
				$this->session->set_flashdata('saving_status','Position Information updated successfully.');
				redirect('pds/family_background_view');
				
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->Pds_model->getData($strid);
			$this->template->load('template/main_layout', 'pds/family_background_view', $this->arrTemplateData);
		}   	
    }

    public function edit_Duties()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strPosDuties=$arrPost['strPosDuties'];
			$intPosPercent=$arrPost['intPosPercent'];
			$strPlantillaDuties=$arrPost['strPlantillaDuties'];
			$intPlantillaPercent=$arrPost['intPlantillaPercent'];
			$strActualDuties=$arrPost['strActualDuties'];
			$intActualPercent=$arrPost['intActualPercent'];
			$positionCode = $this->uri->segment(4);
			if(!empty($strPosDuties) && !empty($intPosPercent) && !empty($strPlantillaDuties) && !empty($intPlantillaPercent) && !empty($strActualDuties) && !empty($intActualPercent))
			{	
				$arrData = array(
					'duties'=>$strPosDuties,
					'percentWork'=>$intPosPercent,
					'itemDuties'=>$strPlantillaDuties,
					'percentWork'=>$intPlantillaPercent,
					'duties'=>$strActualDuties,
					'percentWork'=>$intActualPercent
				);
				$blnReturn=$this->Pds_model->save_Duties($arrData, $positionCode);
				logaction('Duties information',1);
				$this->session->set_flashdata('saving_status','Duties Information updated successfully.');
				redirect('pds/voluntary_works_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->Pds_model->getData($strid);
			$this->template->load('template/main_layout', 'pds/duties_and_responsibilities_view', $this->arrTemplateData);
		}	
    }



}
