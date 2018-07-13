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

	// public function edit()
	// {
		
	// 	$strEmpNo = $this->uri->segment(3);
	// 	$this->arrData['arrChild'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_CHILD);
	// 	$this->arrData['arrEduc'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_EDUC);
	// 	$this->arrData['arrExam'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_EXAM);
	// 	$this->arrData['arrVol'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_VOLWORK);
	// 	$this->arrData['arrService'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_SERVICE);
	// 	$this->arrData['arrTraining'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_TRAINING);
	// 	$this->arrData['arrPosition'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_POSITION);
	// 	$this->arrData['arrDuties'] = $this->employees_model->getEmployeeDetails($strEmpNo,'*',TABLE_DUTIES);
	// 	$this->template->load('template/template_view','pds/personal_info_view', $this->arrData);
		
	// }

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
				$arrPosition = array(
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

	
}
