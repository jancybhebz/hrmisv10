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
		$this->arrData['payrollgroup'] = $this->PayrollGroup_model->getPayrollGroup('');
		$this->template->load('template/template_view','finance/libraries/payrollgroup/payrollgroup_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'projectCode' => $arrPost['pg-project'],
				'payrollGroupCode' => $arrPost['pg-code'],
				'payrollGroupName' => $arrPost['pg-desc'],
				'payrollGroupOrder' => $arrPost['pg-order'],
				'payrollGroupRC' => $arrPost['pg-rc']
			);
			$this->PayrollGroup_model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg','Payroll group added successfully.');
			redirect('finance/payrollgroup');
		else:
			$this->arrData['checkbox'] = 0;
			$this->arrData['projectcode'] = $this->ProjectCode_model->getProjectCodes('');
			$this->template->load('template/template_view','finance/libraries/payrollgroup/payrollgroup_add',$this->arrData);
		endif;
	}

	public function edit($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'projectCode' => $arrPost['pg-project'],
				'payrollGroupName' => $arrPost['pg-desc'],
				'payrollGroupOrder' => $arrPost['pg-order'],
				'payrollGroupRC' => $arrPost['pg-rc']
			);
			$this->PayrollGroup_model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Project Code updated successfully.');
			redirect('finance/payrollgroup');
		else:
			$this->arrData['checkbox'] = 1;
			$this->arrData['projectcode'] = $this->ProjectCode_model->getProjectCodes('');
			$this->template->load('template/template_view','finance/libraries/payrollgroup/payrollgroup_add',$this->arrData);
		endif;
	}

	public function delete() { $this->PayrollGroup_model->delete($_GET['code']); }
	public function fetchPayrollGroup() { echo json_encode($this->PayrollGroup_model->getPayrollGroupCode()); }
	public function fetchPayrollGroupData($code) { echo json_encode($this->PayrollGroup_model->getPayrollGroup($code)); }
}
