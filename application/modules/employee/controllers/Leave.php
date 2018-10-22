<?php 
/** 
Purpose of file:    Controller for Leave
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/leave_model', 'libraries/user_account_model','hr/hr_model'));
    }

	public function index()
	{
		$this->arrData['arrUser'] = $this->user_account_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
		$this->arrData['arrEmployees'] = $this->hr_model->getData();
		$this->template->load('template/template_view', 'employee/leave/leave_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strLeavetype=$arrPost['strLeavetype'];
			$dtmLeavefrom=$arrPost['dtmLeavefrom'];

			if(!empty($strLeavetype))
			{	
				if( count($this->leave_model->checkExist($dtmLeavefrom))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strLeavetype
						// 'requestDate'=>$dtmLeavefrom,
						// 'requestStatus'=>
					);
					$blnReturn  = $this->leave_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strLeavetype.' Leave',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave/leave_view',$this->arrData);
    }
}
