<?php 
/** 
Purpose of file:    Controller for HR update
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hr extends MY_Controller {
	var $arrData;
	function __construct() {
        parent::__construct();
        $this->load->model(array('Hr_model'));
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
			$this->arrData['arrData'] = $this->Hr_model->getData('',$strSearch);
		endif;
		$this->template->load('template/template_view','hr/search_view', $this->arrData);
	}

	public function profile()
	{
		$strEmpNo = $this->uri->segment(3);
		if ($strEmpNo == '')
			redirect('pds');
		$this->arrData['arrData'] = $this->Hr_model->getData($strEmpNo);
		if(count($this->arrData['arrData'])==0) redirect('pds');

		$this->arrData['arrChild'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_CHILD);
		$this->arrData['arrEduc'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_EDUC);
		$this->arrData['arrExam'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_EXAM);
		$this->arrData['arrVol'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_VOLWORK);
		$this->arrData['arrService'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_SERVICE);
		$this->arrData['arrTraining'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_TRAINING);
		$this->arrData['arrPosition'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_POSITION);
		$this->arrData['arrDuties'] = $this->Hr_model->getEmployeeDetails($strEmpNo,'*',TABLE_DUTIES);
		$this->arrData['arrPlantillaDuties'] = $this->Hr_model->getPlantillaDuties($strEmpNo,'*',TABLE_PLANTILLADUTIES);
		// $this->arrData['arrPlantillaDuties'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_PLANTILLADUTIES);

		$this->template->load('template/template_view','pds/personal_info_view', $this->arrData);
	}

	public function add_employee()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','hr/add_employee_view',$this->arrData);	
		}
		else
		{	
			$strEmpID =$arrPost['strEmpID'];
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
		
		
				if(!empty($strEmpID) && !empty($strSurname) && !empty($strFirstname) && !empty($strMiddlename))
				{
					$arrData = array(
						'salutation'=>$strSalutation,
						'empNumber'=>$strEmpID,
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
					$blnReturn  = $this->Hr_model->add_employee($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPersonal','Added '.$strSurname.'',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Personal Information added successfully.');
					}
					redirect('hr/add_employee');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Personal Information already exists.');
					$this->session->set_flashdata('strSurname',$strSurname);
						//echo $this->session->flashdata('strErrorMsg');
					redirect('hr/add_employee');
				}
			}		
    }


   
	
}
