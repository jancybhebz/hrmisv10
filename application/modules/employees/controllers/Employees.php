<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employees extends MY_Controller {
	var $arrData;
	function __construct() {
        parent::__construct();
    }

	public function index()
	{
		//$this->template->load('template/template_view','home/home_view');
	}

	public function search()
	{
		$arrPost = $this->input->post();
		if(isset($arrPost)):
			$this->load->model(array('employees/employees_model'));
			$strSearch = $arrPost['strSearch'];
			$this->arrData['arrData'] = $this->employees_model->getData('',$strSearch);
		endif;
		$this->template->load('template/template_view','employees/search_view', $this->arrData);
	}
}
