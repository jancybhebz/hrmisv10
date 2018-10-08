<?php 
/** 
Purpose of file:    Controller for Salary Schedule Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Salary_sched extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model('Salary_sched_model');
    }

	public function index()
	{
		$this->arrData['arrSalary'] = $this->Salary_sched_model->getData();
		$this->template->load('template/template_view', 'libraries/salary_sched/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/salary_sched/add_view',$this->arrData);	
		}
		else
		{	
			$strTitle = $arrPost['strTitle'];
			$strDesc = $arrPost['strDesc'];
			$dtmEffectivity = $arrPost['dtmEffectivity'];	
			if(!empty($strTitle))
			{	
				// check if country name or country code already exist
				if(count($this->Salary_sched_model->checkExist($strTitle))==0)
				{
					$arrData = array(
						'title'=>$strTitle,
						'description'=>$strDesc,
						'effectivity'=>$dtmEffectivity
						
					);
					$blnReturn  = $this->Salary_sched_model->add($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblsalaryschedversion','Added '.$strTitle.' Salary Schedule',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Salary schedule name added successfully.');
					}
					redirect('libraries/salary_sched/add');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Salary schedule name already exists.');
					$this->session->set_flashdata('strTitle',$strTitle);
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/salary_sched/add');
				}
			}
		}
    }

    public function add_sched()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/salary_sched/add_sched_view',$this->arrData);	
		}
		else
		{	
			$strSalarySched = $arrPost['strSalarySched'];
			$strSG = $arrPost['strSG'];	
			$intStepNum = $arrPost['intStepNum'];	
			$intActualSalary = $arrPost['intActualSalary'];	
			if(!empty($strNewSalarySched))
			{	
				// check if country name or country code already exist
				if(count($this->Salary_sched_model->checkExist($strNewSalarySched))==0)
				{
					$arrData = array(
						'title'=>$strNewSalarySched,
						
					);
					$blnReturn  = $this->Salary_sched_model->add($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblsalaryschedversion','Added '.$strNewSalarySched.' Salary Schedule',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Salary schedule name added successfully.');
					}
					redirect('libraries/salary_sched/');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Salary schedule name already exists.');
					$this->session->set_flashdata('strNewSalarySched',$strNewSalarySched);
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/salary_sched/add');
				}
			}
		}
    }

	
	
}
