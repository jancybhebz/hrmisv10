<?php
/**
 * SystemName: Human Resoruce Management System
 * 
 * Author: Maychell M. Alcorin
 * 
 * Copyright (C) 2018 by the Department of Science and Technology Central Office
*/
defined('BASEPATH') OR exit('No direct script access allowed');

class Override extends MY_Controller {

	var $arrData;
	
	function __construct() {
        parent::__construct();
        $this->load->model(array('Override_model','libraries/Org_structure_model','libraries/Appointment_status_model','Hr_model','hr/Attendance_summary_model'));
    }

	public function override_ob()
	{
		$this->arrData['arr_ob'] = $this->Override_model->get_override_ob();
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_ob_add()
	{
		$this->arrData['arrGroups'] = $this->Org_structure_model->getData_allgroups();
		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();
		$this->arrData['arrEmployees'] = $this->Hr_model->getData_byGroup();

		$empid = $this->uri->segment(3);
		$arrPost = $this->input->post();
		if(!empty($arrPost)):
			$overrideData = array(
								 'override_type'=> 1,
								 'office_type'	=> $arrPost['seltype'],
								 'office'		=> $arrPost['txtoffice'],
								 'appt_status'	=> $arrPost['selappt'],
								 'created_date' => date('Y-m-d H:i:s'),
								 'created_by' 	=> $this->session->userdata('sessEmpNo'));
			$override_id = $this->Override_model->add($overrideData);

			foreach($arrPost['selemps'] as $emps):
				$arrData = array(
								'dateFiled'	 => date('Y-m-d'),
								'empNumber'	 => $emps,
								'obDateFrom' => $arrPost['ob_datefrom'],
								'obDateTo'	 => $arrPost['ob_dateto'],
								'obTimeFrom' => $arrPost['ob_timefrom'],
								'obTimeTo'	 => $arrPost['ob_timeto'],
								'obPlace'	 => $arrPost['txtob_place'],
								'obMeal'	 => isset($arrPost['chk_obmeal']) ? 'Y' : 'N',
								'purpose'	 => $arrPost['txtob_purpose'],
								'official'	 => isset($arrPost['isob']) ? $arrPost['isob'] : 'N',
								'approveHR'	 => 'Y',
								'is_override'=> 1,
								'override_id'=> $override_id);
				$this->Attendance_summary_model->add_ob($arrData);
			endforeach;
			
			$this->session->set_flashdata('strSuccessMsg','Override OB added successfully.');
			redirect('hr/attendance/override/ob');
		endif;

		$this->arrData['action'] = 'add';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);

	}

	public function override_ob_edit()
	{
		$arrob_data = $this->Override_model->get_override_ob($this->uri->segment(5));
		$this->arrData['arrob_data'] = $arrob_data;
		$this->arrData['arrGroups'] = $this->Org_structure_model->getData_allgroups();
		$this->arrData['arrAppointments'] = $this->Appointment_status_model->getData();
		$this->arrData['arrEmployees'] = $this->Hr_model->getData_byGroup();

		$arrPost = $this->input->post();
		$override_id = $this->uri->segment(5);
		if(!empty($arrPost)):
			$overrideData = array(
								 'office_type'	=> $arrPost['seltype'],
								 'office'		=> $arrPost['txtoffice'],
								 'appt_status'	=> $arrPost['selappt'],
								 'lastupdated_date' => date('Y-m-d H:i:s'),
								 'lastupdate_dby' 	=> $this->session->userdata('sessEmpNo'));
			$this->Override_model->save($overrideData, $override_id);

			# remove ob before insert new
			foreach(array_column($arrob_data, 'obID') as $obid):
				$this->Attendance_summary_model->delete_ob($obid);
			endforeach;

			# insert new ob
			foreach($arrPost['selemps'] as $emps):
				$arrData = array(
								'dateFiled'	 => date('Y-m-d'),
								'empNumber'	 => $emps,
								'obDateFrom' => $arrPost['ob_datefrom'],
								'obDateTo'	 => $arrPost['ob_dateto'],
								'obTimeFrom' => $arrPost['ob_timefrom'],
								'obTimeTo'	 => $arrPost['ob_timeto'],
								'obPlace'	 => $arrPost['txtob_place'],
								'obMeal'	 => isset($arrPost['chk_obmeal']) ? 'Y' : 'N',
								'purpose'	 => $arrPost['txtob_purpose'],
								'official'	 => isset($arrPost['isob']) ? $arrPost['isob'] : 'N',
								'approveHR'	 => 'Y',
								'is_override'=> 1,
								'override_id'=> $override_id);
				$this->Attendance_summary_model->add_ob($arrData);
			endforeach;
			
			$this->session->set_flashdata('strSuccessMsg','Override OB updated successfully.');
			redirect('hr/attendance/override/ob');
		endif;

		$this->arrData['action'] = 'edit';
		$this->template->load('template/template_view','attendance/override/override',$this->arrData);
	}

	public function override_ob_delete()
	{
		$arrPost = $this->input->post();
		$arrob_data = $this->Override_model->get_override_ob($arrPost['txtdelover_ob']);
		# remove emp ob
		foreach(array_column($arrob_data, 'obID') as $obid):
			$this->Attendance_summary_model->delete_ob($obid);
		endforeach;

		$this->Override_model->delete($arrPost['txtdelover_ob']);
		$this->session->set_flashdata('strSuccessMsg','Override OB deleted successfully.');
		redirect('hr/attendance/override/ob');
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


}



