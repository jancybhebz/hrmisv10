<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signatory extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Signatory_model', 'PayrollGroup_model'));
    }

	public function index()
	{
		$sig_mod = $this->session->userdata('sessUserLevel')==1 ? 1 : 0;
		$this->arrData['signatories'] = $this->Signatory_model->getSignatoriesByModule($sig_mod);
		$this->template->load('template/template_view','finance/libraries/signatory/signatory_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		$module = $this->session->userdata('sessUserLevel')==1 ? 1 : 0;
		if(!empty($arrPost)):
			$arrData = array(
				'payrollGroupCode'  => $arrPost['txtpgcode'],
				'signatory' 		=> $arrPost['txtsignatory'],
				'signatoryPosition' => $arrPost['txtposition'],
				'sig_module' 		=> $module);
			$this->Signatory_model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg','Signatory added successfully.');
			redirect('finance/libraries/signatory');
		endif;
		$this->arrData['action'] = 'add';
		$this->arrData['paryollGroup'] = $this->PayrollGroup_model->getData('');
		$this->template->load('template/template_view','finance/libraries/signatory/signatory_add',$this->arrData);
	}

	public function edit($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'payrollGroupCode' => $arrPost['txtpgcode'],
				'signatory' => $arrPost['txtsignatory'],
				'signatoryPosition' => $arrPost['txtposition']
			);
			$this->Signatory_model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Signatory updated successfully.');
			redirect('finance/libraries/signatory');
		endif;
		$this->arrData['action'] = 'edit';
		$this->arrData['data'] = $this->Signatory_model->getSignatories($code);
		$this->arrData['paryollGroup'] = $this->PayrollGroup_model->getData('');
		$this->template->load('template/template_view','finance/libraries/signatory/signatory_add',$this->arrData);
	}

	public function delete()
	{
		$arrPost = $this->input->post();
		$this->Signatory_model->delete($arrPost['txtcode']);
		$this->session->set_flashdata('strSuccessMsg','Signatory successfully deleted.');
		redirect('finance/libraries/signatory');
	}

	public function fetchSignatoryData($code) { echo json_encode($this->Signatory_model->getSignatories($code)); }
}
