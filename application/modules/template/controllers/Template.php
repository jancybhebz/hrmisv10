<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Controller {
	var $data;
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->load->view('template_view');
	}
}
