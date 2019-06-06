<?php 
/** 
Purpose of file:    Controller for Travel Order
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_order extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/travel_order_model'));
    }

	public function index()
	{
		// $this->arrData['arrAppointStatuses'] = $this->appointment_status_model->getData();
		$this->template->load('template/template_view', 'employee/travel_order/travel_order_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strDestination=$arrPost['strDestination'];
			$dtmTOdatefrom=$arrPost['dtmTOdatefrom'];
			$dtmTOdateto=$arrPost['dtmTOdateto'];
			$strPurpose=$arrPost['strPurpose'];
			$strMeal=$arrPost['strMeal'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			if(!empty($strDestination) && !empty($dtmTOdatefrom))
			{	
				if( count($this->travel_order_model->checkExist($strDestination, $dtmTOdatefrom))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strDestination.';'.$dtmTOdatefrom.';'.$dtmTOdateto.';'.$strPurpose.';'.$strMeal,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						// 'requestStatus'=>
					);
					$blnReturn  = $this->travel_order_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDestination.' Travel Order',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Your Request has been submitted.');
					}
					redirect('employee/travel_order');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/travel_order');
				}
			}
		}
    	$this->template->load('template/template_view','employee/travel_order/travel_order_view',$this->arrData);
    }
}
