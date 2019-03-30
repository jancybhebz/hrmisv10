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
class Reports extends MY_Controller
{
	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('hr/reports_model','libraries/user_account_model','hr/Hr_model'));
        $this->load->helper('report_helper');
    }

	public function index()
	{
		$this->arrData['arrReports'] = $this->reports_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getData();
		$this->arrData['arrUser'] = $this->user_account_model->getEmpDetails();
		$this->arrData['arrEmployees'] = $this->Hr_model->getData();
		$this->template->load('template/template_view', 'hr/reports_view', $this->arrData);
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
				echo '<div class="col-sm-2">'.comboYear('dtLetterYear').'</div>
                <div class="col-sm-2">'.comboMonth('dtLetterMonth').'</div>
                <div class="col-sm-2">'.comboDay('dtLetterDay').'</div>
                </div>
                </div>';
                echo '<div class="row">
                		<div class="col-sm-3 text-right">
                			<div class="form-group">
                				<label class="control-label">Received Date : </label>
                			</div>
                		</div>';
				echo '<div class="col-sm-2">'.comboYear('dtReceivedYear').'</div>
				<div class="col-sm-2">'.comboMonth('dtReceivedMonth').'</div>
	            <div class="col-sm-2">'.comboDay('dtReceivedDay').'</div>
				</div></div>';
                echo '<div class="row">
                		<div class="col-sm-3 text-right">
                			<div class="form-group">
                				<label class="control-label">Accepted Date : </label>
                			</div>
                		</div>';
				echo '<div class="col-sm-2">'.comboYear('dtAcceptedYear').'</div>
                <div class="col-sm-2">'.comboMonth('dtAcceptedMonth').'</div>
                <div class="col-sm-2">'.comboDay('dtAcceptedDay').'</div>
                </div></div>';
                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
			break;
			case 'ALC':
				echo '<div class="row">
						<div class="col-sm-3 text-right">
		                	<div class="form-group">
		                		<label class="control-label">Month: </label>
		                	</div>
		                </div>
		                <div class="col-sm-3">
		                	<div class="form-group">'.comboMonth('dtMonth').'</div>
		                </div>
	                </div>
	                <div class="row">
		                <div class="col-sm-3 text-right">
		                	<div class="form-group">
		                		<label class="control-label">Year: </label>
		                	</div>
		                </div>
		                <div class="col-sm-3">
		                	<div class="form-group">'.comboYear('dtYear').'</div>
		                </div>
	                </div>';
	                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Noted : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatoryNoted').'</div>
	        			</div>
                	</div>
                </div>';
			break;
			case 'ADR':
				echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
			break;
			case 'CDR':
				echo '<div class="row">
					<div class="col-sm-3 text-right">
	                	<div class="form-group">
	                		<label class="control-label"> Date : </label>
	                	</div>
	                </div>';
				echo '<div class="col-sm-2">'.comboYear('intYear').'</div>
                <div class="col-sm-2">'.comboMonth('intMonth').'</div>
                <div class="col-sm-2">'.comboDay('intDay').'</div>
                </div>
                </div>';
				echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'CEC':
				echo '<div class="row">
					<div class="col-sm-3 text-right">
	                	<div class="form-group">
	                		<label class="control-label"> Payroll Date : </label>
	                	</div>
	                </div>';
				echo '<div class="col-sm-2">'.comboYear('intPayrollYear').'</div>
                <div class="col-sm-2">'.comboMonth('intPayrollMonth').'</div>
                </div>
                </div>';
				echo '<div class="row">
					<div class="col-sm-3 text-right">
	                	<div class="form-group">
	                		<label class="control-label"> Issued Date : </label>
	                	</div>
	                </div>';
				echo '<div class="col-sm-2">'.comboYear('intYear').'</div>
                <div class="col-sm-2">'.comboMonth('intMonth').'</div>
                <div class="col-sm-2">'.comboDay('intDay').'</div>
                </div>
                </div>';
				echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'CNAC':
				echo '<div class="row">
					<div class="col-sm-3 text-right">
	                	<div class="form-group">
	                		<label class="control-label"> Issued Date : </label>
	                	</div>
	                </div>';
				echo '<div class="col-sm-2">'.comboYear('intYear').'</div>
                <div class="col-sm-2">'.comboMonth('intMonth').'</div>
                <div class="col-sm-2">'.comboDay('intDay').'</div>
                </div>
                </div>';
				echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'CNACLP':
				echo '<div class="row">
					<div class="col-sm-3 text-right">
	                	<div class="form-group">
	                		<label class="control-label"> Issued Date : </label>
	                	</div>
	                </div>';
				echo '<div class="col-sm-2">'.comboYear('intYear').'</div>
                <div class="col-sm-2">'.comboMonth('intMonth').'</div>
                <div class="col-sm-2">'.comboDay('intDay').'</div>
                </div>
                </div>';
				echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Signatory : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'CNACL':
				
				
				echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Certified Correct : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'LEA':
            	echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Appointment Status : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboAppStatus('strAppStatus').'</div>
	        			</div>
                	</div>
                </div>';
                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Certified Correct : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'LEAGE':
            	echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Appointment Status : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboAppStatus('strAppStatus').'</div>
	        			</div>
                	</div>
                </div>';
                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Certified Correct : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'LEDH':
            	echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Appointment Status : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboAppStatus('strAppStatus').'</div>
	        			</div>
                	</div>
                </div>';
                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Certified Correct : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;
            case 'LEDB':
            	echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Appointment Status : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboAppStatus('strAppStatus').'</div>
	        			</div>
                	</div>
                </div>';
                echo '<div class="row">
                	<div class="col-sm-3 text-right">
	        			<div class="form-group">
	        				<label class="control-label">Certified Correct : </label>
	        			</div>
	        			</div>
	        			<div class="form-group">
	        				<div class="col-sm-6">'.comboSignatory('intSignatory').'</div>
	        			</div>
                	</div>
                </div>';
            break;

		}
	}
   
	
}
