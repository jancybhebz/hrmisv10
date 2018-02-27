<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deductions extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Finance/Deduction_Model'));
    }

	public function index($status='')
	{
		$this->arrData['deductions'] = $this->Deduction_Model->getDeductionsByStatus($status);
		$this->arrData['status'][0] = $status == '' ? array('Show All', '') : ($status == 1 ? array('Show Inactive', 1) : array('Show Active', 0));
		$this->arrData['status'][1] = $status == '' ? array('Show Active', 0) : ($status == 1 ? array('Show Active', 0) : array('Show All', ''));
		$this->arrData['status'][2] = $status == '' ? array('Show Inactive', 1) : ($status == 1 ? array('Show All', '') : array('Show Inactive', 1));
		$this->arrData['agency'] = $this->Deduction_Model->getDeductionGroup('');
		$this->template->load('template/template_view','finance/libraries/deductions/deductions_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'deductionCode' => $arrPost['deduct-code'],
				'deductionDesc' => $arrPost['deduct-desc'],
				'deductionType' => $arrPost['deduct-type'],
				'deductionGroupCode' => $arrPost['deduct-agency'],
				'deductionAccountCode' => $arrPost['acct-code'],
				'hidden' => 0
			);
			$this->Deduction_Model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg','Deduction added successfully.');
			redirect('finance/Deductions');
		else:
			$this->arrData['checkbox'] = 0;
			$this->arrData['agency'] = $this->Deduction_Model->getDeductionGroup('');
			$this->template->load('template/template_view','finance/libraries/deductions/deductions_add',$this->arrData);
		endif;
	}

	public function add_agency()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'deductionGroupCode' => $arrPost['agency-code'],
				'deductionGroupDesc' => $arrPost['agency-desc'],
				'deductionGroupAccountCode' => $arrPost['acct-code']
			);
			$this->Deduction_Model->addAgency($arrData);
			$this->session->set_flashdata('strSuccessMsg','Agency added successfully.');
			redirect('finance/Deductions?tab=agency');
		else:
			$this->arrData['edit'] = 0;
			$this->template->load('template/template_view','finance/libraries/deductions/agency_add',$this->arrData);
		endif;
	}

	public function edit($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'deductionDesc' => $arrPost['deduct-desc'],
				'deductionType' => $arrPost['deduct-type'],
				'deductionGroupCode' => $arrPost['deduct-agency'],
				'deductionAccountCode' => $arrPost['acct-code'],
				'hidden' => $arrPost['deduct-isactive'] == 'on' ? 1 : 0
			);
			$this->Deduction_Model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Deduction updated successfully.');
			redirect('finance/Deductions');
		else:
			$this->arrData['checkbox'] = 1;
			$this->arrData['agency'] = $this->Deduction_Model->getDeductionGroup('');
			$this->template->load('template/template_view','finance/libraries/deductions/deductions_add',$this->arrData);
		endif;
	}

	public function edit_agency($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'deductionGroupDesc' => $arrPost['agency-desc'],
				'deductionGroupAccountCode' => $arrPost['acct-code']
			);
			$this->Deduction_Model->edit_agency($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Agency updated successfully.');
			redirect('finance/Deductions?tab=agency');
		else:
			$this->arrData['edit'] = 1;
			$this->template->load('template/template_view','finance/libraries/deductions/agency_add',$this->arrData);
		endif;
	}

	public function delete()
	{
		$this->Deduction_Model->delete($_GET['tab'], $_GET['code']);
	}

	public function fetchDeductionCodes() { echo json_encode($this->Deduction_Model->getDeductions('')); }
	public function fetchDeduction($code) { echo json_encode($this->Deduction_Model->getDeductions($code)); }
	public function fetchAgency() { echo json_encode($this->Deduction_Model->getDeductionGroup('')); }
	public function fetchAgencyData($code) { echo json_encode($this->Deduction_Model->getDeductionGroup($code)); }

}
