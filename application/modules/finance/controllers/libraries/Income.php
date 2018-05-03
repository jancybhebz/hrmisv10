<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Income extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Finance/Income_Model'));
    }

	public function index($status='')
	{
		$this->arrData['income'] = $this->Income_Model->getIncome($status);
		$this->arrData['status'][0] = $status == '' ? array('Show All', '') : ($status == 1 ? array('Show Inactive', 1) : array('Show Active', 0));
		$this->arrData['status'][1] = $status == '' ? array('Show Active', 0) : ($status == 1 ? array('Show Active', 0) : array('Show All', ''));
		$this->arrData['status'][2] = $status == '' ? array('Show Inactive', 1) : ($status == 1 ? array('Show All', '') : array('Show Inactive', 1));
		$this->template->load('template/template_view','finance/libraries/income/income_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'incomeCode' => $arrPost['income-code'],
				'incomeDesc' => $arrPost['income-desc'],
				'incomeType' => $arrPost['income-type'],
				'hidden' => 0
			);
			$this->Income_Model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg','Income added successfully.');
			redirect('finance/income');
		else:
			$this->arrData['checkbox'] = 0;
			$this->template->load('template/template_view','finance/libraries/income/income_add',$this->arrData);
		endif;
	}

	public function edit($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'incomeDesc' => $arrPost['income-desc'],
				'incomeType' => $arrPost['income-type'],
				'hidden' => $arrPost['income-isactive'] == 'on' ? 1 : 0
			);
			$this->Income_Model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Income updated successfully.');
			redirect('finance/income');
		else:
			$this->arrData['checkbox'] = 1;
			$this->template->load('template/template_view','finance/libraries/income/income_add',$this->arrData);
		endif;
	}

	public function delete() { $this->Income_Model->delete($_GET['code']); }
	public function fetchIncome() { echo json_encode($this->Income_Model->getIncome('')); }
	public function fetchIncomeData($code) { echo json_encode($this->Income_Model->getIncomeData($code)); }
}
