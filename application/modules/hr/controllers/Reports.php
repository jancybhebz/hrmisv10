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
include('ReportCommon.php');
class Reports extends ReportCommon
{
	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/reports_model','libraries/user_account_model','hr/Hr_model'));
    }

	public function index()
	{
		$this->arrData['arrReports'] = $this->reports_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
		$this->arrData['arrEmployees'] = $this->Hr_model->getData();
		$this->template->load('template/template_view', 'hr/reports_view', $this->arrData);
	}

	
	public function generate()
    {
    	$rpt = $this->uri->segment(4);
    	$empno = $this->uri->segment(5);

    	$this->load->library('fpdf_gen');
		$this->fpdf = new FPDF();
		$this->fpdf->AliasNbPages();
		$this->fpdf->Open();

    	switch($rpt) 
    	{
    		case 'AR': 
    			//$this->load->model('AcceptanceResignation_model');
    			//$this->load->model('hr/reports_model');
    			//include('report/AcceptanceResignation_model');
				$arrData=array(
					'empno'=>$empno
				);
				//$this->acceptance_resignation_model->generate($arrData);
    		break;
    	}
	}

	public function getfields()
	{
		$rpt = $this->uri->segment(4);
		
		switch($rpt)
		{
			case 'AR':
				echo '<div class="row">
					<div class="col-sm-3 text-right">
	                	<div class="form-group">
	                		<label class="control-label">Letter Date : </label>
	                	</div>
	                </div>';
				echo '<div class="col-sm-2">'.$this->comboYear('dtLetterYear').'</div>
                <div class="col-sm-2">'.$this->comboMonth('dtLetterMonth').'</div>
                <div class="col-sm-2">'.$this->comboDay('dtLetterDay').'</div>
                </div>
                </div>';
                echo '<div class="row">
                		<div class="col-sm-3 text-right">
                			<div class="form-group">
                				<label class="control-label">Received Date : </label>
                			</div>
                		</div>';
				echo '<div class="col-sm-2">'.$this->comboYear('dtReceivedYear').'</div>
				<div class="col-sm-2">'.$this->comboMonth('dtReceivedMonth').'</div>
	            <div class="col-sm-2">'.$this->comboDay('dtReceivedDay').'</div>
				</div></div>';
                echo '<div class="row">
                		<div class="col-sm-3 text-right">
                			<div class="form-group">
                				<label class="control-label">Accepted Date : </label>
                			</div>
                		</div>';
				echo '<div class="col-sm-2">'.$this->comboYear('dtAcceptedYear').'</div>
                <div class="col-sm-2">'.$this->comboMonth('dtAcceptedMonth').'</div>
                <div class="col-sm-2">'.$this->comboDay('dtAcceptedDay').'</div>
                </div></div>';
			break;
		}
	}
   
	
}
