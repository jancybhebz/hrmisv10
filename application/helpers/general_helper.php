<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('check_session'))
{
    function check_session()
    {
    	$session = isset($_SESSION['sessBoolLoggedIn']) ? 1 : 0;
    	$session = $session ? $_SESSION['sessBoolLoggedIn'] : 0;

    	if(!$session):
    		redirect('login');
    	endif;
	}
}

if ( ! function_exists('employee_details'))
{
    function employee_details($strEmpNo)
    {
		$CI =& get_instance();
		return $CI->db->select('tblEmpPersonal.*')->join('tblEmpPosition','tblEmpPosition.empNumber=tblEmpPersonal.empNumber')->get('tblEmpPersonal')->result_array();	
	}
}

if ( ! function_exists('employee_name'))
{
    function employee_name($strEmpNo)
    {
		$CI =& get_instance();
		$res = $CI->db->select('surname,firstname,middlename,middleInitial')->get_where('tblEmpPersonal', array('empNumber' => $strEmpNo))->result_array();
		$mid_ini = $res[0]['middleInitial']!='' ? str_replace('.', '', $res[0]['middleInitial']) : $res[0]['middlename'][0];
    	$mid_ini = $mid_ini!='' ? $mid_ini.'.' : '';
    	$mid_ini = strpos($mid_ini, '.') ? $mid_ini : $mid_ini.'.';
    	return $res[0]['surname'].', '.$res[0]['firstname'].' '.$mid_ini;
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

if ( ! function_exists('getincome_status'))
{
    function getincome_status($stat)
    {
    	if($stat != ''):
			$status = array('Remove','On-going', 'Paused');
			return $status[$stat];
		else:
			return $stat;
		endif;
	}
}

if ( ! function_exists('strtofloat'))
{
    function strtofloat($float)
    {
    	return str_replace(',', '', $float);
	}
}

# Return Adjustment Type
if ( ! function_exists('adjustmentType'))
{
    function adjustmentType($type='')
    {
    	$types = array(array('id' => '1', 'val' => 'Credit'),array('id' => '-1', 'val' => 'Debit'),array('id' => '2', 'val' => 'From Voucher'));
    	if($type != ''):
			$key = array_search($type, array_column($types, 'id'));
			return $types[$key]['val'];
		else:
			return $types;
		endif;
	}
}

# Return Period
if ( ! function_exists('periods'))
{
    function periods()
    {
    	return array(array('id' => 1, 'val' => 'Period 1'), array('id' => 2, 'val' => 'Period 2'));
	}
}

if ( ! function_exists('getfullname'))
{
    function getfullname($fname, $lname, $mname='', $mid='', $ext='')
    {
    	$mid_ini = $mid!='' ? str_replace('.', '', $mid) : $mname[0];
    	$mid_ini = $mid_ini!='' ? $mid_ini.'.' : '';
    	$mid_ini = strpos($mid_ini, '.') ? $mid_ini : $mid_ini.'.';
    	$ext = $ext!='' ? $ext.' ': '';
    	return ucwords($ext.$lname.', '.$fname.' '.$mid_ini);
	}
}

if ( ! function_exists('breakdates'))
{
    function breakdates($from,$to)
    {
    	$arrdates = array();
		while (strtotime($from) <= strtotime($to)) {
			array_push($arrdates, $from);
			$from = date ("Y-m-d", strtotime("+1 day", strtotime($from)));
		}
		return $arrdates;
	}
}

if ( ! function_exists('breakdates'))
{
    function breakdates($from,$to)
    {
    	$arrdates = array();
		while (strtotime($from) <= strtotime($to)) {
			array_push($arrdates, $from);
			$from = date ("Y-m-d", strtotime("+1 day", strtotime($from)));
		}
		return $arrdates;
	}
}

if ( ! function_exists('curryr'))
{
    function curryr()
    {
    	return isset($_GET['yr']) ? $_GET['yr'] : date('Y');
	}
}

if ( ! function_exists('currmo'))
{
    function currmo()
    {
    	return isset($_GET['month']) ? $_GET['month'] : date('m');
	}
}