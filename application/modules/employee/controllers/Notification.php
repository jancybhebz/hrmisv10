<?php 
/** 
Purpose of file:    Controller for Notification
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Notification extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/notification_model'));
    }

	public function index()
	{
		$this->arrData['arrRequest'] = $this->notification_model->getData();
		$this->template->load('template/template_view', 'employee/notification/notification_view', $this->arrData);
		
	}
	
		
	
}
