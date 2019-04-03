<?php 
/** 
Purpose of file:    Model for Attendance Scheme Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Attendance_scheme_model extends CI_Model {

	var $table = 'tblAttendanceScheme';
	var $tableid = 'schemeCode';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($strCode = '')
	{		

		if($strCode != "")
		{
			$this->db->where('schemeCode',$strCode);
		}
		$this->db->Select('*');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getType($strType = '')
	{		
		if($strType != "")
		{
			$this->db->where('schemeType',$strType);
		}
		//$this->db->distinct();
		$this->db->Select('*');
		$this->db->group_by('schemeType');
		$objQuery = $this->db->get($this->table);
		echo $this->db->last_query();
		return $objQuery->result_array();	
	}

	function getName($strName = '')
	{		
		if($strName != "")
		{
			$this->db->where('schemeName',$strName);
		}
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strschemeCode = '', $strschemeName = '')
	{		
		$this->db->where('schemeCode',$strschemeCode);
		$this->db->or_where('schemeName', $strschemeName);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function save($arrData, $strCode)
	{
		$this->db->where($this->tableid, $strCode);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($strCode)
	{
		$this->db->where($this->tableid, $strCode);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}

	function getAttendanceScheme($empid)
	{
		$res = $this->db->join('tblAttendanceScheme', 'tblAttendanceScheme.schemeCode = tblEmpPosition.schemeCode', 'left')
					->where('tblEmpPosition.empNumber',$empid)
					->get('tblEmpPosition')->result_array();
		return count($res) > 0 ? $res[0] : null;
	}
		
}
