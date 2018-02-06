<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Country extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();
        $this->load->model(array('libraries/country_model'));
    }

	// public function index()
	// {
	// 	// $this->load->model(array('libraries/courses_model'));
	// 	// $this->arrData['arrCourses']=$this->courses_model->getData();
	// 	$this->template->load('template/template_view','libraries/country_view',$this->arrData);
	// }

	public function index()
	{
		
		$this->arrData['arrCourses']=$this->courses_model->getData();
		$this->template->load('template/template_view','libraries/country/country_view',$this->arrData);
	}
	
	public function add()
	{
		if(!empty($arrPost)):
			//print_r($arrPost);
			$strCode=$arrPost['strCode'];
			$strDescription=$arrPost['strDescription'];
			if(!empty($strCode) && !empty($strDescription)):
				//$this->load->model('libraries/courses_model');
				if( count($this->courses_model->checkExist($strCode))==0 ):
					$arrData = array(
						'courseCode'=>$strCode,
						'courseDesc'=>$strDescription
					);
					$blnReturn=$this->courses_model->add($arrData);
					if(count($blnReturn)>0):
						$this->session->set_flashdata('strMsg','Course added successfully.');
					endif;
					redirect('libraries/course');
				else:
					$this->session->set_flashdata('strErrorMsg','Course already exists.');
					$this->session->set_flashdata('strCode',$strCode);
					$this->session->set_flashdata('strDescription',$strDescription);
					//echo $this->session->flashdata('strErrorMsg');
					redirect('libraries/course/add');
				endif;
			endif;
		else:	
			$this->template->load('template/template_view','libraries/course/add_view',$this->arrData);
		endif;
	}
	public function edit()
	{
		if(!empty($arrPost)):
			$strCode = $arrPost['strCode'];
			$strDescription=$arrPost['strDescription'];
			if(!empty($strDescription)):
				$arrData = array(
					'courseDesc'=>$strDescription
				);
				$blnReturn=$this->courses_model->save($arrData,$strCode);
				if(count($blnReturn)>0):
					$this->session->set_flashdata('strMsg','Course saved successfully.');
				endif;
				redirect('libraries/course');
			endif;
		else:
			$strCode = urldecode($this->uri->segment(4));
			$this->arrData['arrData']=$this->courses_model->getData($strCode);
			$this->template->load('template/template_view','libraries/course/edit_view',$this->arrData);
		endif;
	}

	public function delete()
	{
		//$strDescription=$arrPost['strDescription'];
		$strCode = $this->uri->segment(4);
		if(!empty($arrPost)):
			$strCode = $arrPost['strCode'];
			if(!empty($strCode)):
				$blnReturn=$this->courses_model->delete($strCode);
				if(count($blnReturn)>0):
					$this->session->set_flashdata('strMsg','Course deleted successfully.');
				endif;
				redirect('libraries/course');
			endif;
		else:
			$this->arrData['arrData']=$this->courses_model->getData($strCode);
			$this->template->load('template/template_view','libraries/course/delete_view',$this->arrData);
		endif;
	}
}
