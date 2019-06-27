 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dtr_kiosk extends MY_Controller 
{
	var $arrData;
	function __construct() 
	{
        parent::__construct();
  		$this->load->model(array('Dtrkiosk_model'));
    }
    
	public function index()
	{
		$this->load->view('default_view');
	}

	public function emp_presents()
	{
		$arremp_dtr = array();
		$emp = $this->Dtrkiosk_model->get_present_employees();
		foreach($emp as $e):
			if($e['inAM'] != '00:00:00' && $e['outAM'] != '00:00:00' && $e['inPM'] != '00:00:00' && $e['outPM'] != '00:00:00'):
				$e['inAM'] = date('h:i',strtotime($e['inAM']));
				$e['outAM'] = date('h:i',strtotime($e['outAM']));
				$e['inPM'] = date('h:i',strtotime($e['inPM']));
				$e['outPM'] = date('h:i',strtotime($e['outPM']));
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
