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
        $this->load->model(array('hr/HR_model','Deduction_model',
        						 'Compensation_model', 'libraries/Appointment_status_model',
        						 'Benefit_model'));
    }

	public function index()
	{
		$this->arrData['arrEmployees'] = $this->HR_model->getData();
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_all',$this->arrData);
	}

	public function employee($empid)
	{
		$this->load->model(array('PayrollGroup_model', 'Rata_model','libraries/Attendance_scheme_model', 'TaxExempt_model','libraries/Plantilla_model', 'libraries/Separation_mode_model'));
		$res = $this->HR_model->getData($empid);
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
		$this->arrData['arrRataCode'] = $this->Rata_model->getData();

		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();
		$this->arrData['arrPlantillaList'] = $this->Plantilla_model->getAllPlantilla();
		$this->arrData['arrSeparationModes'] = $this->Separation_mode_model->getData();

		if(!isset($_GET['yr']) && !isset($_GET['mon'])):
			$_GET['yr'] = date('Y'); $_GET['mon'] = date('n');
		endif;
		$arrEmpBenefits = $this->Compensation_model->getEmployeeBenefit($empid,$_GET['yr'],$_GET['mon']);
		$this->arrData['arrEmpBenefits'] = $arrEmpBenefits;
		$this->arrData['empSalary'] = $this->arrData['arrData']['actualSalary'];
		$this->arrData['arrEmpDeductions'] = $this->Compensation_model->getEmployeeDeduction($empid,$_GET['yr'],$_GET['mon']);

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

	# Begin 2nd tab of personnel_profile = 'income' 
	public function income($empid)
	{
		$this->load->model('Income_model');
		$res = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $res[0];

		// BENEFIT LIST
		$incomes = $this->Income_model->getDataByType('Benefit');
		$benefits = $this->Benefit_model->getBenefits($empid);
		$this->arrData['benefitList'] = $this->Compensation_model->getBenefitsfromArray($benefits, $incomes);
		$this->arrData['arrStatus'] = array('1' => 'On-going','2' => 'Paused','0' => 'Remove');
		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();
		$this->arrData['arrAppointments_by2'] = count($this->arrData['arrAppointments']) / 2;

		// LONGEVITY PAY
		$this->arrData['arrLongevity'] = $this->Compensation_model->getLongevity($empid);

		// BONUS
		$bonusList = $this->Income_model->getDataByType('Bonus');
		$this->arrData['arrBonuslist'] = $this->Compensation_model->getBenefitsfromArray($benefits, $bonusList);

		$addtlIncome = $this->Income_model->getDataByType('Additional');
		$this->arrData['arrAddtlIncome'] = $this->Compensation_model->getBenefitsfromArray($benefits, $addtlIncome);

		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function actionLongevity()
	{
		$arrPost = $this->input->post();
		$empid = $this->uri->segment(5);

		if(!empty($arrPost)):
			if(isset($arrPost['txtaction'])):
				if($arrPost['txtaction'] == 'add'):
					$arrData = array(
							'empNumber'		=> $empid,
							'longiDate'		=> $arrPost['txtlongevitydate'],
							'longiAmount'	=> $arrPost['txtsalary'],
							'longiPercent'	=> $arrPost['txtpercent'],
							'longiPay'		=> $arrPost['txtsalary'] * ($arrPost['txtpercent'] / 100));
					$this->Compensation_model->addLongevity($arrData);
					$this->session->set_flashdata('strSuccessMsg','Longevity pay added successfully.');
				endif;

				if($arrPost['txtaction'] == 'edit'):
					$arrData = array(
							'longiDate'		=> $arrPost['txtlongevitydate'],
							'longiAmount'	=> $arrPost['txtsalary'],
							'longiPercent'	=> $arrPost['txtpercent'],
							'longiPay'		=> $arrPost['txtsalary'] * ($arrPost['txtpercent'] / 100));
					$this->Compensation_model->editLongevity($arrData, $empid, $arrPost['txtlongevityid']);
					$this->session->set_flashdata('strSuccessMsg','Longevity pay updated successfully.');
				endif;
			endif;

			if(isset($arrPost['txtdel_action'])):
				if($arrPost['txtdel_action'] == 'del'):
					$this->Compensation_model->delLongevity($empid, $arrPost['txtdel_longevityid']);
					$this->session->set_flashdata('strSuccessMsg','Longevity pay deleted successfully.');
				endif;
			endif;

		endif;
		redirect('finance/compensation/personnel_profile/income/'.$empid.'/2');
	}

	public function edit_benefits($empid)
	{
		$arrPost = $this->input->post();

		# check if exist in benefits
		$checkexist = $this->Benefit_model->getBenefits($this->uri->segment(5), $arrPost['txtincomecode']);
		if(count($checkexist) > 0):
			$arrData = array('incomeAmount' => $arrPost['txtamount'],
							 'ITW' => $arrPost['txttax'],
							 'period1' => $arrPost['txtperiod1'],
							 'period2' => $arrPost['txtperiod2'],
							 'status' => $arrPost['selstatus']);
			$this->Benefit_model->edit($arrData, $arrPost['txtbenefitcode']);
			$this->session->set_flashdata('strSuccessMsg', $arrPost['txtbenefitType'].' updated successfully.');
		else:
			$arrData = array('empNumber' => $this->uri->segment(5),
							 'incomeCode' => $arrPost['txtincomecode'],
							 'incomeAmount' => $arrPost['txtamount'],
							 'ITW' => $arrPost['txttax'],
							 'period1' => $arrPost['txtperiod1'],
							 'period2' => $arrPost['txtperiod2'],
							 'status' => $arrPost['selstatus']);
			$this->Benefit_model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg', $arrPost['txtbenefitType'].' added successfully.');
		endif;
		redirect('finance/compensation/personnel_profile/income/'.$this->uri->segment(5));
	}

	public function updateAllEmployees()
	{
		$arrPost = $this->input->post();
		print_r($arrPost);
	}
	# End 2nd tab of personnel_profile = 'income' 

	public function deduction_summary($empid)
	{
		$this->load->model('libraries/Agency_profile_model');
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];

		$res = $this->HR_model->getData($empid);
		$agencyData = $this->Agency_profile_model->getData();

		// LIFE RETIREMENT
		$this->arrData['lifeRetirement'] = $this->Compensation_model->getLifeRetirement(
												$res[0]['lifeRetSwitch'], $res[0]['actualSalary'],
												$agencyData[0]['gsisEmpShare'], $agencyData[0]['gsisEmprShare'], $empid);
		// PAGIBIG
		$this->arrData['pagibig'] = $this->Compensation_model->getPagibig(
												$res[0]['pagibigSwitch'], $res[0]['actualSalary'],
												$agencyData[0]['pagibigEmpShare'], $agencyData[0]['pagibigEmprShare'],$empid);

		// PHILHEALTH
		$this->arrData['philhealth'] = $this->Compensation_model->getPhilhealth(
												$res[0]['philhealthSwitch'], $res[0]['actualSalary'],
												$agencyData[0]['philhealthEmpShare'], $agencyData[0]['philhealthEmprShare'],$empid);
		// ITW
		$this->arrData['itw'] = $this->Compensation_model->getITW($empid);

		$this->arrData['arrLoans'] = $this->Compensation_model->getLoans($empid);
		$this->arrData['arrContributions'] = $this->Compensation_model->getContributions($empid);
		$this->arrData['arrFinishedLoans'] = $this->Compensation_model->getFinishedLoans($empid);

		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function premium_loan($empid)
	{
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];

		$this->arrData['arrDeductions'] = $this->Compensation_model->getPremiumDeduction($empid, 'Regular');
		$this->arrData['arrLoans'] = $this->Compensation_model->getPremiumDeduction($empid, 'Loan');
		$this->arrData['arrContributions'] = $this->Compensation_model->getPremiumContribution($empid, 'Contribution');
		
		$this->arrData['arrStatus'] = array('1' => 'On-going','2' => 'Paused','0' => 'Remove');
		
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function remittances($empid)
	{
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];

		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$this->load->model('Remittance_model');
			$this->arrData['arrRemittances'] = $this->Remittance_model->getRemittance($empid, $arrPost['selpayrollGrp'], $arrPost['from'], $arrPost['to']);
		endif;

		$arrDeductions = $this->Deduction_model->getDeductionsByStatus(0);
		array_push($arrDeductions, array('deductionCode' => 'ALLGSIS', 'deductionDesc' => 'ALL GSIS Deduction(exc. Life and Ret. Prem.)'));
		$this->arrData['arrDeductions'] = $arrDeductions;
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function tax_details($empid)
	{
		$this->load->model('TaxDetails_model');
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];
		$this->arrData['action'] = 'view';

		$this->arrData['arrTaxDetails'] = $this->TaxDetails_model->getTaxDetails($empid);
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function edit_tax_details($empid)
	{
		$this->load->model('TaxDetails_model');
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];
		$this->arrData['action'] = 'edit';
		$arrTaxDetails = $this->TaxDetails_model->getTaxDetails($empid);
		
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array('otherDependent' => $arrPost['txtdependent_name'],
							 'dBirthDate' => $arrPost['txtdependent_bday'],
							 'dRelationship' => $arrPost['txtdependent_rel'],
							 'pTin1' => $arrPost['txtemp1_tin'],
							 'pAddress1' => $arrPost['txtemp1_reg'],
							 'pEmployer1' => $arrPost['txtemp1_name'],
							 'pZipCode1' => $arrPost['txtemp1_zip'],
							 'pTin2' => $arrPost['txtemp2_tin'],
							 'pAddress2' => $arrPost['txtemp2_reg'],
							 'pEmployer2' => $arrPost['txtemp2_name'],
							 'pZipCode2' => $arrPost['txtemp2_zip'],
							 'pTin' => $arrPost['txtemp3_tin'],
							 'pAddress' => $arrPost['txtemp3_reg'],
							 'pEmployer' => $arrPost['txtemp3_name'],
							 'pZipCode' => $arrPost['txtemp3_zip'],
							 'pTaxComp' => $arrPost['txtcompen'],
							 'pTaxWheld' => $arrPost['txttax']
							);
			if($arrTaxDetails !=null):
				$this->TaxDetails_model->editTaxDetails($arrData, $empid);
				$this->session->set_flashdata('strSuccessMsg','Tax details updated successfully.');
				redirect('finance/compensation/personnel_profile/tax_details/'.$empid);
			else:
				$arrData['empNumber'] = $empid;
				$this->TaxDetails_model->add($arrData);
				$this->session->set_flashdata('strSuccessMsg','Tax details added successfully.');
				redirect('finance/compensation/personnel_profile/tax_details/'.$empid);
			endif;
		endif;

		$this->arrData['arrTaxDetails'] = $arrTaxDetails;
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function dtr($empid)
	{
		$this->load->model('Dtr_model');
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];

		if(!isset($_GET['yr']) && !isset($_GET['mon'])):
			$_GET['yr'] = date('Y'); $_GET['mon'] = date('n');
		endif;

		$month = str_pad($_GET['mon'], 2, '0', STR_PAD_LEFT);
		$year = $_GET['yr'];

		$resDtr = $this->Dtr_model->getData($empid, $year, $month);
		$totaldays = cal_days_in_month(CAL_GREGORIAN, $month, $year);

		$arrDtr = array();

		// echo $totaldays;
		echo '<pre>';
		print_r($resDtr);
		foreach (range(1, $totaldays) as $day):
			$strsearch = $year.'-'.$month.'-'.str_pad($day, 2, '0', STR_PAD_LEFT);
			$d_key = array_search($strsearch, array_column($resDtr, 'dtrDate'));
			echo date('D', strtotime($strsearch)).'<br>';
			echo $strsearch.' = '.$d_key.'<hr>';
			$arrDtr[] = array('mday' => str_pad($day, 2, '0', STR_PAD_LEFT),
							  'wday' => date('D', strtotime($strsearch)));
		endforeach;
		print_r($arrDtr);
		die();
		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function adjustments($empid)
	{
		$employeeData = $this->HR_model->getData($empid);
		$this->arrData['arrData'] = $employeeData[0];

		$this->template->load('template/template_view','finance/compensation/personnel_profile/view_employee',$this->arrData);
	}

	public function edit_deduction()
	{
		$arrPost = $this->input->post();
		$empid = $this->uri->segment(5);

		if($arrPost['txtdeductcode'] != ''):
			$arrData = array('deductionCode' => $arrPost['txtdeductioncode'],
							 'monthly' => str_replace(',', '', $arrPost['txtamount']),
							 'period1' => str_replace(',', '', $arrPost['txtperiod1']),
							 'period2' => str_replace(',', '', $arrPost['txtperiod2']),
							 'status' => $arrPost['selstatus']);
			$this->Compensation_model->editDeduction($arrData, $arrPost['txtdeductcode'], $empid);
			$this->session->set_flashdata('strSuccessMsg', $arrPost['txtdeductionType'].' updated successfully.');
		else:
			$arrData = array('empNumber' => $empid,
							 'deductionCode' => $arrPost['txtdeductioncode'],
							 'monthly' => $arrPost['txtamount'],
							 'period1' => str_replace(',', '', $arrPost['txtperiod1']),
							 'period2' => str_replace(',', '', $arrPost['txtperiod2']),
							 'status' => $arrPost['selstatus']);
			$this->Compensation_model->addDeduction($arrData);
			$this->session->set_flashdata('strSuccessMsg', $arrPost['txtdeductionType'].' added successfully.');
		endif;
		redirect('finance/compensation/personnel_profile/premium_loan/'.$empid);
	}


}
/* End of file Deductions.php
 * Location: ./application/modules/finance/controllers/compensation/Personnel_profile.php */