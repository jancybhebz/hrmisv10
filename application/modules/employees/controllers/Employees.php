<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller {
	var $arrData;
	function __construct() {
        parent::__construct();
        $this->load->model(array('employees/employees_model'));
    }

	public function index()
	{
		//$this->template->load('template/template_view','home/home_view');
	}

	public function search()
	{
		$arrPost = $this->input->post();
		if(isset($arrPost)):
			$strSearch = $arrPost['strSearch'];
			$this->arrData['arrData'] = $this->employees_model->getData('',$strSearch);
		endif;
		$this->template->load('template/template_view','employees/search_view', $this->arrData);
	}

	public function profile()
	{
		$strEmpNo = $this->uri->segment(3);
		$this->arrData['arrData'] = $this->employees_model->getData($strEmpNo);
		if(count($this->arrData['arrData'])==0) redirect('pds');

		$this->arrData['arrChild'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_CHILD);
		$this->arrData['arrEduc'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_EDUC);
		$this->arrData['arrExam'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_EXAM);
		$this->arrData['arrVol'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_VOLWORK);
		$this->arrData['arrService'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_SERVICE);
		$this->arrData['arrTraining'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_TRAINING);
		$this->arrData['arrPosition'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_POSITION);
		$this->arrData['arrDuties'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_DUTIES);
		$this->arrData['arrPlantillaDuties'] = $this->employees_model->getPlantillaDuties($strEmpNo,'*',TABLE_PLANTILLADUTIES);
		// $this->arrData['arrPlantillaDuties'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_PLANTILLADUTIES);

		$this->template->load('template/template_view','pds/personal_info_view', $this->arrData);
	}

	public function addPersonal()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','pds/personal_view',$this->arrData);	
		}
		else
		{	
			$strSalutation =$arrPost['strSalutation '];
			$strSurname=$arrPost['strSurname'];
			$strFirstname=$arrPost['strFirstname'];
			$strMidInitial=$arrPost['strMidInitial'];
			$strMidname=$arrPost['strMidname'];
			$strNameExt=$arrPost['strNameExt'];
			$strLot1=$arrPost['strLot1'];
			$strLot2=$arrPost['strLot2'];
			$strStreet1=$arrPost['strStreet1'];
			$strStreet2=$arrPost['strStreet2'];
			$strSubd1=$arrPost['strSubd1'];
			$strSubd2=$arrPost['strSubd2'];
			$strBrgy1=$arrPost['strBrgy1'];
			$strBrgy2=$arrPost['strBrgy2'];
			$strProvince1=$arrPost['strProvince1'];
			$strProvince2=$arrPost['strProvince2'];
			$strCity1=$arrPost['strCity1'];
			$strCity2=$arrPost['strCity2'];
			$strBday=$arrPost['strBday'];
			$strBPlace=$arrPost['strBPlace'];
			$strTel1=$arrPost['strTel1'];
			$strTel2=$arrPost['strTel2'];
			$strSex=$arrPost['strSex'];
			$strCvlStatus=$arrPost['strCvlStatus'];
			$strGSIS=$arrPost['strGSIS'];
			$strMobile=$arrPost['strMobile'];
			$strCitizenship=$arrPost['strCitizenship'];
			$strPagibig=$arrPost['strPagibig'];
			$strEmail=$arrPost['strEmail'];
			$strHeight=$arrPost['strHeight'];
			$strPHealth=$arrPost['strPHealth'];
			$strAccountNum=$arrPost['strAccountNum'];
			$strWeight=$arrPost['strWeight'];
			$strTin=$arrPost['strTin'];
			$strSSS=$arrPost['strSSS'];
			$strBloodType=$arrPost['strBloodType'];
			if(!empty($strExamCode) && !empty($strExamDesc))
			{	
				// check if exam code and/or exam desc already exist
				if(!empty($strSurname) && !empty($strFirstname) && !empty($strMidInitial) && !empty($strProvince1) && !empty($strProvince2) && !empty($strCity1) && !empty($strCity2))
				{
					$arrData = array(
						'salutation'=>$strSalutation,
						'surname'=>$strSurname,
						'firstname'=>$strFirstname,
						'middlename'=>$strMidname,
						'middleInitial'=>$strMidInitial,
						'nameExtension'=>$strNameExt,
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
						'province1'=>$strProvince1,
						'province2'=>$strProvince2,
						'birthday'=>$strBday,
						'zipCode1'=>$strZip1,
						'zipCode2'=>$strZip2,
						'birthPlace'=>$strBPlace,
						'telephone1'=>$strTel1,
						'telephone2'=>$strTel2,
						'sex'=>$strSex,
						'civilStatus'=>$strCvlStatus,
						'gsisNumber'=>$strGSIS,
						'Mobile'=>$strMobile,
						'citizenship'=>$strCitizenship,
						'pagibigNumber'=>$strPagibig,
						'email'=>$strEmail,
						'height'=>$strHeight,
						'philHealthNumber'=>$strPHealth,
						'AccountNum'=>$strAccountNum,
						'weight'=>$strWeight,
						'tin'=>$strTin,
						'sss'=>$strSSS,
						'bloodType'=>$strBloodType
					);
					$blnReturn  = $this->employees_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemppersonal','Added '.$strSurname.' Exam Type',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strMsg','Personal Information added successfully.');
					}
					redirect('libraries/exam_type');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Personal Information already exists.');
					$this->session->set_flashdata('strSurname',$strSurname);
						//echo $this->session->flashdata('strErrorMsg');
					redirect('pds/personal_view/add');
				}
			}
		}
    }

	public function editPersonal()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
		 print_r($arrPost);
		  die();
			$strSalutation =$arrPost['strSalutation '];
			$strSurname=$arrPost['strSurname'];
			$strFirstname=$arrPost['strFirstname'];
			$strMidInitial=$arrPost['strMidInitial'];
			$strMidname=$arrPost['strMidname'];
			$strNameExt=$arrPost['strNameExt'];
			$strLot1=$arrPost['strLot1'];
			$strLot2=$arrPost['strLot2'];
			$strStreet1=$arrPost['strStreet1'];
			$strStreet2=$arrPost['strStreet2'];
			$strSubd1=$arrPost['strSubd1'];
			$strSubd2=$arrPost['strSubd2'];
			$strBrgy1=$arrPost['strBrgy1'];
			$strBrgy2=$arrPost['strBrgy2'];
			$strProvince1=$arrPost['strProvince1'];
			$strProvince2=$arrPost['strProvince2'];
			$strCity1=$arrPost['strCity1'];
			$strCity2=$arrPost['strCity2'];
			$strBday=$arrPost['strBday'];
			$strBPlace=$arrPost['strBPlace'];
			$strTel1=$arrPost['strTel1'];
			$strTel2=$arrPost['strTel2'];
			$strSex=$arrPost['strSex'];
			$strCvlStatus=$arrPost['strCvlStatus'];
			$strGSIS=$arrPost['strGSIS'];
			$strMobile=$arrPost['strMobile'];
			$strCitizenship=$arrPost['strCitizenship'];
			$strPagibig=$arrPost['strPagibig'];
			$strEmail=$arrPost['strEmail'];
			$strHeight=$arrPost['strHeight'];
			$strPHealth=$arrPost['strPHealth'];
			$strAccountNum=$arrPost['strAccountNum'];
			$strWeight=$arrPost['strWeight'];
			$strTin=$arrPost['strTin'];
			$strSSS=$arrPost['strSSS'];
			$strBloodType=$arrPost['strBloodType'];
			$empID = $this->uri->segment(4);

			if(!empty($strSurname) && !empty($strFirstname) && !empty($strMidInitial) && !empty($strProvince1) && !empty($strProvince2) && !empty($strCity1) && !empty($strCity2))
			{	
				$arrPersonal = array(
					'salutation'=>$strSalutation,
					'surname'=>$strSurname,
					'firstname'=>$strFirstname,
					'middlename'=>$strMidname,
					'middleInitial'=>$strMidInitial,
					'nameExtension'=>$strNameExt,
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
					'province1'=>$strProvince1,
					'province2'=>$strProvince2,
					'birthday'=>$strBday,
					'zipCode1'=>$strZip1,
					'zipCode2'=>$strZip2,
					'birthPlace'=>$strBPlace,
					'telephone1'=>$strTel1,
					'telephone2'=>$strTel2,
					'sex'=>$strSex,
					'civilStatus'=>$strCvlStatus,
					'gsisNumber'=>$strGSIS,
					'Mobile'=>$strMobile,
					'citizenship'=>$strCitizenship,
					'pagibigNumber'=>$strPagibig,
					'email'=>$strEmail,
					'height'=>$strHeight,
					'philHealthNumber'=>$strPHealth,
					'AccountNum'=>$strAccountNum,
					'weight'=>$strWeight,
					'tin'=>$strTin,
					'sss'=>$strSSS,
					'bloodType'=>$strBloodType
					
				);
				$blnReturn=$this->employees_model->savePersonal($arrData, $empID);
				logaction('Updated Personal Information',1);
				$this->session->set_flashdata('saving_status','Personal Information updated successfully.');
				redirect('libraries/personal_info');
				
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/personal_info_view', $this->arrTemplateData);
		}
	    	
    }

    public function editSpouse()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
		 // print_r($arrPost);
		 //  die();
			$strSurname=$arrPost['strSurname'];
			$strFirstname=$arrPost['strFirstname'];
			$strMidllename=$arrPost['strMidllename'];
			$strExt=$arrPost['strExt'];
			$strOccupation =$arrPost['strOccupation'];
			$strEmployer=$arrPost['strEmployer'];
			$strBusAdd=$arrPost['strBusAdd'];
			$strTelephone=$arrPost['strTelephone'];
	
			$empID = $this->uri->segment(4);
			if(!empty($strSurname) && !empty($strFirstname) && !empty($strMidllename))
			{	
				$arrData = array(
					'fatherSurname'=>$strSurname,
					'fatherFirstname'=>$strFirstname,
					'fathernameExtension'=>$strMidllename,
					'motherFirstname'=>$strExt,
					'motherMiddlename'=>$strOccupation,
					'motherSurname'=>$strEmployer,
					'parentAddress'=>$strBusAdd,
					'parentAddress'=>$strTelephone			
				);
				$blnReturn=$this->employees_model->saveSpouse($arrData, $empID);
				logaction('Updated Spouses Information',1);
				$this->session->set_flashdata('saving_status','Spouses Information updated successfully.');
				redirect('libraries/family_background_view');
				
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/family_background_view', $this->arrTemplateData);
		}
	    	
    }

    public function editParents()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
		 // print_r($arrPost);
		 //  die();
			$strFSurname =$arrPost['strFSurname '];
			$strFFirstname=$arrPost['strFFirstname'];
			$strFNnameExtension=$arrPost['strFNnameExtension'];
			$strMFirstname=$arrPost['strMFirstname'];
			$strMMiddlename=$arrPost['strMMiddlename'];
			$strMSurname=$arrPost['strMSurname'];
			$strparentAddress=$arrPost['strparentAddress'];
			$empID = $this->uri->segment(4);
			if(!empty($strFSurname) && !empty($strFFirstname) && !empty($strMFirstname) && !empty($strMSurname) && !empty($strparentAddress))
			{	
				$arrData = array(
					'fatherSurname'=>$strFSurname,
					'fatherFirstname'=>$strFFirstname,
					'fathernameExtension'=>$strFNnameExtension,
					'motherFirstname'=>$strMFirstname,
					'motherMiddlename'=>$strMMiddlename,
					'motherSurname'=>$strMSurname,
					'parentAddress'=>$strparentAddress,
			
					
				);
				$blnReturn=$this->employees_model->saveParents($arrData, $empID);
				logaction('Updated Parents Information',1);
				$this->session->set_flashdata('saving_status','Parents Information updated successfully.');
				redirect('libraries/family_background_view');
				
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/family_background_view', $this->arrTemplateData);
		}
	    	
    }

    public function editChild()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strCName  =$arrPost['strCName'];
			$dtmCBirthdate-=$arrPost['dtmCBirthdate'];
			$empID = $this->uri->segment(4);
			if(!empty($strCName ) && !empty($dtmCBirthdate))
			{	
				$arrData = array(
					'childName'=>$strCName,
					'childBirthDate'=>$dtmCBirthdate,			
				);
				$blnReturn=$this->employees_model->saveChild($arrData, $empID);
				logaction('Updated Childrens Information',1);
				$this->session->set_flashdata('saving_status','Childrens Information updated successfully.');
				redirect('libraries/family_background_view');
				
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/family_background_view', $this->arrTemplateData);
		}   	
    }

    public function editEducation()
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
				$blnReturn=$this->employees_model->saveEduc($arrData, $levelCode);
				logaction('Updated Educational Information',1);
				$this->session->set_flashdata('saving_status','Educational Information updated successfully.');
				redirect('libraries/education_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/education_view', $this->arrTemplateData);
		}
    }

    public function editExam()
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
				$blnReturn=$this->employees_model->saveExam($arrData, $examCode);
				logaction('Updated information',1);
				$this->session->set_flashdata('saving_status','Information updated successfully.');
				redirect('libraries/examination_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/examination_view', $this->arrTemplateData);
		}	
    }

    public function editTraining()
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
				$blnReturn=$this->employees_model->saveEduc($arrData, $XtrainingCode);
				logaction('Training information',1);
				$this->session->set_flashdata('saving_status','Training Information updated successfully.');
				redirect('libraries/training_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/training_view', $this->arrTemplateData);
		}	
    }

    public function editVolWorks()
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
				$blnReturn=$this->employees_model->saveEduc($arrData, $XtrainingCode);
				logaction('Voluntary Work information',1);
				$this->session->set_flashdata('saving_status','Voluntary Work Information updated successfully.');
				redirect('libraries/voluntary_works_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/voluntary_works_view', $this->arrTemplateData);
		}	
    }

    public function editPosition()
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
				$blnReturn=$this->employees_model->savePosition($arrData, $empID);
				logaction('Updated Position Information',1);
				$this->session->set_flashdata('saving_status','Position Information updated successfully.');
				redirect('libraries/family_background_view');
				
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/family_background_view', $this->arrTemplateData);
		}   	
    }

    public function editDuties()
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
				$blnReturn=$this->employees_model->saveEduc($arrData, $positionCode);
				logaction('Duties information',1);
				$this->session->set_flashdata('saving_status','Duties Information updated successfully.');
				redirect('libraries/voluntary_works_view');
			}
		}else {
			$strid = urldecode($this->uri->segment(4));	
			$this->arrTemplateData['arrData']=$this->employees_model->getData($strid);
			$this->template->load('template/main_layout', 'libraries/duties_and_responsibilities_view', $this->arrTemplateData);
		}	
    }

   
	
}
