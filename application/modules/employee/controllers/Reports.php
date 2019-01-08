<?php 
/** 
Purpose of file:    Controller for Reports
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports extends MY_Controller {

	var $arrData;

	function __construct() 
	{
        parent::__construct();
        $this->load->model(array('employee/reports_model'));
    }

	public function index()
	{
		// $this->arrData['arrAppointStatuses'] = $this->appointment_status_model->getData();
		$this->template->load('template/template_view', 'employee/reports/reports_view', $this->arrData);
	}
	
	public function submit()
    {
    	$arrPost = $this->input->post();
		if(!empty($arrPost))
		{
			$strReporttype=$arrPost['strReporttype'];
			$strRemittype=$arrPost['strRemittype'];
			$month=$arrPost['month'];
			$date=$arrPost['date'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
		
			if(!empty($strReporttype))
			{	
				if( count($this->reports_model->checkExist($strReporttype))==0 )
				{
					$arrData = array(
						'requestDetails'=>$strReporttype.';'.$strRemittype.';'.$month.';'.$date,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						/*'requestDate'=>$dtmOBrequestdate,*/
						// 'requestStatus'=>
					);
					$blnReturn  = $this->reports_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblemprequest','Added '.$strReporttype.' Reports',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Request has been submitted.');
					}
					redirect('employee/reports');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Request already exists.');
					//$this->session->set_flashdata('strOBtype',$strOBtype);
					redirect('employee/reports');
				}
			}
		}
    	$this->template->load('template/template_view','employee/reports/reports_view',$this->arrData);
    }
}
