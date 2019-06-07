<?php 
/** 
Purpose of file:    Controller for Compensatory leave
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compensatory_leave extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('employee/compensatory_leave_model','hr/hr_model'));
    }

	public function index()
	{
		// $this->arrData['arrOB'] = $this->dtr_update_model->getData();
			$this->arrData['arrEmployees'] = $this->hr_model->getData();
		$this->template->load('template/template_view', 'employee/compensatory_leave/compensatory_leave_view', $this->arrData);
	}
	
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$dtmComLeave=$arrPost['dtmComLeave'];
			$dtmMorningIn=$arrPost['dtmMorningIn'];
			$dtmMorningOut=$arrPost['dtmMorningOut'];
			$dtmAfternoonIn=$arrPost['dtmAfternoonIn'];
			$dtmAfternoonOut=$arrPost['dtmAfternoonOut'];
			$strPurpose=$arrPost['strPurpose'];
			$strRecommend=$arrPost['strRecommend'];
			$strApproval=$arrPost['strApproval'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			if(!empty($dtmComLeave))
			{	
				if( count($this->compensatory_leave_model->checkExist($dtmComLeave))==0 )
				{
					$arrData = array(
						'requestDetails'=>$dtmComLeave.';'.$dtmMorningIn.';'.$dtmMorningOut.';'.$dtmAfternoonIn.';'.$dtmAfternoonOut.';'.$strPurpose,
						'signatory'=>$strRecommend.';'.$strApproval,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
					
					);
					$blnReturn  = $this->compensatory_leave_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpRequest','Added '.$dtmComLeave.' Official Business',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Your Request has been submitted.');
					}
					redirect('employee/compensatory_leave');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/compensatory_leave');
				}
			}
		}
    	$this->template->load('template/template_view','employee/compensatory_leave/compensatory_leave_view',$this->arrData);
    }
}
