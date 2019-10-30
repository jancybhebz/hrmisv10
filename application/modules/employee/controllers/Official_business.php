<?php 
/** 
Purpose of file:    Controller for Official Business
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
defined('BASEPATH') OR exit('No direct script access allowed');

class Official_business extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/official_business_model'));
    }

	public function index()
	{
		$this->template->load('template/template_view', 'employee/official_business/official_business_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$strOBtype		  = $arrPost['strOBtype'];
			$dtmOBrequestdate = $arrPost['dtmOBrequestdate'];
			$dtmOBdatefrom	  = $arrPost['dtmOBdatefrom'];
			$dtmOBdateto	  = $arrPost['dtmOBdateto'];
			$dtmTimeFrom	  = $arrPost['dtmTimeFrom'];
			$dtmTimeTo		  = $arrPost['dtmTimeTo'];
			$strDestination	  = $arrPost['strDestination'];
			$strMeal		  = isset($arrPost['strMeal']) ? $arrPost['strMeal'] : '';
			$strPurpose		  = $arrPost['strPurpose'];
			$strStatus		  = $arrPost['strStatus'];
			$strCode		  = $arrPost['strCode'];

			if(!empty($strOBtype)):
				if(count($this->official_business_model->checkExist($strOBtype, $dtmOBrequestdate))==0):
					$arrData = array(
							'requestDetails' => $strOBtype.';'.$dtmOBdatefrom.';'.$dtmOBdateto.';'.$dtmTimeFrom.';'.$dtmTimeTo.';'.$strDestination.';'.$strMeal.';'.$strPurpose,
							'requestDate'	 => $dtmOBrequestdate,
							'requestStatus'  => $strStatus,
							'requestCode'	 => $strCode,
							'empNumber'		 => $_SESSION['sessEmpNo']);
					$blnReturn  = $this->official_business_model->submit($arrData);

					if($_FILES['userfile']['name'] != ''):
						$strEmpNum = $_SESSION['sessEmpNo'];

						$config['upload_path']   = 'uploads/employees/attachments/officialbusiness/'.$strEmpNum.'/';
						$config['allowed_types'] = 'pdf';
						$config['file_name'] = $strEmpNum."_".date('YmdHis').".pdf"; 
						$config['overwrite'] = TRUE;

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
							
						if(!is_dir($config['upload_path'])):
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
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strOBtype.' Official Business',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Your request has been submitted.');
					endif;
					redirect('employee/official_business');

				else:	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					redirect('employee/official_business');
				endif;
			endif;

		endif;

    	$this->template->load('template/template_view','employee/official_business/official_business_view',$this->arrData);
    }	

}
