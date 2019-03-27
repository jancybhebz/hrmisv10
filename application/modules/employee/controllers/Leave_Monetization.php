<?php 
/** 
Purpose of file:    Controller for Leave_Monetization
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_Monetization extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/leave_monetization_model'));
    }

	public function index()
	{
		$this->arrData['arrData'] = $this->leave_monetization_model->getData();
		$this->template->load('template/template_view', 'employee/leave_monetization/leave_monetization_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$ProjVL=$arrPost['ProjVL'];
			$ProjSL=$arrPost['ProjSL'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			if(!empty($ProjVL) && !empty($ProjSL))
			{	
				if( count($this->leave_monetization_model->checkExist($ProjVL, $ProjSL))==0 )
				{
					$arrData = array(
						'requestDetails'=>$ProjVL.';'.$ProjSL,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						// 'requestStatus'=>
					);
					$blnReturn  = $this->leave_monetization_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpLeaveMonetization','Added '.$ProjVL.' Leave Monetization',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/leave_monetization');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/leave_monetization');
				}
			}
		}
    	$this->template->load('template/template_view','employee/leave_monetization/leave_monetization_view',$this->arrData);
    }
}
