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
			$strOBtype=$arrPost['strOBtype'];
			$dtmOBrequestdate=$arrPost['dtmOBrequestdate'];
			$dtmOBdatefrom=$arrPost['dtmOBdatefrom'];
			$dtmOBdateto=$arrPost['dtmOBdateto'];
			$dtmTimeFrom=$arrPost['dtmTimeFrom'];
			$dtmTimeTo=$arrPost['dtmTimeTo'];
			$strDestination=$arrPost['strDestination'];
			$strMeal=$arrPost['strMeal'];
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

 //    public function request_type()
	// {
	// 	$intReqId=$this->uri->segment(3);
	// 	// $arrGet=$this->input->get();
	// 	// $strCode=$arrGet['rpt'];
	// 	$strCode="official_business";
		
	// 	switch($strCode)
	// 	{
	// 		case "official_business":
	//         	echo "OB";
	//         	break;
	// 		case "travel_order":
	//         	echo "TO";
	//         	break;
	//         case "leave":
	//         	echo "Leave";
	//         	break;
	//         case "PDS_update":
	//         	echo "PDS";
	//         	break;
	//         case "DTR_update":
	//         	echo "DTR";
	//         	break;
			
	// 	}
	// }

	



}
