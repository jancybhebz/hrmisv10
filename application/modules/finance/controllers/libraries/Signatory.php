<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signatory extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Finance/Signatory_model', 'Finance/PayrollGroup_model'));
    }

	public function index()
	{
		$this->arrData['signatories'] = $this->Signatory_model->getSignatories('');
		$this->template->load('template/template_view','finance/libraries/signatory/signatory_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'payrollGroupCode' => $arrPost['sig-pgcode'],
				'signatory' => $arrPost['sig-sign'],
				'signatoryPosition' => $arrPost['sig-pos']
			);
			$this->Signatory_model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg','Signatory added successfully.');
			redirect('finance/signatory');
		else:
			$this->arrData['checkbox'] = 0;
			$this->arrData['paryollGroup'] = $this->PayrollGroup_model->getPayrollGroup('');
			$this->template->load('template/template_view','finance/libraries/signatory/signatory_add',$this->arrData);
		endif;
	}

	public function edit($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'payrollGroupCode' => $arrPost['sig-pgcode'],
				'signatory' => $arrPost['sig-sign'],
				'signatoryPosition' => $arrPost['sig-pos']
			);
			$this->Signatory_model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Signatory updated successfully.');
			redirect('finance/signatory');
		else:
			$this->arrData['checkbox'] = 1;
			$this->arrData['paryollGroup'] = $this->PayrollGroup_model->getPayrollGroup('');
			$this->template->load('template/template_view','finance/libraries/signatory/signatory_add',$this->arrData);
		endif;
	}

	public function delete() { $this->Signatory_model->delete($_GET['code']); }
	public function fetchSignatoryData($code) { echo json_encode($this->Signatory_model->getSignatories($code)); }
}
