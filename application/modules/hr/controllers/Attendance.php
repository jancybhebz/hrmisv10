<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Attendance extends MY_Controller {

	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('Hr_model'));
    }

    public function conversion_table()
	{
		$this->load->library('Conversion_table/Conversion');
		$this->Conversion = new Conversion();

        $this->arrData['convii'] = $this->Conversion->conversion_ii();
        $this->arrData['conv8hrs'] = $this->Conversion->conversion_based8hrs();
        $this->arrData['conviii'] = $this->Conversion->conversion_iii();
        $this->arrData['conviv1'] = $this->Conversion->conversion_iv(1);
        $this->arrData['conviv2'] = $this->Conversion->conversion_iv();
		$this->template->load('template/template_view','attendance/conversion_table/_view', $this->arrData);
	}

	public function view_all()
	{
		$this->arrData['arrEmployees'] = $this->Hr_model->getData('','','all');
		$this->template->load('template/template_view','attendance/attendance_summary/_viewall',$this->arrData);

	}

	public function attendance_summary()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_balance_update()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function leave_monetization()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function filed_request()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_broken_sched()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_broken_sched()
	{
		$this->load->model('libraries/Attendance_scheme_model');
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';
			
		$arrtt_schemes = array();
		$arrAttSchemes = $this->Attendance_scheme_model->getData();
		foreach($arrAttSchemes as $as):
			if($as['schemeType'] == 'Sliding'):
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5).'-'.substr($as['amTimeinTo'],0,5).','.substr($as['pmTimeoutFrom'],0,5).'-'.substr($as['pmTimeoutTo'],0,5).')';
			else:
				$varas['code'] = $as['schemeCode'];
				$varas['label'] = $as['schemeName'].'-'.$as['schemeType'].' ('.substr($as['amTimeinFrom'],0,5)."-".substr($as['pmTimeoutTo'],0,5).')';
			endif;
			$arrtt_schemes[] = $varas;
		endforeach;
		$this->arrData['arrAttSchemes'] = $arrtt_schemes;


		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_local_holiday()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_local_holiday()
	{
		$this->load->model('libraries/Holiday_model');
		$empid = $this->uri->segment(5);

		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';
		
		$this->arrData['localHolidays'] = $this->Holiday_model->checkLocExist();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_certify_offset()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_ob()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_ob()
	{
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';
		
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_leave()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_leave()
	{
		$this->load->model('libraries/Leave_type_model');
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->arrData['arrleaveTypes'] = $this->Leave_type_model->getData();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_compensatory_leave()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_compensatory_leave()
	{
		$this->load->model('libraries/Leave_type_model');
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->arrData['arrleaveTypes'] = $this->Leave_type_model->getData();
		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_time()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_time()
	{
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_to()
	{
		$empid = $this->uri->segment(5);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function dtr_add_to()
	{
		$empid = $this->uri->segment(5);
		
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];
		$this->arrData['action'] = 'add';

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}

	public function override()
	{
		// $empid = $this->uri->segment(4);
		// $res = $this->Hr_model->getData($empid,'','all');
		// $this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function qr_code()
	{
		$empid = $this->uri->segment(4);
		$res = $this->Hr_model->getData($empid,'','all');
		$this->arrData['arrData'] = $res[0];

		$this->template->load('template/template_view','attendance/attendance_summary/summary',$this->arrData);

	}


   	public function download_qrcode()
   	{
   		$this->load->helper('download');
   		$empNumber = $this->uri->segment(4);
   		$data = file_get_contents("./uploads/qr/".$empNumber.".PNG");
   		$name = 'HRMISQR'.$empNumber.date('Ymd').'.jpg';

   		force_download($name, $data);
   	}
	

	public function generate_qrcode()
	{
		$this->load->library('ciqrcode');
		$empNumber = $this->uri->segment(4);

		$qr_image=$empNumber.'.png';
		$strData = 'http://hrmis.dost.gov.ph/scanqr/index.php?empNo='.$empNumber;
		$params['data'] = $strData;
		$params['level'] = 'H';
		$params['size'] = 8;
		$params['savename'] =FCPATH.STORE_QR.$qr_image;
		if($this->ciqrcode->generate($params)):
			$this->session->set_flashdata('strSuccessMsg','QR Code successfully generated.');
			redirect('hr/attendance_summary/qr_code/'.$empNumber);
		else:
			$this->session->set_flashdata('strErrorMsg','Failed to generate QR Code, please try again later or contact Administrator.');
		endif;

	}

	public function override_ob()
	{
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_ob_add()
	{
		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function exclude_dtr()
	{
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_exec_dtr_add()
	{
		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function generate_dtr()
	{
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_gen_dtr_add()
	{
		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}


}


