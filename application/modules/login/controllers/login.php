<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$this->load->model('login_model');
			print_r($this->login_model->authenticate($arrPost['strUsername'],$arrPost['strPassword']));
			//print_r($arrPost);
		else:
			$this->load->view('login_view');
		endif;
	}
}
