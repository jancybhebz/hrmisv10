<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	var $data;
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$userlevel = $this->session->userdata('sessUserLevel');
		if($userlevel == 2):
			redirect('finance/notifications/npayroll');
		endif;

		if(in_array($userlevel, array(3,4,5))):
			redirect('hr/profile/'.$empid);
		endif;
		$this->template->load('template/template_view','home/home_view');
	}

	public function switch_hr_emp()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 5;
		redirect('hr/profile/'.$empid);
	}

	public function switch_emp_hr()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 1;
		redirect('home');
	}

	public function switch_fin_emp()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 5;
		redirect('hr/profile/'.$empid);
	}

	public function switch_emp_fin()
	{
		$empid = $this->session->userdata('sessEmpNo');
		$_SESSION['sessUserLevel'] = 2;
		redirect('home');
	}

	
}
