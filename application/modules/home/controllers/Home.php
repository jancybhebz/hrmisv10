<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	var $data;
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		$this->template->load('template/template_view','home/home_view');
	}
}
