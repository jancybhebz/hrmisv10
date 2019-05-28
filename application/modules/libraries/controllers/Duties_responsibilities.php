<?php 
/** 
Purpose of file:    Controller for Duties and Responsibilities Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Duties_responsibilities extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/duties_responsibilities_model','libraries/position_model'));
    }

	public function index()
	{
		$this->arrData['arrDuties'] = $this->duties_responsibilities_model->getData();
		$this->arrData['arrPosition']=$this->position_model->getData(); 
		$this->template->load('template/template_view', 'libraries/duties_responsibilities/list_view', $this->arrData);
	}
	
	public function add()
    {
    	$arrPost = $this->input->post();
		if(empty($arrPost))
		{	
			$this->arrData['arrPosition']=$this->position_model->getData(); 
			$this->arrData['arrDuties'] = $this->duties_responsibilities_model->getData();
			$this->template->load('template/template_view','libraries/duties_responsibilities/add_view',$this->arrData);	
		}
		else
		{	
			$strPosition = $arrPost['strPosition'];
			$intPercentWork = $arrPost['intPercentWork'];
			$strDuties = $arrPost['strDuties'];
			if(!empty($strPosition) && !empty($intPercentWork) && !empty($strDuties))
			{	
				// check if exam code and/or exam desc already exist
				if(count($this->duties_responsibilities_model->checkExist($strDuties))==0)
				{
					$arrData = array(
						'positionCode'=>$strPosition,
						'percentWork'=>$intPercentWork,
						'duties'=>$strDuties
					);
					$blnReturn  = $this->duties_responsibilities_model->add($arrData);

					if(count($blnReturn)>0)
					{	
						log_action($this->session->userdata('sessEmpNo'),'HR Module','tblduties','Added '.$strDuties.' Duties_responsibilities',implode(';',$arrData),'');
					
						$this->session->set_flashdata('strSuccessMsg','Duties added successfully.');
					}
					redirect('libraries/duties_responsibilities');
				}
				else
				{	
					$this->session->set_flashdata('strErrorMsg','Duties already exists.');
					$this->session->set_flashdata('strPosition',$strPosition);
					$this->session->set_flashdata('intPercentWork',$intPercentWork);
					$this->session->set_flashdata('strDuties',$strDuties);	
					redirect('libraries/duties_responsibilities/add');
				}
			}
		}
    	
    	
    }

   
}
