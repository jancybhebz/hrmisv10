<?php 
/** 
Purpose of file:    Controller for Travel Order
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
defined('BASEPATH') OR exit('No direct script access allowed');

class Travel_order extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/travel_order_model'));
    }

	public function index()
	{
		$this->template->load('template/template_view', 'employee/travel_order/travel_order_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost)):
		
			$strDestination	= $arrPost['strDestination'];
			$dtmTOdatefrom	= $arrPost['dtmTOdatefrom'];
			$dtmTOdateto	= $arrPost['dtmTOdateto'];
			$strPurpose		= $arrPost['strPurpose'];
			$strMeal		= $arrPost['strMeal'];
			$strStatus		= $arrPost['strStatus'];
			$strCode		= $arrPost['strCode'];
			$str_details	= $strDestination.';'.$dtmTOdatefrom.';'.$dtmTOdateto.';'.$strPurpose.';'.$strMeal;

			if(!empty($strDestination) && !empty($dtmTOdatefrom)):	
				if(count($this->travel_order_model->checkExist($str_details))==0):
					$arrData = array(
							'requestDetails'=>$str_details,
							'requestDate'=>date('Y-m-d'),
							'requestStatus'=>$strStatus,
							'requestCode'=>$strCode,
							'empNumber'=>$_SESSION['sessEmpNo']);
					$blnReturn  = $this->travel_order_model->submit($arrData);

					if($_FILES['userfile']['name'] != ''):

						$strEmpNum 				 = $_SESSION['sessEmpNo'];
						$config['upload_path']   = 'uploads/employees/attachments/travelorder/'.$strEmpNum.'/';
						$config['allowed_types'] = 'pdf';

						$config['file_name'] = $strEmpNum."_".date('YmdHis').".pdf"; 
						$config['overwrite'] = TRUE;

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
								
						if (!is_dir($config['upload_path'])):
							mkdir($config['upload_path'], 0777, TRUE);
						endif;

						if(!$this->upload->do_upload('userfile')):
							$error = array('error' => $this->upload->display_errors());
							$this->session->set_flashdata('strErrorMsg','Please try again!');
						else:
							$data = $this->upload->data();
							$this->session->set_flashdata('strSuccessMsg','Upload successfully saved.');
						endif;
					endif;

					if(count($blnReturn)>0):
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strDestination.' Travel Order',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
					endif;
					redirect('employee/travel_order');
				else:	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/travel_order');
				endif;
			endif;

		endif;
    	$this->template->load('template/template_view','employee/travel_order/travel_order_view',$this->arrData);
    }


}
