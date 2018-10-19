<?php 
/** 
Purpose of file:    Controller for DTR update
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DTR_update extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/dtr_update_model'));
    }

	public function index()
	{
		// $this->arrData['arrOB'] = $this->dtr_update_model->getData();
		$this->template->load('template/template_view', 'employee/dtr_update/dtr_update_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$dtmDTRupdate=$arrPost['dtmDTRupdate'];
			$dtmMorningIn=$arrPost['dtmMorningIn'];
			$dtmMorningOut=$arrPost['dtmMorningOut'];
			$dtmAfternoonIn=$arrPost['dtmAfternoonIn'];
			$dtmAfternoonOut=$arrPost['dtmAfternoonOut'];
			$dtmOvertimeIn=$arrPost['dtmOvertimeIn'];
			$dtmOvertimeOut=$arrPost['dtmOvertimeOut'];
			$strReason=$arrPost['strReason'];
			if(!empty($dtmDTRupdate))
			{	
				if( count($this->dtr_update_model->checkExist($dtmDTRupdate))==0 )
				{
					$arrData = array(
						'requestDetails'=>$dtmDTRupdate.';'.$dtmMorningIn.';'.$dtmMorningOut.';'.$dtmAfternoonIn.';'.$dtmAfternoonOut.';'.$dtmOvertimeIn.';'.$dtmOvertimeOut.';'.$strReason,
						// 'requestDate'=>$dtmOBrequestdate,
						// 'requestStatus'=>
					);
					$blnReturn  = $this->dtr_update_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$dtmDTRupdate.' Official Business',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/dtr_update');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/dtr_update');
				}
			}
		}
    	$this->template->load('template/template_view','employee/dtr_update/dtr_update_view',$this->arrData);
    }
}
