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

	var $table2 = 'tblemprequest';
	var $tableid2 = 'empNumber';

	var $table3 = 'tblrequesttype';
	var $tableid3 = 'requestCode';

	var $table4 = 'tblrequestapplicant';
	var $tableid4 = 'AppliCode';

	var $table5 = 'tblgroup1';
	var $tableid5 = 'group1Code';
	
	var $table6 = 'tblrequestsignatoryaction';
	var $tableid6 = 'ID';

	var $table7 = 'tblrequestsignatory';
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
		//$this->db->join('tblEmpPersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');

		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	// function getEmpDetails($strEmpNumber = '')
	// {		
	// 	if($strEmpNumber != "")
	// 	{
	// 		$this->db->where($this->tableid2,$strEmpNumber);
	// 	}
	// 	$this->db->join('tblEmpPersonal','tblemppersonal.empNumber = '.$this->table2.'.empNumber','left');

	// 	$objQuery = $this->db->get($this->table2);
	// 	return $objQuery->result_array();	
	// }

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

	function getOfficeName($strGroupCode = '')
	{		
		if($strGroupCode != "")
		{
			$this->db->where($this->tableid5,$strGroupCode);
		}
		$this->db->join('tblgroup2','tblgroup2.group1Code = '.$this->table5.'.group1Code','left');
		$this->db->join('tblgroup3','tblgroup3.group1Code = '.$this->table5.'.group1Code','left');
		$this->db->join('tblgroup4','tblgroup4.group1Code = '.$this->table5.'.group1Code','left');
		//$this->db->order_by("group2Name", "asc");
		//$this->db->order_by('tblgroup1.'.$this->tableid5,'DESC');
		$objQuery = $this->db->get($this->table5);
		return $objQuery->result_array();	
	}

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

	function checkExist($strReqType = '', $strGenApplicant = '')
	{		
		$this->db->where('RequestType',$strReqType);
		$this->db->or_where('Applicant', $strGenApplicant);
		$this->db->or_where('Signatory1', $str1stOfficer);	
		$this->db->or_where('Signatory2', $str2ndOfficer);	
		$this->db->or_where('Signatory3', $str3rdOfficer);	
		$this->db->or_where('SignatoryFin', $str4thOfficer);			
		
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
		
}
