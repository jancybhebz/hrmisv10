<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends MY_Controller {
	var $arrData;
	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/User_account_model'));
    }

	public function index()
	{
		$fingerprint = isset($_GET['fingerprint']) ? $_GET['fingerprint'] : '';
		if($fingerprint=='!7D$0@9'):
			echo json_encode($this->User_account_model->getemployee_forapi());
		else:
			echo json_encode('');
		endif;
	}
	
}
