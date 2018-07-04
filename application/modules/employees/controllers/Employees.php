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

	
}
