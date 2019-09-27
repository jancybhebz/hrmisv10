<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr_kiosk extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		$this->load->model(array('Dtrkiosk_model','login/login_model','Dtr_log_model'));
    }
    
	public function index()
	{
		$arrPost = $this->input->post();
		
		if(!empty($arrPost)):
			if(substr($arrPost['strPassword'], -1) == '*'):
				$orig_password = substr($arrPost['strPassword'], 0, -1);
				$arrUser = $this->login_model->authenticate($arrPost['strUsername'],$orig_password);
				if(count($arrUser) > 0):
					$empno = $arrUser[0]['empNumber'];
					$dtrdate = date('Y-m-d');
					$dtrlog = date('H:i:s');
					$emp_log_msg = $this->Dtr_log_model->update_nnbreak_time($empno,$dtrdate,$dtrlog);
					
					$this->session->set_flashdata($emp_log_msg[0], $emp_log_msg[1]);
					redirect('dtr');
				endif;
			else:
				$arrUser = $this->login_model->authenticate($arrPost['strUsername'],$arrPost['strPassword']);
				if(count($arrUser) > 0):
					$empno = $arrUser[0]['empNumber'];
					$dtrdate = date('Y-m-d');
					$dtrlog = date('H:i:s');
					// $dtrlog = date('H:i:s',strtotime('06:30:00'));
					$emp_log_msg = $this->Dtr_log_model->chekdtr_log($empno,$dtrdate,$dtrlog);
					$this->session->set_flashdata($emp_log_msg[0], $emp_log_msg[1]);
					redirect('dtr');
				else:
					$this->session->set_flashdata('strErrorMsg','Invalid username/password.');
					redirect('dtr');
				endif;
			endif;
			
		endif;
		$this->load->view('default_view');
	}

	public function emp_presents()
	{
		$arremp_dtr = array();
		$emp = $this->Dtrkiosk_model->get_present_employees();
		foreach($emp as $e):
			if(!($e['inAM'] == '00:00:00' && $e['outAM'] == '00:00:00' && $e['inPM'] == '00:00:00' && $e['outPM'] == '00:00:00')):
				$e['inAM']  = $e['inAM']  == '00:00:00' ? '00:00' : date('h:i',strtotime($e['inAM']));
				$e['outAM'] = $e['outAM'] == '00:00:00' ? '00:00' : date('h:i',strtotime($e['outAM']));
				$e['inPM']  = $e['inPM']  == '00:00:00' ? '00:00' : date('h:i',strtotime($e['inPM']));
				$e['outPM'] = $e['outPM'] == '00:00:00' ? '00:00' : date('h:i',strtotime($e['outPM']));
				array_push($arremp_dtr,$e);
			endif;
		endforeach;
		echo json_encode($arremp_dtr);
	}

	public function emp_absents()
	{
		$employee = array();
		$emp = $this->Dtrkiosk_model->get_absent_employees();
		foreach($emp as $e):
			if($e['empNumber'] != ''):
				array_push($employee,$e);
			endif;
		endforeach;
		echo json_encode($employee);
	}

	public function emp_ob()
	{
		$emp = $this->Dtrkiosk_model->get_ob_employees();
		echo json_encode($emp);
	}

	public function emp_leave()
	{
		$emp = $this->Dtrkiosk_model->get_leave_employees();
		echo json_encode($emp);
	}

   
}
