<?php 
/** 
Purpose of file:    Controller for Compensatory Time Off
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
			$this->arrData['arrLB'] = $this->compensatory_leave_model->getOffsetBal();
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
						$this->session->set_flashdata('strSuccessMsg','Request has been submitted.');
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

    public function certify_offset()
    {
    	$this->load->model(array('hr/Attendance_summary_model'));
    	$arrPost = $this->input->post();

    	foreach(json_decode($arrPost['txtot_id'],1) as $cto):
    		$dtr = $this->Attendance_summary_model->getData($cto);

    		$arrData = array();
    		if($dtr['OT'] == 1):
    			if(!in_array($cto,$arrPost['certified_ot'])):
    				$arrData = array('OT' => 0, 'name' => $dtr['name'].';'.$_SESSION['sessName'], 'ip' => $dtr['ip'].';'.$this->input->ip_address(), 'editdate' => $dtr['editdate'].';'.date('Y-m-d H:i:s A'));
    			endif;
    		else:
				if(in_array($cto,$arrPost['certified_ot'])):
					$arrData = array('OT' => 1, 'name' => $dtr['name'].';'.$_SESSION['sessName'], 'ip' => $dtr['ip'].';'.$this->input->ip_address(), 'editdate' => $dtr['editdate'].';'.date('Y-m-d H:i:s A'));
				endif;    			
    		endif;
    		$this->Attendance_summary_model->edit_dtr($arrData, $cto);
    	endforeach;
    	
    	$this->session->set_flashdata('strSuccessMsg','Certify offset successfully saved.');
    	redirect('hr/attendance_summary/dtr/'.$this->uri->segment(4).'?datefrom='.currdfrom().'&dateto='.currdto());
    }


}
