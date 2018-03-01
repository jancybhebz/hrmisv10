<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ProjectCode extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('Finance/ProjectCode_model'));
    }

	public function index()
	{
		$this->arrData['projectcodes'] = $this->ProjectCode_model->getProjectCodes('');
		$this->template->load('template/template_view','finance/libraries/projectcode/projectcode_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'projectCode' => $arrPost['project-code'],
				'projectDesc' => $arrPost['project-desc'],
				'projectOrder' => $arrPost['project-order']
			);
			$this->ProjectCode_model->add($arrData);
			$this->session->set_flashdata('strSuccessMsg','Project Code added successfully.');
			redirect('finance/projectcode');
		else:
			$this->arrData['checkbox'] = 0;
			$this->template->load('template/template_view','finance/libraries/projectcode/projectcode_add',$this->arrData);
		endif;
	}

	public function edit($code)
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'projectDesc' => $arrPost['project-desc'],
				'projectOrder' => $arrPost['project-order']
			);
			$this->ProjectCode_model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Project Code updated successfully.');
			redirect('finance/projectcode');
		else:
			$this->arrData['checkbox'] = 1;
			$this->template->load('template/template_view','finance/libraries/projectcode/projectcode_add',$this->arrData);
		endif;
	}

	public function delete() { $this->ProjectCode_model->delete($_GET['code']); }
	public function fetchCodes() { echo json_encode($this->ProjectCode_model->getProjectCodes('')); }
	public function fetchProjectCodeData($code) { echo json_encode($this->ProjectCode_model->getProjectCodes($code)); }
}
