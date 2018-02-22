<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Finance extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('finance/Finance_Model'));
    }

	public function deductions($status='')
	{
		$this->arrData['deductions'] = $this->Finance_Model->getDeductionsByStatus($status);
		$this->arrData['status'][0] = $status == '' ? array('Show All', '') : ($status == 1 ? array('Show Inactive', 1) : array('Show Active', 0));
		$this->arrData['status'][1] = $status == '' ? array('Show Active', 0) : ($status == 1 ? array('Show Active', 0) : array('Show All', ''));
		$this->arrData['status'][2] = $status == '' ? array('Show Inactive', 1) : ($status == 1 ? array('Show All', '') : array('Show Inactive', 1));
		$this->template->load('template/template_view','Finance/deductions_view',$this->arrData);
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
			$this->Finance_Model->add($arrData);
			redirect('Finance/deductions');
		else:
			$this->arrData['checkbox'] = 0;
			$this->arrData['agency'] = $this->Finance_Model->getDeductionGroup('');
			$this->template->load('template/template_view','Finance/deductions_add',$this->arrData);
		endif;
	}

	public function edit($code)
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
			$this->Finance_Model->edit($arrData);
			$this->session->set_flashdata('strMsg','Course added successfully.');
			redirect('Finance/deductions');
		else:
			$this->arrData['checkbox'] = 1;
			$this->arrData['agency'] = $this->Finance_Model->getDeductionGroup('');
			$this->template->load('template/template_view','Finance/deductions_add',$this->arrData);
		endif;
	}

	public function fetchDeductionCodes()
	{
		echo json_encode($this->Finance_Model->getDeductions(''));
	}

	public function fetchDeduction($code)
	{
		echo json_encode($this->Finance_Model->getDeductions($code));
	}

}
