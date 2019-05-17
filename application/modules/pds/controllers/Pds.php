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
		$this->arrData['arrEmployees'] = $this->Hr_model->getData();
		$this->template->load('template/template_view','pds/default_view',$this->arrData);
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
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();

		if(!empty($arrPost))
		{
			$arrData = array(
							'spouseSurname'		=> $arrPost['txtspouseFname'],
							'spouseFirstname'	=> $arrPost['txtspouseLname'],
							'spouseMiddlename'	=> $arrPost['txtspouseMname'],
							'spousenameExtension'=>$arrPost['txtspouseExt'],
							'spouseWork'		=> $arrPost['txtspouseWork'],
							'spouseBusName'		=> $arrPost['txtspouseBusName'],
							'spouseBusAddress'	=> $arrPost['txtspouseBusAddress'],
							'spouseTelephone'	=> $arrPost['txtspouseTelephone']);

			$this->pds_model->save_personal($arrData, $empid);
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPersonal','Edited '.$arrPost['txtspouseLname'].' Personal',implode(';',$arrData),'');
			
			$this->session->set_flashdata('strSuccessMsg','Spouse information updated successfully.');
			redirect('hr/profile/'.$empid);
		}
	}

    public function edit_parents()
    {
    	$empid = $this->uri->segment(3);
    	$arrPost = $this->input->post();

		if(!empty($arrPost))
		{
			$arrData = array(
							'fatherSurname'		=> $arrPost['txtfatherLname'],
							'fatherFirstname'	=> $arrPost['txtfatherFname'],
							'fatherMiddlename' 	=> $arrPost['txtfatherMname'],
							'fathernameExtension'=>$arrPost['txtfatherExt'],
							'motherFirstname'	=> $arrPost['txtmotherFname'],
							'motherMiddlename'	=> $arrPost['txtmotherMname'],
							'motherSurname'		=> $arrPost['txtmotherLname'],
							'parentAddress'		=> $arrPost['txtparentsadd']);

			$this->pds_model->save_personal($arrData, $empid);
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPersonal','Edited '.$arrPost['txtfatherLname'].' Personal',implode(';',$arrData),'');
			
			$this->session->set_flashdata('strSuccessMsg','Parents information updated successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	
	# BEGIN CHILD
	public function add_child()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$arrData = array(
							'empNumber'		=> $empid,
							'childName'		=> $arrPost['txtchildname'],
							'childBirthDate'=> $arrPost['txtchildbday']);

			$this->pds_model->add_child($arrData);
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpChild','Add Child',implode(';',$arrData),'');
			$this->session->set_flashdata('strSuccessMsg','Child information added successfully.');
			redirect('hr/profile/'.$empid);
		}
	}

    public function edit_child()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$arrData = array(
							'childName'		=> $arrPost['txtchildname'],
							'childBirthDate'=> $arrPost['txtchildbday']);

			$this->pds_model->save_child($arrData, $arrPost['txtchildcode']);
			log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpChild','Add Child',implode(';',$arrData),'');
			$this->session->set_flashdata('strSuccessMsg','Child information updated successfully.');
			redirect('hr/profile/'.$empid);
		}
	}

	public function delete_child()
    {

    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$this->pds_model->delete_child($arrPost['txtdelcode']);

			$this->session->set_flashdata('strSuccessMsg','Child deleted successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	# END CHILD

	# BEGIN EDUCATION
	public function add_educ()
	{
		$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);
    	if(!empty($arrPost)):
    		$arrData = array(
    						'empNumber'		=> $empid,
    						'levelCode'		=> $arrPost['sellevel'],
    						'schoolName'	=> $arrPost['txtschool'],
    						'course'		=> $arrPost['seldegree'],
    						'yearGraduated'	=> $arrPost['txtyrgraduate'],
    						'units'			=> $arrPost['txtunits'],
    						'schoolFromDate'=> $arrPost['txtperiodatt_from'],
    						'schoolToDate'	=> $arrPost['txtperiodatt_to'],
    						'ScholarshipCode'=>$arrPost['selscholarship'],
    						'honors'		=> $arrPost['txthonors'],
    						'licensed'		=> isset($arrPost['optgraduate']) ? $arrPost['optgraduate'] : '',
    						'graduated'		=> isset($arrPost['optlicense']) ? $arrPost['optlicense'] : '');
    		$this->pds_model->add_educ($arrData);
    		$this->session->set_flashdata('strSuccessMsg','Education information added successfully.');
    		redirect('hr/profile/'.$empid);
    	endif;
	}

	public function edit_educ()
	{
		$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);
    	if(!empty($arrPost)):
    		$arrData = array(
    						'levelCode'		=> $arrPost['sellevel'],
    						'schoolName'	=> $arrPost['txtschool'],
    						'course'		=> $arrPost['seldegree'],
    						'yearGraduated'	=> $arrPost['txtyrgraduate'],
    						'units'			=> $arrPost['txtunits'],
    						'schoolFromDate'=> $arrPost['txtperiodatt_from'],
    						'schoolToDate'	=> $arrPost['txtperiodatt_to'],
    						'ScholarshipCode'=>$arrPost['selscholarship'],
    						'honors'		=> $arrPost['txthonors'],
    						'licensed'		=> isset($arrPost['optgraduate']) ? $arrPost['optgraduate'] : '',
    						'graduated'		=> isset($arrPost['optlicense']) ? $arrPost['optlicense'] : '');
    		$this->pds_model->save_educ($arrData,$arrPost['txteducid']);
    		$this->session->set_flashdata('strSuccessMsg','Education information updated successfully.');
    		redirect('hr/profile/'.$empid);
    	endif;
	}
	# END EDUCATION

	# BEGIN EXAMINATION
	public function add_exam()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'empNumber'		=> $empid,
				'examCode'		=> $arrPost['exam_desc'],
				'examDate'		=> $arrPost['txtdate_exam'],
				'examRating'	=> $arrPost['txtrating'],
				'examPlace'		=> $arrPost['txtplace_exam'],
				'licenseNumber' => $arrPost['txtlicense'],
				'dateRelease'	=> $arrPost['txtvalidity'],
				'verifier'		=> $arrPost['txtverifier'],
				'reviewer'		=> $arrPost['txtreviewer']);

			$this->pds_model->add_exam($arrData);
			$this->session->set_flashdata('strSuccessMsg','Examination information added successfully.');

			redirect('hr/profile/'.$empid);
		endif;
	}

	public function edit_exam()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'examCode'		=> $arrPost['exam_desc'],
				'examDate'		=> $arrPost['txtdate_exam'],
				'examRating'	=> $arrPost['txtrating'],
				'examPlace'		=> $arrPost['txtplace_exam'],
				'licenseNumber' => $arrPost['txtlicense'],
				'dateRelease'	=> $arrPost['txtvalidity'],
				'verifier'		=> $arrPost['txtverifier'],
				'reviewer'		=> $arrPost['txtreviewer']);

			$this->pds_model->save_exam($arrData, $arrPost['txtexamid']);
			$this->session->set_flashdata('strSuccessMsg','Examination information updated successfully.');

			redirect('hr/profile/'.$empid);
		endif;
	}

	public function delete_exam()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$this->pds_model->delete_exam($arrPost['txtdel_exam']);

			$this->session->set_flashdata('strSuccessMsg','Exam deleted successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	# END EXAMINATION

	# BEGIN WORK EXPERIENCE
	public function add_work_xp()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'empNumber' 	  => $empid,
							'serviceFromDate' => $arrPost['txtdfrom'],
							'serviceToDate'   => $arrPost['txtdto'],
							'tmpServiceToDate'=> isset($arrPost['chkpresent']) ? 'Present' : '',
							// 'positionCode' 	  => $arrPost['txtposition_code'],
							'positionDesc' 	  => $arrPost['txtposition'],
							'salary' 		  => $arrPost['txtsalary'],
							'salaryPer' 	  => $arrPost['selperiod'],
							'stationAgency'   => $arrPost['txtoffice'],
							'salaryGrade' 	  => $arrPost['txtgrade'],
							'appointmentCode' => $arrPost['selappointment'],
							'governService'   => isset($arrPost['optgov_srvc']) ? $arrPost['optgov_srvc'] : 'N',
							// 'NCCRA' 		  => $arrPost[''],
							'separationCause' => $arrPost['selmode_separation'],
							'separationDate'  => $arrPost['txtseparation_date'],
							'branch' 		  => $arrPost['selbranch'],
							'currency' 		  => $arrPost['txtcurrency'],
							'remarks' 		  => $arrPost['txtremarks'],
							'lwop' 			  => $arrPost['txtabs'],
							'processor' 	  => $arrPost['txtprocessor'],
							'signee' 		  => $arrPost['txtofficial']);

			$this->pds_model->add_workExp($arrData);
			$this->session->set_flashdata('strSuccessMsg','Work Experience added successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}

	public function edit_work_xp()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'serviceFromDate' => $arrPost['txtdfrom'],
							'serviceToDate'   => $arrPost['txtdto'],
							'tmpServiceToDate'=> isset($arrPost['chkpresent']) ? 'Present' : '',
							// 'positionCode' 	  => $arrPost['txtposition_code'],
							'positionDesc' 	  => $arrPost['txtposition'],
							'salary' 		  => $arrPost['txtsalary'],
							'salaryPer' 	  => $arrPost['selperiod'],
							'stationAgency'   => $arrPost['txtoffice'],
							'salaryGrade' 	  => $arrPost['txtgrade'],
							'appointmentCode' => $arrPost['selappointment'],
							'governService'   => isset($arrPost['optgov_srvc']) ? $arrPost['optgov_srvc'] : 'N',
							// 'NCCRA' 		  => $arrPost[''],
							'separationCause' => $arrPost['selmode_separation'],
							'separationDate'  => $arrPost['txtseparation_date'],
							'branch' 		  => $arrPost['selbranch'],
							'currency' 		  => $arrPost['txtcurrency'],
							'remarks' 		  => $arrPost['txtremarks'],
							'lwop' 			  => $arrPost['txtabs'],
							'processor' 	  => $arrPost['txtprocessor'],
							'signee' 		  => $arrPost['txtofficial']);

			$this->pds_model->save_workExp($arrData, $arrPost['txtxpid']);
			$this->session->set_flashdata('strSuccessMsg','Work Experience added successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}

	public function delete_work_xp()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$this->pds_model->delete_workExp($arrPost['txtdel_srv']);

			$this->session->set_flashdata('strSuccessMsg','Work Experience deleted successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	# END WORK EXPERIENCE

	# BEGIN VOLUNTARY WORK
	public function add_vol_work()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'empNumber' 	  => $empid,
							'vwName' 		  => $arrPost['txtorganization'],
							'vwAddress'   	  => $arrPost['txtaddress'],
							'vwDateFrom' 	  => $arrPost['txtdfrom_vl'],
							'vwDateTo' 		  => $arrPost['txtdto_vl'],
							'vwHours'	 	  => $arrPost['txthrs'],
							'vwPosition'	  => $arrPost['txtwork']);
			$this->pds_model->add_volWorks($arrData);
			$this->session->set_flashdata('strSuccessMsg','Voluntary work added successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}

	public function edit_vol_work()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'empNumber' 	  => $empid,
							'vwName' 		  => $arrPost['txtorganization'],
							'vwAddress'   	  => $arrPost['txtaddress'],
							'vwDateFrom' 	  => $arrPost['txtdfrom_vl'],
							'vwDateTo' 		  => $arrPost['txtdto_vl'],
							'vwHours'	 	  => $arrPost['txthrs'],
							'vwPosition'	  => $arrPost['txtwork']);
			$this->pds_model->save_volWorks($arrData,$arrPost['txtvolid']);
			$this->session->set_flashdata('strSuccessMsg','Voluntary work updated successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}
	
	public function del_vol_work()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$this->pds_model->delete_volWorks($arrPost['txtdelvolid']);

			$this->session->set_flashdata('strSuccessMsg','Voluntary work deleted successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	# END VOLUNTARY WORK

	# BEGIN TRAINING
	public function add_training()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'empNumber'			  => $empid,
							'trainingTitle'		  => $arrPost['txttra_name'],
							'trainingContractDate'=> $arrPost['txttra_contract'],
							'trainingStartDate'	  => $arrPost['txttra_sdate'],
							'trainingEndDate'	  => $arrPost['txttra_edate'],
							'trainingHours'		  => $arrPost['txttra_hrs'],
							'trainingTypeofLD'	  => $arrPost['seltra_typeld'],
							'trainingConductedBy' => $arrPost['txttra_sponsored'],
							'trainingVenue'		  => $arrPost['txttra_venue'],
							'trainingCost'		  => $arrPost['txttra_cost'],
							'trainingDesc'		  => $arrPost['txttra_name']); # Same as training title

			$this->pds_model->add_training($arrData);
			$this->session->set_flashdata('strSuccessMsg','Training added successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}

	public function edit_training()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'trainingTitle'		  => $arrPost['txttra_name'],
							'trainingContractDate'=> $arrPost['txttra_contract'],
							'trainingStartDate'	  => $arrPost['txttra_sdate'],
							'trainingEndDate'	  => $arrPost['txttra_edate'],
							'trainingHours'		  => $arrPost['txttra_hrs'],
							'trainingTypeofLD'	  => $arrPost['seltra_typeld'],
							'trainingConductedBy' => $arrPost['txttra_sponsored'],
							'trainingVenue'		  => $arrPost['txttra_venue'],
							'trainingCost'		  => $arrPost['txttra_cost'],
							'trainingDesc'		  => $arrPost['txttra_name']); # Same as training title

			$this->pds_model->save_training($arrData, $arrPost['txttraid']);
			$this->session->set_flashdata('strSuccessMsg','Training updated successfully.');
			redirect('hr/profile/'.$empid);
		endif;	
	}

	public function del_training()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$this->pds_model->delete_training($arrPost['txtdel_tra']);

			$this->session->set_flashdata('strSuccessMsg','Training deleted successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	# END TRAINING

	# BEGIN SKILL & LEGAL INFORMATION
	public function edit_skill()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();

		if(!empty($arrPost)):
			$arrData = array(
							'skills'=> $arrPost['txtskills'],
							'nadr'	=> $arrPost['txtrecognition'],
							'miao'	=> $arrPost['txtorganization']);

			$this->pds_model->save_skill($arrData, $empid);
			$this->session->set_flashdata('strSuccessMsg','Other information updated successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}

	public function edit_legal_info()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();

		if(!empty($arrPost)):
			$arrData = array(
							'relatedThird'	 => $arrPost['optrelated_third'],
							'relatedFourth'	 => $arrPost['optrelated_fourth'],
							'adminCase'		 => $arrPost['optadmincase'],
							'formallyCharged'=> $arrPost['optformally_charged'],
							'violateLaw'	 => $arrPost['optviolate_law'],
							'forcedResign'	 => $arrPost['optforced_resign'],
							'candidate'		 => $arrPost['optcandidate'],
							'campaign'		 => $arrPost['optcampaign'],
							'immigrant'		 => $arrPost['optimmigrant'],
							'indigenous'	 => $arrPost['optindigenous'],
							'disabled'		 => $arrPost['optdisabled'],
							'soloParent'	 => $arrPost['optsolo_parent']);

			$this->pds_model->save_skill($arrData, $empid);
			$this->session->set_flashdata('strSuccessMsg','Legal information updated successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}
	# END SKILL & LEGAL INFORMATION

	# BEGIN CHARACTER REFS
	public function add_char_reference()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'empNumber'	  => $empid,
							'refName'	  => $arrPost['txtref_name'],
							'refAddress'  => $arrPost['txtref_address'],
							'refTelephone'=> $arrPost['txtref_telno']);

			$this->pds_model->add_char_refs($arrData);
			$this->session->set_flashdata('strSuccessMsg','Character reference added successfully.');
			redirect('hr/profile/'.$empid);
		endif;
	}

	public function edit_char_reference()
	{
		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
							'refName'	  => $arrPost['txtref_name'],
							'refAddress'  => $arrPost['txtref_address'],
							'refTelephone'=> $arrPost['txtref_telno']);

			$this->pds_model->save_char_refs($arrData, $arrPost['txtrefid']);
			$this->session->set_flashdata('strSuccessMsg','Character reference updated successfully.');
			redirect('hr/profile/'.$empid);
		endif;	
	}

	public function del_char_reference()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(3);

		if(!empty($arrPost))
		{
			$this->pds_model->delete_char_refs($arrPost['txtdel_char_ref']);

			$this->session->set_flashdata('strSuccessMsg','Character reference deleted successfully.');
			redirect('hr/profile/'.$empid);
		}
	}
	# END CHARACTER REFS

	public function edit_position()
	{
		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$strEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrPosition']=$this->pds_model->getData($strEmpNumber);
			$this->template->load('template/template_view','pds/position_details_view', $this->arrData);
		}
		else
		{
			$strEmpNumber=$arrPost['strEmpNumber'];
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
			$strSecondment-=$arrPost['strSecondment'];
			$dtmPosDate-=$arrPost['dtmPosDate'];
			$strAppointmentDesc-=$arrPost['strAppointmentDesc'];
			$intDependents-=$arrPost['intDependents'];
			$strExecOffice-=$arrPost['strExecOffice'];
			$strPersonnel-=$arrPost['strPersonnel'];
			$strService-=$arrPost['strService'];
			$strDivision-=$arrPost['strDivision'];
			// $XtrainingCode = $this->uri->segment(4);
			if(!empty($strServiceCode))
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
					'includeSecondment'=>$strSecondment,
					'positionDate'=>$dtmPosDate,
					'appointmentCode'=>$strAppointmentDesc,
					'dependents'=>$intDependents,
					'officeCode'=>$strExecOffice,
					'personnelAction'=>$strPersonnel,
					'service'=>$strService,
					'divisionCode'=>$strDivision
				);
				 // echo '='.$strEmpNumber;
				 // exit(1);
				$blnReturn = $this->pds_model->save_position($arrData, $strEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPosition','Edited '.$strServiceCode.' Personal',implode(';',$arrData),'');
					$this->session->set_flashdata('strMsg','Position information updated successfully.');
				}
				redirect('hr/profile/'.$strEmpNumber);
			}
		}		
	}

	public function edit_duties()
	{
		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$strEmpNumber = urldecode($this->uri->segment(4));
			$this->arrData['arrDuties']=$this->pds_model->getData($strEmpNumber);
			$this->template->load('template/template_view','pds/duties_and_responsibilities_view', $this->arrData);
		}
		else
		{
			$strEmpNumber=$arrPost['strEmpNumber'];
			$strPosDuties=$arrPost['strPosDuties'];
			$intPosPercent=$arrPost['intPosPercent'];
			$strPlantillaDuties=$arrPost['strPlantillaDuties'];
			$intPlantillaPercent=$arrPost['intPlantillaPercent'];
			$strActualDuties=$arrPost['strActualDuties'];
			$intActualPercent=$arrPost['intActualPercent'];
			// $positionCode = $this->uri->segment(4);
			if(!empty($strPosDuties))
			{
				$arrData = array(
					'duties'=>$strPosDuties,
					'percentWork'=>$intPosPercent,
					'itemDuties'=>$strPlantillaDuties,
					'percentWork'=>$intPlantillaPercent,
					'duties'=>$strActualDuties,
					'percentWork'=>$intActualPercent
				);
				 // echo '='.$strEmpNumber;
				 // exit(1);
				$blnReturn = $this->pds_model->save_duties($arrData, $strEmpNumber);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpPosition','Edited '.$strServiceCode.' Personal',implode(';',$arrData),'');
					$this->session->set_flashdata('strMsg','Examination information updated successfully.');
				}
				redirect('hr/profile/'.$strEmpNumber);
			}
		}		
	}


	public function uploadTraining()
	{
		$arrPost = $this->input->post();
		$strEmpNum = $arrPost['EmployeeId'];
		$idTraining= $arrPost['idTraining'];

		$config['upload_path']          = 'uploads/employees/attachments/trainings/'.$idTraining.'/';
        $config['allowed_types']        = 'jpg|png|pdf';
        // $path = $_FILES['image']['userfile'];
		// $newName = "<Whatever name>".".".pathinfo($path, PATHINFO_EXTENSION); 
		//$config['file_name'] = $idTraining.".".pathinfo($path, PATHINFO_EXTENSION); 
		$config['overwrite'] = TRUE;
		// print_r($config);
		// exit(1);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (!is_dir($config['upload_path'])) {
    		mkdir($config['upload_path'], 0777, TRUE);
			}

		if ( ! $this->upload->do_upload('userfile'))
		{
			//echo $this->upload->display_errors();
			$error = array('error' => $this->upload->display_errors());
			//print_r($error);
			//exit(1);
			$this->session->set_flashdata('upload_status','Please try again!');
		}
		else
		{
			$data = $this->upload->data();
			//rename($data['full_path'],$data['file_path'].$idTraining.$data['file_ext']);
			// print_r($data);
			// exit(1);
			
			$this->session->set_flashdata('upload_status','Upload successfully saved.');
			
		}
		// print_r($error);
		// print_r($data);
		// exit(1);
		redirect('hr/profile/'.$strEmpNum);
		
	}

	public function uploadEduc()
	{
		$arrPost = $this->input->post();
		$strEmpNum = $arrPost['EmployeeId'];
		$idEduc= $arrPost['idEduc'];

		$config['upload_path']          = 'uploads/employees/attachments/educ/'.$idEduc.'/';
        $config['allowed_types']        = 'jpg|png|pdf';
        // $path = $_FILES['image']['userfile'];
		// $newName = "<Whatever name>".".".pathinfo($path, PATHINFO_EXTENSION); 
		//$config['file_name'] = $idTraining.".".pathinfo($path, PATHINFO_EXTENSION); 
		$config['overwrite'] = TRUE;
		// print_r($config);
		// exit(1);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (!is_dir($config['upload_path'])) {
    		mkdir($config['upload_path'], 0777, TRUE);
			}

		if ( ! $this->upload->do_upload('userfile'))
		{
			//echo $this->upload->display_errors();
			$error = array('error' => $this->upload->display_errors());
			//print_r($error);
			//exit(1);
			$this->session->set_flashdata('upload_status','Please try again!');
		}
		else
		{
			$data = $this->upload->data();
			//rename($data['full_path'],$data['file_path'].$idTraining.$data['file_ext']);
			// print_r($data);
			// exit(1);
			
			$this->session->set_flashdata('upload_status','Upload successfully saved.');
			
		}
		// print_r($error);
		// print_r($data);
		// exit(1);
		redirect('hr/profile/'.$strEmpNum);
		
	}
 
 

   
}
