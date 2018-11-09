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
		if(isset($_GET['strversion'])):
			$version = $_GET['strversion'];
		else:
			$version = 1; #default version
		endif;
		$this->arrData['arrSalarysched'] = $this->Salary_sched_model->getDataSched($version);

		$this->arrData['stepNumber'] = $this->Salary_sched_model->getSchedHeader('stepNumber', $version); #column
		$this->arrData['sggradeNumber'] = $this->Salary_sched_model->getSchedHeader('salaryGradeNumber', $version); #row
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
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblSalarySchedVersion','Added '.$strTitle.' Salary Schedule',implode(';',$arrData),'');
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
			$this->arrData['arrSalary'] = $this->Salary_sched_model->getData();
			$this->template->load('template/template_view','libraries/salary_sched/add_sched_view',$this->arrData);	
		}
		else
		{	
			$strSalarySched = $arrPost['strSalarySched'];
			$strSG = $arrPost['strSG'];	
			$intStepNum = $arrPost['intStepNum'];	
			$intActualSalary = $arrPost['intActualSalary'];	
			if(!empty($strSalarySched))
			{	
				// check if country name or country code already exist
				if(count($this->Salary_sched_model->checkExistSalary($strSalarySched))==0)
				{
					$arrData = array(
						'version'=>$strSalarySched,
						'salaryGradeNumber'=>$strSG,
						'stepNumber'=>$intStepNum,
						'actualSalary'=>$intActualSalary,
						
					);
					$blnReturn  = $this->Salary_sched_model->add_new($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblsalarysched','Added '.$strSalarySched.' Salary Schedule',implode(';',$arrData),'');
						$this->session->set_flashdata('strMsg','Salary schedule name added successfully.');
					}
					redirect('libraries/salary_sched/');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Salary schedule name already exists.');
					$this->session->set_flashdata('strSalarySched',$strSalarySched);
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/salary_sched/');
				}
			}
		}
    }

   public function add_existing()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrSalary'] = $this->Salary_sched_model->getData();
			$this->template->load('template/template_view','libraries/salary_sched/add_existing_view',$this->arrData);	
		}
		else
		{	
			$strTitle = $arrPost['strTitle'];
			$strDesc = $arrPost['strDesc'];
			$dtmEffectivity = $arrPost['dtmEffectivity'];	
			// $strVersion = $arrPost['strVersion'];	
			if(!empty($strTitle))
			{	
				// check if country name or country code already exist
				if(count($this->Salary_sched_model->checkExist($strTitle))==0)
				{
					$arrData = array(
						'title'=>$strTitle,
						'description'=>$strDesc,
						'effectivity'=>$dtmEffectivity,
						// 'version'=>$strVersion
						
					);
					$blnReturn  = $this->Salary_sched_model->add_existing($arrData);
					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblSalarySchedVersion','Added '.$strTitle.' Salary Schedule',implode(';',$arrData),'');
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
	
	
}
