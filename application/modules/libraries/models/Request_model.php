<?php 
/** 
Purpose of file:    Model for Request Signatories Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Request_model extends CI_Model {

	var $table = 'tblRequestFlow';
	var $tableid = 'reqID';

	var $table2 = 'tblEmpRequest';
	var $tableid2 = 'empNumber';

	var $table3 = 'tblRequestType';
	var $tableid3 = 'requestCode';

	var $table4 = 'tblRequestApplicant';
	var $tableid4 = 'AppliCode';

	var $table5 = 'tblgroup1';
	var $tableid5 = 'group1Code';
	
	var $table6 = 'tblRequestSignatoryAction';
	var $tableid6 = 'ID';

	var $table7 = 'tblRequestSignatory';
	var $tableid7 = 'SignCode';
	
	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	function getData($intReqId = '')
	{		
		if($intReqId != "")
		{
			$this->db->where($this->tableid,$intReqId);
		}

		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getEmpDetails($strEmpNumber = '')
	{		
		if($strEmpNumber != "")
		{
			$this->db->where($this->tableid2,$strEmpNumber);
		}
		$this->db->join('tblEmpPersonal','tblemppersonal.empNumber = '.$this->table2.'.empNumber','left');

		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function getRequestType($strReqCode = '')
	{		
		if($strReqCode != "")
		{
			$this->db->where($this->tableid3,$strReqCode);
		}
		$objQuery = $this->db->get($this->table3);
		return $objQuery->result_array();	
	}

	function getApplicant($strAppliCode = '')
	{		
		if($strAppliCode != "")
		{
			$this->db->where($this->tableid4,$strAppliCode);
		}
		$objQuery = $this->db->get($this->table4);
		return $objQuery->result_array();	
	}

	function getOfficeName($intLevel, $strGroupCode = '')
	{		
		$this->db->select('*');
		$where='';
		if($strGroupCode != "")
		{
			$this->db->where('group'.($intLevel-1).'Code',$strGroupCode);
		}
		$this->db->order_by('group'.($intLevel).'Name','asc');
		$objQuery = $this->db->get('tblGroup'.$intLevel);
		return $objQuery->result_array();	
	}

	// function getOfficeName($strGroupCode = '')
	// {		
	// 	if($strGroupCode != "")
	// 	{
	// 		$this->db->where('group1Code',$strGroupCode);
	// 	}
	
	// 	$this->db->join('tblGroup2','tblGroup2.group1Code = tblGroup1.group1Code','left');
	// 	$this->db->join('tblGroup3','tblGroup3.group1Code = tblGroup1.group1Code','left');
	// 	$this->db->join('tblGroup4','tblGroup4.group1Code = tblGroup1.group1Code','left');
	// 	$this->db->order_by('group1Name','asc');
	// 	$objQuery = $this->db->get('tblGroup1');
	// 	return $objQuery->result_array();	
	// }


	function getAction($strAction = '')
	{		
		if($strAction != "")
		{
			$this->db->where($this->tableid6,$strAction);
		}
		
		$objQuery = $this->db->get($this->table6);
		return $objQuery->result_array();	
	}

	function getSignatory($strSignatory = '')
	{		
		if($strSignatory != "")
		{
			$this->db->where($this->tableid7,$strSignatory);
		}
		
		$objQuery = $this->db->get($this->table7);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	function checkExist($strReqType = '', $strGenApplicant = '', $str1stOfficer='',$str2ndOfficer='',$str3rdOfficer='',$str4thOfficer='')
	{		
		$this->db->where('RequestType',$strReqType);
		$this->db->where('Applicant', $strGenApplicant);
		$this->db->where('Signatory1', $str1stOfficer);	
		$this->db->where('Signatory2', $str2ndOfficer);	
		$this->db->where('Signatory3', $str3rdOfficer);	
		$this->db->where('SignatoryFin', $str4thOfficer);			
		// echo $this->db->last_query();
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function save($arrData, $intReqId)
	{
		$this->db->where($this->tableid, $intReqId);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intReqId)
	{
		$this->db->where($this->tableid, $intReqId);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function update_employeeRequest($arrData, $requestid)
	{
		$this->db->where('requestID', $requestid);
		$this->db->update('tblEmpRequest', $arrData);
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	# Request Flow
	function getRequestFlow($app='')
	{
		if($app!=''):
			$this->db->or_like('Applicant', $app, 'before', false);
			$this->db->or_like('Applicant', $app, 'after', false);
			$this->db->or_like('Applicant', $app, 'both', false);
			if(check_module() == 'hr') {
				$this->db->or_where('Applicant','ALLEMP');
			}
			$res = $this->db->get('tblRequestFlow')->result_array();
		else:
			$res = $this->db->get('tblRequestFlow')->result_array();
		endif;
		
		return $res;
	}

	function getEmployeeRequest($empnumber,$yr='',$month='')
	{
		$this->db->order_by('requestDate', 'desc');
		if($yr!='' && $month!=''):
			if($month=='all'):
				$this->db->like('requestDate', $yr.'-', 'after', false);
			else:
				$this->db->like('requestDate', $yr.'-'.$month, 'after', false);
			endif;
		endif;

		if(gettype($empnumber) == 'array'):
			$this->db->where_in('empNumber', $empnumber);
			$res = $this->db->get('tblEmpRequest')->result_array();
		else:
			$res = $this->db->get_where('tblEmpRequest', array('empNumber' => $empnumber))->result_array();
		endif;
		
		return $res;
	}

	function getEmpFiledRequest($empNumber,$arrcode=null)
	{
		$this->db->order_by('requestDate', 'desc');
		$this->db->where('empNumber', $empNumber);
		$this->db->where_in('requestCode', $arrcode);
		$this->db->where('(requestDate >= \''.curryr().'-'.currmo().'-01\' and requestDate <= LAST_DAY(\''.curryr().'-'.currmo().'-01\'))');
		// $this->db->where('requestStatus!=','Cancelled');
		return $this->db->get_where('tblEmpRequest')->result_array();
	}

	function request_type()
	{
		return $this->db->get_where('tblRequestType')->result_array();
	}

	function employee_request($yr='',$month='',$iscancel=0,$status='',$code='')
	{
		if($month == 'all'):
			if($yr != 'all'):
				$this->db->where('(requestDate >= \''.$yr.'-01-01\' and requestDate <= LAST_DAY(\''.$yr.'-12-01\'))');
			endif;
		else:
			if($yr == 'all'):
				$this->db->where("(requestDate like '%".sprintf('%02d', $month)."%'");
			else:
				$this->db->where('(requestDate >= \''.$yr.'-'.$month.'-01\' and requestDate <= LAST_DAY(\''.$yr.'-'.$month.'-01\'))');
			endif;
		endif;

		if($code!=''):
			if($code!='all'):
				$this->db->where('requestCode',$code);
			endif;
		endif;

		if($iscancel) { $this->db->where('requestStatus!=','Cancelled'); }
		if($status!='') { $this->db->where('requestStatus',$status); }

		$this->db->where('SignatoryFin=','');
		$res = $this->db->get('tblEmpRequest')->result_array();
		
		return $res;
	}

	function notification_request()
	{
		$this->db->where('(requestDate >= \''.date('Y').'-01-01\' and requestDate <= LAST_DAY(\''.date('Y').'-12-01\'))');
		$this->db->where('requestStatus!=','Cancelled');
		$this->db->where('SignatoryFin=','');
		$res = $this->db->get('tblEmpRequest')->result_array();
		
		return $res;
	}

	function request_code()
	{
		$this->db->select('requestCode');
		$this->db->group_by('requestCode');
		$res = $this->db->get('tblEmpRequest')->result_array();
		
		return $res;
	}

	
		
}
