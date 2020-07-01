<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr_kiosk extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		$this->load->model(array('Dtrkiosk_model','login/login_model','Dtr_log_model', 'libraries/Holiday_model', 'hr/Attendance_summary_model', 'hr/Hr_model', 'Dtrkiosk_model'));
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
					
					// v10 military
					if($arrPost['strUsername'] == $_ENV['intl_usr'] || $arrPost['strUsername'] == $_ENV['intl_usr2']) //for international user
					{
						$dtrlog = date('H:i:s', strtotime($arrPost['txttime']));
						$dtrdate = date('Y-m-d', strtotime($arrPost['txttime']));
						$is_intl = 1;
					}	
					else
					{
						$dtrlog = date('H:i:s');
						$dtrdate = date('Y-m-d');
						$is_intl = 0;
					}

					$emp_log_msg = $this->Dtr_log_model->update_nnbreak_time($empno,$dtrdate,$dtrlog,$is_intl);

					$this->session->set_flashdata($emp_log_msg[0], $emp_log_msg[1]);
					redirect('dtr');
				endif;
			else:
				$arrUser = $this->login_model->authenticate($arrPost['strUsername'],$arrPost['strPassword']);
				if(count($arrUser) > 0):
					$empno = $arrUser[0]['empNumber'];
					// v10 military
					// $dtrlog = date('H:i:s',strtotime('06:30:00 pm'));
					if($arrPost['strUsername'] == $_ENV['intl_usr'] || $arrPost['strUsername'] == $_ENV['intl_usr2']) //for international user
					{
						$dtrlog = date('H:i:s', strtotime($arrPost['txttime']));
						$dtrdate = date('Y-m-d', strtotime($arrPost['txttime']));
						$is_intl = 1;
					}
					else
					{
						$dtrlog = date('H:i:s');
						$dtrdate = date('Y-m-d');
						$is_intl = 0;
					}

					$emp_log_msg = $this->Dtr_log_model->chekdtr_log($empno,$dtrdate,$dtrlog,$is_intl);
					$this->session->set_flashdata($emp_log_msg[0], $emp_log_msg[1]);
					redirect('dtr');
				else:
					// added log
					$this->Attendance_summary_model->add_dtr_log(array('empNumber' => "", 'log_date' => date('Y-m-d H:i:s'), 'log_sql' => "", 'log_notify' => 'Invalid username/password. Tried with: '.$arrPost['strUsername'] , 'log_ip' => $this->input->ip_address()));
					$this->session->set_flashdata('strErrorMsg','Invalid username/password.');
					redirect('dtr');
				endif;
			endif;

		endif;
		$this->load->view('default_view');
	}

	public function dtr_test()
	{
		$arrPost = $this->input->post();
		
		if(!empty($arrPost)):
			if(substr($arrPost['strPassword'], -1) == '*'):
				$orig_password = substr($arrPost['strPassword'], 0, -1);
				$arrUser = $this->login_model->authenticate($arrPost['strUsername'],$orig_password);
				if(count($arrUser) > 0):
					$empno = $arrUser[0]['empNumber'];
					$dtrdate = date('Y-m-d');
					// v10 military
					$dtrlog = date('H:i:s',strtotime('12:01:00'));

					$emp_log_msg = $this->Dtr_log_model->update_nnbreak_time($empno,$dtrdate,$dtrlog);
					// print_r($emp_log_msg);
					$this->session->set_flashdata($emp_log_msg[0], $emp_log_msg[1]);
					redirect('dtr/dtr_test');
				endif;
			else:
				$arrUser = $this->login_model->authenticate($arrPost['strUsername'],$arrPost['strPassword']);
				if(count($arrUser) > 0):
					$empno = $arrUser[0]['empNumber'];
					$dtrdate = date('Y-m-d');
					// v10 military
					// $dtrlog = date('H:i:s');
					// $dtrlog = date('H:i:s',strtotime('06:30:00 pm'));

					if($arrPost['selTime'] == 0)
						$dtrlog = date('H:i:s',strtotime('08:00:00 am'));
					else if($arrPost['selTime'] == 1)
						$dtrlog = date('H:i:s',strtotime('12:01:00 pm'));
					else if($arrPost['selTime'] == 2)
						$dtrlog = date('H:i:s',strtotime('12:02:00 pm'));
					else if($arrPost['selTime'] == 3)
						$dtrlog = date('H:i:s',strtotime('05:01:00 pm'));
					else 
						$dtrlog = date('H:i:s');

					$emp_log_msg = $this->Dtr_log_model->chekdtr_log($empno,$dtrdate,$dtrlog);
					// echo $emp_log_msg;
					// print_r($emp_log_msg);
					$this->session->set_flashdata($emp_log_msg[0], $emp_log_msg[1]);
					redirect('dtr/dtr_test');
				else:
					$this->session->set_flashdata('strErrorMsg','Invalid username/password.');
					redirect('dtr/dtr_test');
				endif;
			endif;
			
		endif;
		$this->load->view('default_view_test');
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

		//Added condition if holiday and if weekends
		$reg_holidays = $this->Holiday_model->getAllHolidates("",date('Y-m-d'),date('Y-m-d'));
		
		if(empty($reg_holidays) && date("N") < 6)
		{
			$emp = $this->Dtrkiosk_model->get_absent_employees();
			foreach($emp as $e):
				if($e['empNumber'] != ''):
					array_push($employee,$e);
				endif;
			endforeach;
		}

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

	// still developing
	public function check_dtr()
	{
		$usr_val = 0;
		$err_msg = '';
		$arrData = array();
		if(substr($_GET['strPassword'], -1) == '*'){
			$orig_password = substr($_GET['strPassword'], 0, -1);
		}
		else{
			$orig_password = $_GET['strPassword'];
		}
		$arrUser = $this->login_model->authenticate($_GET['strUsername'],$orig_password);

		if(count($arrUser) > 0){
			$empno = $arrUser[0]['empNumber'];

			if($_GET['strUsername'] == $_ENV['intl_usr'] || $_GET['strUsername'] == $_ENV['intl_usr2']) 
			{
				$dtrlog = date('H:i:s', strtotime($_GET['txttime']));
				$dtrdate = date('Y-m-d', strtotime($_GET['txttime']));
				$is_intl = 1;
			}
			else
			{
				$dtrlog = date('H:i:s');
				$dtrdate = date('Y-m-d');
				$is_intl = 0;
			}
			
			$arrData = $this->Hr_model->getEmployeePersonal($empno);
			$arrData['fullname'] = getfullname($arrData['firstname'], $arrData['surname'], $arrData['middlename'], $arrData['middleInitial'], $arrData['nameExtension']);
			$arrData['age'] = date_diff(date_create($arrData['birthday']), date_create('now'))->y;
			$arrData['address'] = getaddress($arrData['lot1'], $arrData['street1'], $arrData['subdivision1'], $arrData['barangay1'], $arrData['city1'], $arrData['province1']);
			$usr_val = $this->Dtr_log_model->check_dtr_for_hcd($empno,$dtrdate,$dtrlog,$is_intl);
		}
		else{
			$usr_val = 0;
			$err_msg = 'Invalid username/password.';

			$this->Attendance_summary_model->add_dtr_log(array('empNumber' => "", 'log_date' => date('Y-m-d H:i:s'), 'log_sql' => "", 'log_notify' => 'Invalid username/password. Tried with: '.$_GET['strUsername'] , 'log_ip' => $this->input->ip_address()));
		}

		$arrData = array(
			'emp' => $arrData,
			'usr' => $usr_val,
			'err_msg' => $err_msg
		);

		echo json_encode($arrData);
	}

	public function submit_hcd()
	{
		if($_GET['strUsername'] == $_ENV['intl_usr'] || $_GET['strUsername'] == $_ENV['intl_usr2']) 
		{
			$dtrdate = date('Y-m-d', strtotime($_GET['txtdate']));
			// $sigdate = date('Y-m-d', strtotime($_GET['txtsdate']));
		}
		else
		{
			$dtrdate = date('Y-m-d');
			// $sigdate = date('Y-m-d');
		}

		$arrPost = array(
			'empNumber' => $_GET['txtempno'],
			'dtrDate' => $dtrdate,
			'fullName' => $_GET['txtname'],
			'temperature' => $_GET['txttemp'],
			'sex' => $_GET['rdosex'],
			'age' => $_GET['txtage'],
			'residence_contact' => $_GET['txtrescon'],
			'natureVisit' => isset($_GET['rdonvisit']) ? $_GET['rdonvisit'] : "",
			'natureOb' => isset($_GET['rdonob']) ? $_GET['rdonob'] : "",
			// 'companyName' => $_GET['txtcompname'],
			// 'companyAddress' => $_GET['txtcompadd'],
			'q1_1' => isset($_GET['rdoq1_1']) ? $_GET['rdoq1_1'] : "",
			'q1_2' => isset($_GET['rdoq1_2']) ? $_GET['rdoq1_2'] : "",
			'q1_3' => isset($_GET['rdoq1_3']) ? $_GET['rdoq1_3'] : "",
			'q1_4' => isset($_GET['rdoq1_4']) ? $_GET['rdoq1_4'] : "",
			'q1_5' => isset($_GET['rdoq1_5']) ? $_GET['rdoq1_5'] : "",
			'q1_6' => isset($_GET['rdoq1_6']) ? $_GET['rdoq1_6'] : "",
			'q1_7' => isset($_GET['rdoq1_7']) ? $_GET['rdoq1_7'] : "",
			'q2' => isset($_GET['rdoq2']) ? $_GET['rdoq2'] : "",
			'q3' => isset($_GET['rdoq3']) ? $_GET['rdoq3'] : "",
			'q4' => isset($_GET['rdoq4']) ? $_GET['rdoq4'] : "",
			'q5' => isset($_GET['rdoq5']) ? $_GET['rdoq5'] : "",
			'q5_txt' => $_GET['txtq5'],
			'wfh' => $_GET['wfh'] == "on" ? 1 : 0
			// 'signature' => $_GET['txtsign'],
			// 'signatureDate' => $sigdate
		);
		
		echo json_encode($this->Dtrkiosk_model->save_hcd($arrPost));
	}
   
   	public function delete_dtr(){
		$arrUser = $this->login_model->authenticate($_GET['strUsername'],$_GET['strPassword']);

		if(count($arrUser) > 0){
			$empno = $arrUser[0]['empNumber'];

			$dtrlog = date('H:i:s');
			$dtrdate = date('Y-m-d');
			
			echo json_encode($this->Dtrkiosk_model->delete_dtr($empno,$dtrdate));
		}
		else{
			$arrData = array(
				'status' => 'error',
				'message' => 'Invalid username/password.'
			);

			echo json_encode($arrData);
		}
   	}
}
