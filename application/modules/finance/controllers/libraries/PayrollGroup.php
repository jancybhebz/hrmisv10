<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayrollGroup extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Finance/PayrollGroup_model', 'Finance/ProjectCode_model'));
    }

	public function index()
	{
		$this->arrData['payrollgroup'] = $this->PayrollGroup_model->getData('');
		$this->template->load('template/template_view','finance/libraries/payrollgroup/payrollgroup_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'projectCode' => $arrPost['selprojdesc'],
				'payrollGroupCode' => $arrPost['txtcode'],
				'payrollGroupName' => $arrPost['txtdesc'],
				'payrollGroupOrder' => $arrPost['txtorder'],
				'payrollGroupRC' => $arrPost['txtrc']
			);
			if(!$this->PayrollGroup_model->isCodeExists($arrPost['txtcode'],'add')):
				$this->PayrollGroup_model->add($arrData);
				$this->session->set_flashdata('strSuccessMsg','Payroll group added successfully.');
				redirect('finance/libraries/payrollgroup');
			else:
				$this->arrData['err'] = 'Code already exists';
			endif;
		endif;
		$this->arrData['action'] = 'add';
		$this->arrData['projectcode'] = $this->ProjectCode_model->getData('');
		$this->template->load('template/template_view','finance/libraries/payrollgroup/payrollgroup_add',$this->arrData);
	}

	public function edit($code)
	{
		$code = str_replace('%20', ' ', $code);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'projectCode' => $arrPost['selprojdesc'],
				'payrollGroupName' => $arrPost['txtdesc'],
				'payrollGroupOrder' => $arrPost['txtorder'],
				'payrollGroupRC' => $arrPost['txtrc']
			);
			$this->PayrollGroup_model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Project Code updated successfully.');
			redirect('finance/libraries/payrollgroup');
		endif;
		$this->arrData['action'] = 'edit';
		$this->arrData['data'] = $this->PayrollGroup_model->getData($code);
		$this->arrData['projectcode'] = $this->ProjectCode_model->getData('');
		$this->template->load('template/template_view','finance/libraries/payrollgroup/payrollgroup_add',$this->arrData);
	}

	public function delete() 
	{ 
		$this->PayrollGroup_model->delete($_GET['code']);
	}


}
