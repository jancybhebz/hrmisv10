<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Personnel_profile extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/hr_model',
        						'PayrollGroup_model',
        						'Rata_model',
        						'libraries/Attendance_scheme_model',
        						'TaxExempt_model',
        						'RATA_model',
        						'libraries/Appointment_status_model',
        						'libraries/Plantilla_model',
        						'libraries/Separation_mode_model',
        						'Compensation_model'));
    }

	public function index()
	{
		$this->arrData['arrEmployees'] = $this->hr_model->getData();
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_all',$this->arrData);
	}

	public function employee($empid)
	{
		$res = $this->hr_model->getData($empid);
		$this->arrData['arrData'] = $res[0];
		$this->arrData['pGroups'] = $this->PayrollGroup_model->getData();
		$this->arrData['rata'] = $this->Rata_model->getData($res[0]['RATACode']);
		$this->arrData['pg'] = $this->PayrollGroup_model->getData($res[0]['payrollGroupCode']);

		$arrAs = array();
		$arrAttSchemes = $this->Attendance_scheme_model->getData();
		foreach($arrAttSchemes as $as):
			if($as['schemeType'] == 'Sliding'):
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5).'-'.substr($as['amTimeinTo'],0,5).','.substr($as['pmTimeoutFrom'],0,5).'-'.substr($as['pmTimeoutTo'],0,5).')';
			else:
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5)."-".substr($as['pmTimeoutTo'],0,5).')';
			endif;
			$arrAs[] = $varas;
		endforeach;
		$this->arrData['arrAttSchemes'] = $arrAs;
		$this->arrData['tax_status'] = $this->TaxExempt_model->getData();
		$this->arrData['arrRataCode'] = $this->RATA_model->getData();

		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();
		$this->arrData['arrPlantillaList'] = $this->Plantilla_model->getAllPlantilla();
		$this->arrData['arrSeparationModes'] = $this->Separation_mode_model->getData();

		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function edit_payrollDetails()
	{
		$arrPost = $this->input->post();
		$empid = $this->uri->segment(5);
		
		if(!empty($arrPost)):
			$arrData = array(
					'payrollGroupCode'  => $arrPost['selpayrollGrp'],
					'payrollSwitch'     => isset($arrPost['chkis_incPayroll']) ? $arrPost['chkis_incPayroll'] : '',
					'schemeCode'        => $arrPost['selattScheme'],
					'taxSwitch'         => isset($arrPost['chkis_selfemployed']) ? $arrPost['chkis_selfemployed'] : '',
					'taxStatCode'       => $arrPost['seltaxStatus'],
					'dependents'        => $arrPost['txtnodependents'],
					'healthProvider'    => isset($arrPost['chkis_health']) ? $arrPost['chkis_health'] : '',
					'taxRate'           => $arrPost['txttxtRate'],
					'hpFactor'          => $arrPost['txthazardPay'],
					'RATACode'          => $arrPost['selrataCode'],
					'RATAVehicle'       => isset($arrPost['chkw_govt_vehicle']) ? $arrPost['chkw_govt_vehicle'] : '');
			$this->Compensation_model->editEmpPosition($arrData, $empid, $arrPost['txtacctNumber']);
		endif;
		redirect('finance/compensation/personnel_profile/employee/'.$empid.'/1');

	}

	public function edit_positionDetails()
	{
		$arrPost = $this->input->post();
		$empid = $this->uri->segment(5);
		
		if(!empty($arrPost)):
			$arrData = array(
					'appointmentCode'	=> $arrPost['selappointment'],
					'itemNumber'		=> $arrPost['selitem'],
					'actualSalary'		=> $arrPost['txtactual_salary'],
					'authorizeSalary'	=> $arrPost['txtauth_salary'],
					'positionDate'		=> $arrPost['txtpositiondate'],
					'statusOfAppointment' => $arrPost['selmodeofseparation'],
					'salaryGradeNumber'	=> $arrPost['txtsalaryGrade'],
					'stepNumber'		=> $arrPost['selStep_number'],
					'dateIncremented'	=> $arrPost['txtdateincrement']);
			$this->Compensation_model->editEmpPosition($arrData, $empid);
		endif;
		redirect('finance/compensation/personnel_profile/employee/'.$empid.'/2');

	}

	public function income($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function deduction_summary($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function premium_loan($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function remittances($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function tax_details($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function dtr($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function adjustments($empid)
	{
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

}
/* End of file Deductions.php
 * Location: ./application/modules/finance/controllers/libraries/Deductions.php */