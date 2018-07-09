<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('employee_details'))
{
    function employee_details($strEmpNo)
    {
		$CI =& get_instance();
		return $CI->db->select('tblEmpPersonal.*')->join('tblEmpPosition','tblEmpPosition.empNumber=tblEmpPersonal.empNumber')->where('tblEmpPersonal.empNumber',$strEmpNo)->get('tblEmpPersonal')->result_array();	
	}
}

if ( ! function_exists('appstatus_name'))
{
    function appstatus_name($strCode)
    {
		$CI =& get_instance();
		$CI->load->model('libraries/payroll_process_model');
		$rs = $CI->payroll_process_model->getData($strCode);
		return count($rs)>0?$rs[0]['appointmentDesc']:'';
	}
}

if ( ! function_exists('appstatus_code'))
{
    function appstatus_code($strCode)
    {
		$CI =& get_instance();
		$CI->load->model('libraries/payroll_process_model');
		$rs = $CI->payroll_process_model->getData();
		foreach($rs as $row):
			$arrData = explode(',',$row['processWith']);
			if(in_array($strCode,$arrData))
				return $row['appointmentCode'];
		endforeach;
	}
}

if ( ! function_exists('employee_office'))
{
    function employee_office($strEmpNo)
    {
		$CI =& get_instance();
		//$CI->load->model('employees/employees_model');
		$rs = $CI->db->select('group1,group2,group3,group4,group5')->where('empNumber',$strEmpNo)->get('tblEmpPosition')->result_array();
		foreach($rs as $row):
			if($row['group5']!='') return $row['group5'];
			if($row['group4']!='') return $row['group4'];
			if($row['group3']!='') return $row['group3'];
			if($row['group2']!='') return $row['group2'];
			if($row['group1']!='') return $row['group1'];
		endforeach;
    }
}

if ( ! function_exists('office_name'))
{
    function office_name($code)
    {
		$CI =& get_instance();
		$arrRes = array();
		
		$res = $CI->db->get_where('tblGroup', array('groupcode' => $code))->result_array();
		array_push($arrRes, $res!=null ? $res[0]['groupname'] : null);

		$res = $CI->db->get_where('tblGroup1', array('group1Code' => $code))->result_array();
		array_push($arrRes, $res!=null ? $res[0]['group1Name'] : null);

		$res = $CI->db->get_where('tblGroup2', array('group2Code' => $code))->result_array();
		array_push($arrRes, $res!=null ? $res[0]['group2Name'] : null);

		$res = $CI->db->get_where('tblGroup3', array('group3Code' => $code))->result_array();
		array_push($arrRes, $res!=null ? $res[0]['group3Name'] : null);

		$res = $CI->db->get_where('tblGroup4', array('group4Code' => $code))->result_array();
		array_push($arrRes, $res!=null ? $res[0]['group4Name'] : null);

		$res = $CI->db->get_where('tblGroup5', array('group5Code' => $code))->result_array();
		array_push($arrRes, $res!=null ? $res[0]['group5Name'] : null);

		return join('', $arrRes);
    }
}