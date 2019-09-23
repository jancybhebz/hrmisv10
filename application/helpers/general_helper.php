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
		return $CI->db->select('tblEmpPersonal.*,tblPosition.positionDesc')->join('tblEmpPosition','tblEmpPosition.empNumber=tblEmpPersonal.empNumber')->join('tblPosition','tblPosition.positionCode=tblEmpPosition.positionCode')->where('tblEmpPersonal.empNumber',$strEmpNo)->get('tblEmpPersonal')->result_array();	
	}
}

if ( ! function_exists('strict_mode'))
{
    function strict_mode()
    {
        $CI =& get_instance();
        $CI->db->query("set global sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
        $CI->db->query("set session sql_mode='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION';");
    }
}


if ( ! function_exists('employee_name'))
{
    function employee_name($strEmpNo)
    {
		$CI =& get_instance();
		$res = $CI->db->select('surname,firstname,middlename,middleInitial')->get_where('tblEmpPersonal', array('empNumber' => $strEmpNo))->result_array();
		if(count($res) > 0):
			$mid_ini = $res[0]['middleInitial']!='' ? str_replace('.', '', $res[0]['middleInitial']) : $res[0]['middlename'] != '' ? $res[0]['middlename'][0] : '';
	    	$mid_ini = $mid_ini!='' ? $mid_ini.'.' : '';
	    	$mid_ini = strpos($mid_ini, '.') ? $mid_ini : $mid_ini.'.';
	    	// return utf8_decode($res[0]['surname'].', '.$res[0]['firstname'].' '.$mid_ini);
            return $res[0]['surname'].', '.$res[0]['firstname'].' '.$mid_ini;
	    else:
	    	return '';
	    endif;
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
    function periods($computation = '')
    {
    	$arrPeriods = array(array('id' => 1, 'val' => 'Period 1'),
    						array('id' => 2, 'val' => 'Period 2'),
    						array('id' => 3, 'val' => 'Period 3'),
    						array('id' => 4, 'val' => 'Period 4'));

    	switch($computation):
    		case 'Monthly':
    			return array($arrPeriods[0]);
    			break;
    		case 'Semimonthly':
    		case 'Bi-Monthly':
    			return array($arrPeriods[0],$arrPeriods[1]);
    			break;
    		case 'Weekly':
    			return $arrPeriods;
    			break;
    		default:
    			return array($arrPeriods[0],$arrPeriods[1]);
    			break;
    	endswitch;
	}
}

if ( ! function_exists('getfullname'))
{
    function getfullname($fname, $lname, $mname='', $mid='', $ext='')
    {
        $lname = $lname!='' ? $lname.', ' : '';
    	$mname = $mname == '' ? '' : $mname[0];
    	$mid_ini = $mid!='' ? str_replace('.', '', $mid) : $mname;
    	$mid_ini = $mid_ini!='' ? $mid_ini.'.' : '';
    	$mid_ini = $mid_ini != '' ? strpos($mid_ini, '.') ? $mid_ini : $mid_ini.'.' : '';
    	$ext = $ext!='' ? $ext.' ': '';
    	$fullname = ucwords($ext.$lname.$fname.' '.$mid_ini);
        return $fullname;
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

if ( ! function_exists('currdfrom'))
{
    function currdfrom()
    {
        return isset($_GET['datefrom']) ? $_GET['datefrom'] : date('Y-m').'-01';
    }
}

if ( ! function_exists('currdto'))
{
    function currdto()
    {
        return isset($_GET['dateto']) ? $_GET['dateto'] : date('Y-m').'-'.cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
    }
}

if ( ! function_exists('ordinal'))
{
    function ordinal($number)
    {
    	$ends = array('th','st','nd','rd','th','th','th','th','th','th');
    	if ((($number % 100) >= 11) && (($number%100) <= 13))
    	    return $number. 'th';
    	else
    	    return $number. $ends[$number % 10];
	}
}

if ( ! function_exists('fixFloat'))
{
    function fixFloat($number)
    {
    	return floatval(str_replace(',', '', $number));
	}
}

if ( ! function_exists('fixArray'))
{
    function fixArray($arrData)
    {
    	if(gettype($arrData) == 'string'):
    	    $arrData = json_decode($arrData, true);
    	endif;

    	return $arrData;
	}
}

if ( ! function_exists('fixJson'))
{
    function fixJson($arrJson)
    {
        if(gettype($arrJson) == 'string'):
            return $arrJson;
        else:
            return json_encode($arrJson);
        endif;
    }
}

if ( ! function_exists('getGroupOffice'))
{
    function getGroupOffice()
    {
        $CI =& get_instance();
        $CI->load->model('request_model');
        $str='';
        $Group1 = $CI->request_model->getOfficeName(1);
        foreach($Group1 as $g1):
            $str .= '<option value="'.$g1['group1Code'].'">'.$g1['group1Name'].'</option>';
            $Group2 = $CI->request_model->getOfficeName(2, $g1['group1Code']);
            foreach($Group2 as $g2):
                $str .= '<option value="'.$g2['group2Code'].'">&nbsp;&nbsp;'.$g2['group2Name'].'</option>';
                $Group3 = $CI->request_model->getOfficeName(3, $g2['group2Code']);
                foreach($Group3 as $g3):
                    $str .= '<option value="'.$g3['group3Code'].'"> &nbsp;&nbsp;&nbsp;&nbsp;'.$g3['group3Name'].'</option>';
                    $Group4 = $CI->request_model->getOfficeName(4, $g3['group3Code']);
                    foreach($Group4 as $g4):
                        $str .= '<option value="'.$g4['group4Code'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$g4['group4Name'].'</option>';
                        $Group5 = $CI->request_model->getOfficeName(4, $g4['group4Code']);
                        foreach($Group5 as $g5):
                        $str .= '<option value="'.$g5['group5Code'].'">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$g5['group5Name'].'</option>';
                        endforeach; 
                    endforeach;
                endforeach; 
            endforeach;     
        endforeach;
        return $str;
    }
}

if ( ! function_exists('plantilla_group'))
{
    function plantilla_group($strCode)
    {
        $CI =& get_instance();
        $rs = $CI->db->select('plantillaGroupName')->where('plantillaGroupCode',$strCode)->get('tblPlantillaGroup')->result_array();
        return count($rs)>0?$rs[0]['plantillaGroupName']:'';
    }
}

if ( ! function_exists('position_name'))
{
    function position_name($strCode)
    {
        $CI =& get_instance();
        $rs = $CI->db->select('positionDesc')->where('positionCode',$strCode)->get('tblPosition')->result_array();
        return count($rs)>0?$rs[0]['positionDesc']:'';
    }
}
