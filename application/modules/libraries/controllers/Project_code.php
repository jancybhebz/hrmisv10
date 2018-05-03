<?php 
/** 
Purpose of file:    Controller for Project Code Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project_code extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/project_code_model'));
    }

	public function index()
	{
		$this->arrData['arrProject'] = $this->project_code_model->getData();
		$this->template->load('template/template_view', 'libraries/project_code/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->template->load('template/template_view','libraries/project_code/add_view',$this->arrData);	
		}
		else
		{	
			$strProjectCode = $arrPost['strProjectCode'];
			$strProjectDescription = $arrPost['strProjectDescription'];
			$intProjectOrder = $arrPost['intProjectOrder'];
			if(!empty($strProjectCode) && !empty($strProjectDescription) && !empty($intProjectOrder))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->project_code_model->checkExist($strProjectCode, $strProjectDescription))==0)
				{
					$arrData = array(
						'projectCode'=>$strProjectCode,
						'projectDesc'=>$strProjectDescription,
						'projectOrder'=>$intProjectOrder
					);
					$blnReturn  = $this->project_code_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblProject','Added '.$strProjectDescription.' Project_code',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strMsg','Project code added successfully.');
					}
					redirect('libraries/project_code');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Project code and/or Project description already exists.');
					$this->session->set_flashdata('strProjectCode',$strProjectCode);
					$this->session->set_flashdata('strProjectDescription',$strProjectDescription);
					$this->session->set_flashdata('intProjectOrder',$intProjectOrder);					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/project_code/add');
				}
			}
		}
    	
    	
    }

	public function edit()
	{
		$arrPost = $this->input->post();
		if(empty($arrPost))
		{
			$intPositionId = urldecode($this->uri->segment(4));
			$this->arrData['arrProject']=$this->project_code_model->getData($intPositionId);
			$this->template->load('template/template_view','libraries/project_code/edit_view', $this->arrData);
		}
		else
		{
			// $intPositionId = $arrPost['intPositionId'];
			$strProjectCode = $arrPost['strProjectCode'];
			$strProjectDescription = $arrPost['strProjectDescription'];
			$intProjectOder = $arrPost['intProjectOder'];
			if(!empty($strProjectCode) AND !empty($strProjectDescription)) 
			{
				$arrData = array(
					'projectCode'=>$strProjectCode,
					'projectDesc'=>$strProjectDescription,
					'projectOrder'=>$intProjectOder
				);
				$blnReturn = $this->project_code_model->save($arrData, $intProjectOder);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblproject','Edited '.$strProjectDescription.' Project_code',implode(';',$arrData),'');
					
					$this->session->set_flashdata('strMsg','Project saved successfully.');
				}
				redirect('libraries/project_code');
			}
		}
		
	}
	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$arrPost = $this->input->post();
		$intProjectOder = $this->uri->segment(4);
		if(empty($arrPost))
		{
			$this->arrData['arrData'] = $this->project_code_model->getData($intProjectOder);
			$this->template->load('template/template_view','libraries/project_code/delete_view',$this->arrData);
		}
		else
		{
			$intProjectOder = $arrPost['intProjectOder'];
			//add condition for checking dependencies from other tables
			if(!empty($intProjectOder))
			{
				$arrProject = $this->project_code_model->getData($intProjectOder);
				$strProjectDescription = $arrProject[0]['projectDesc'];	
				$blnReturn = $this->project_code_model->delete($intProjectOder);
				if(count($blnReturn)>0)
				{
					log_action($this->session->userdata('sessEmpNo'),'HR Module','tblproject','Deleted '.$strProjectDescription.' Project_code',implode(';',$arrProject[0]),'');
	
					$this->session->set_flashdata('strMsg','Project code deleted successfully.');
				}
				redirect('libraries/project_code');
			}
		}
		
	}
}
