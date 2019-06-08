<?php 
/** 
Purpose of file:    Controller for Leave_monetization
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leave_monetization extends MY_Controller {

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
			$MonetizedVL=$arrPost['MonetizedVL'];
			$MonetizedSL=$arrPost['MonetizedSL'];
			$strStatus=$arrPost['strStatus'];
			$strCode=$arrPost['strCode'];
			$commutation=$arrPost['commutation'];
			$strReason=$arrPost['strReason'];
			if(!empty($MonetizedVL) && !empty($MonetizedSL))
			{	
				if( count($this->leave_monetization_model->checkExist($strCode))==0 )
				{
					$arrData = array(
						'requestDetails'=>$MonetizedVL.';'.$MonetizedSL.';'.$commutation.';'.$strReason,
						'requestDate'=>date('Y-m-d'),
						'requestStatus'=>$strStatus,
						'requestCode'=>$strCode,
						'empNumber'=>$_SESSION['sessEmpNo']
						// 'requestStatus'=>
					);
					$blnReturn  = $this->leave_monetization_model->submit($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblEmpLeaveMonetization','Added '.$strCode.' Leave Monetization',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Your Request has been submitted.');
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

    # HR Leave Monetization
    public function monetized_leave()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(4);
    	if(!empty($arrPost)):
    		$arrData=array(
    			'empNumber' 	=> $empid,
    			'vlMonetize'	=> $arrPost['txtvl'],
    			'slMonetize'	=> $arrPost['txtsl'],
    			'processMonth'	=> date('m'),
    			'processYear' 	=> date('Y'),
    			'monetizeMonth'	=> $arrPost['txtperiodmo'],
    			'monetizeYear' 	=> $arrPost['txtperiodyr'],
    			'monetizeAmount'=> 0,
    			'processBy'		=> $_SESSION['sessName'],
    			'ip'	    	=> $this->input->ip_address(),
    			'processDate'	=> date('Y-m-d h:i:s A'));

    		$this->leave_monetization_model->addemp_monetized($arrData);
    		$this->session->set_flashdata('strSuccessMsg','Monetized Leave added successfully.');
    		redirect('hr/attendance_summary/leave_monetization/'.$empid.'?month='.date('m').'&yr='.date('Y'));
    	endif;
    }

	# HR Leave Monetization
    public function monetized_rollback()
    {
    	$arrPost = $this->input->post();
    	$empid = $this->uri->segment(4);
    	if(!empty($arrPost)):
    		$this->leave_monetization_model->delete_monetized($arrPost['txt_monid']);
    		$this->session->set_flashdata('strSuccessMsg','Monetized Leave rollback successfully.');
    		redirect('hr/attendance_summary/leave_monetization/'.$empid.'?month='.date('m').'&yr='.date('Y'));
    	endif;
    }

    


}
