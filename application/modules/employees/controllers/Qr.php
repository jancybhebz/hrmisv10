<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Qr extends MY_Controller {
	var $arrData;
	function __construct() {
        parent::__construct();
        $this->load->model(array('employees/employees_model'));
    }

	public function generate()
	{
		$this->load->library('ciqrcode');
		$rs = $this->employees_model->getData();
		//print_r($rs);
		foreach($rs as $row):
			$qr_image=$row['empNumber'].'.png';
			echo $qr_image."<br>";
			$strData = $row['empNumber'];
			$params['data'] = $strData;
			$params['level'] = 'H';
			$params['size'] = 8;
			$params['savename'] =FCPATH."uploads/qr/".$qr_image;
			if($this->ciqrcode->generate($params))
			{
				//$this->arrTemplateData['img_url']=$qr_image;
				//Set QR Code value in DB
				//$arrData = array('reg_qr_code'=>$qr_image);
				echo '<img src="'.base_url('uploads/qr/'.$qr_image).'">';
			}
		endforeach;
	}

	
}
