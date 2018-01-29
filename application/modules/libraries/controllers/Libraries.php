<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Libraries extends MY_Controller {

	var $arrData;

	function __construct() {
        parent::__construct();

    }

	public function index()
	{
		$this->load->model(array('libraries/courses_model'));
		$this->arrData['arrCourses']=$this->courses_model->getData();
		$this->template->load('template/template_view','libraries/libraries_view',$this->arrData);
	}

	public function course()
	{
		$strView = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if($strView=="add"):
			if(!empty($arrPost)):
				//print_r($arrPost);
				$strCode=$arrPost['strCode'];
				$strDescription=$arrPost['strDescription'];
				if(!empty($strCode) && !empty($strDescription)):
					$this->load->model('libraries/courses_model');
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
				$this->template->load('template/template_view','libraries/add_course_view',$this->arrData);
			endif;
		else:
			$this->index();
		endif;
	}
}
