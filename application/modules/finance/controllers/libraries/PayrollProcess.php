<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PayrollProcess extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('ProjectCode_model', 'libraries/Appointment_status_model', 'Process_model'));
    }

	public function index()
	{
		$arrPayroll = $this->Process_model->getProcessData();
		foreach($arrPayroll as $key => $payroll):
			$pprocess = array();
			foreach(explode(',', $payroll['processWith']) as $procwith):
				$process = $this->Appointment_status_model->getData($procwith);
				array_push($pprocess, $process[0]['appointmentDesc']);
			endforeach;
			$arrPayroll[$key]['process_with'] = implode(', ', $pprocess);
		endforeach;

		$this->arrData['arrPayrollProc'] = $arrPayroll;
		$this->template->load('template/template_view','finance/libraries/payrollprocess/payrollprocess_view',$this->arrData);
	}

	public function add()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'appointmentCode' => $arrPost['selappointment'],
				'processWith' => implode(',', $arrPost['selprocesswith']),
				'computation' => $arrPost['selsalary']
			);
			
			if(!$this->Process_model->isCodeExists($arrPost['selappointment'],'add')):
				$this->Process_model->add($arrData);
				$this->session->set_flashdata('strSuccessMsg','Payroll process added successfully.');
				redirect('finance/libraries/payrollprocess');
			else:
				$this->arrData['err'] = 'Code already exists';
			endif;
		endif;

		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();

		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','finance/libraries/payrollprocess/payrollprocess_add',$this->arrData);
	}

	public function edit()
	{
		$code = str_replace('%20', ' ', $this->uri->segment(5));
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$arrData = array(
				'processWith' => implode(',', $arrPost['selprocesswith']),
				'computation' => $arrPost['selsalary']
			);
			$this->Process_model->edit($arrData, $code);
			$this->session->set_flashdata('strSuccessMsg','Payroll process updated successfully.');
			redirect('finance/libraries/payrollprocess');
		endif;
		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();
		$this->arrData['arrData'] = $this->Process_model->getProcessData($code);

		$this->arrData['action'] = 'edit';
		$this->template->load('template/template_view','finance/libraries/payrollprocess/payrollprocess_add',$this->arrData);
	}

	public function delete()
	{
		$arrPost = $this->input->post();
		$this->Process_model->delete($arrPost['txtcode']);
		$this->session->set_flashdata('strSuccessMsg','Payroll process successfully deleted.');
		redirect('finance/libraries/payrollprocess');
	}


}
