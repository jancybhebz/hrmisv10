<?php 
/** 
Purpose of file:    Controller for Official Business
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Official_business extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/official_business_model'));
    }

	public function index()
	{
		// $this->arrData['arrOB'] = $this->official_business_model->getData();
		$this->template->load('template/template_view', 'employee/official_business/official_business_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			echo '<pre>';

			$strOBtype=$arrPost['strOBtype'];
			$dtmOBrequestdate=$arrPost['dtmOBrequestdate'];
			$dtmOBdatefrom=$arrPost['dtmOBdatefrom'];
			$dtmOBdateto=$arrPost['dtmOBdateto'];
			$dtmTimeFrom=$arrPost['dtmTimeFrom'];
			$dtmTimeTo=$arrPost['dtmTimeTo'];
			$strDestination=$arrPost['strDestination'];
			$strMeal=isset($arrPost['strMeal']) ? $arrPost['strMeal'] : '';
			$strPurpose=$arrPost['strPurpose'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			if(!empty($strOBtype))
			{	
				if( count($this->official_business_model->checkExist($strOBtype, $dtmOBrequestdate))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strOBtype.';'.$dtmOBdatefrom.';'.$dtmOBdateto.';'.$dtmTimeFrom.';'.$dtmTimeTo.';'.$strDestination.';'.$strMeal.';'.$strPurpose,
						'requestDate'=>$dtmOBrequestdate,
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						// 'requestStatus'=>
					);
					$blnReturn  = $this->official_business_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$strOBtype.' Official Business',implode(';',$arrData),'');
						$this->session->set_flashdata('strSuccessMsg','Your request has been submitted.');
					}
					redirect('employee/official_business');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/official_business');
				}
			}
		}
    	$this->template->load('template/template_view','employee/official_business/official_business_view',$this->arrData);
    }	

    public function uploadOBDocs()
	{
		$arrPost = $this->input->post();
		$strEmpNum = $_SESSION['sessEmpNo'];
		$config['upload_path']          = 'uploads/employees/attachments/officialbusiness/'.$strEmpNum.'/';
        $config['allowed_types']        = 'pdf';
        $path = $_FILES['image']['userfile'];
		// $newName = "<Whatever name>".".".pathinfo($path, PATHINFO_EXTENSION); 
		$config['file_name'] = $strEmpNum.".pdf"; 
		$config['overwrite'] = TRUE;
		// print_r($config);
		// exit(1);

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		
		if (!is_dir($config['upload_path'])) {
    		mkdir($config['upload_path'], 0777, TRUE);
			}

		if ( ! $this->upload->do_upload('userfile'))
		{
			// echo $this->upload->display_errors();
			$error = array('error' => $this->upload->display_errors());
			// print_r($error);
			// exit(1);
			$this->session->set_flashdata('strErrorMsg','Please try again!');
		}
		else
		{
			$data = $this->upload->data();
			$this->session->set_flashdata('strSuccessMsg','Upload successfully saved.');
			//rename($data['full_path'],$data['file_path'].$idTraining.$data['file_ext']);
			// print_r($data);
			// exit(1);
			
		}
		// print_r($error);
		// print_r($data);
		// exit(1);
		redirect('employee/travel_order');
		
	}

}
