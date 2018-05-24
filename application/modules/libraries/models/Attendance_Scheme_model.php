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

	var $table = 'tblattendancescheme';
	var $tableid = 'schemeCode';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($strschemeCode = '')
	{		
		if($strschemeCode != "")
		{
			$this->db->where($this->tableid,$strschemeCode);
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

	function save($arrData, $strschemeCode)
	{
		$this->db->where($this->tableid, $strschemeCode);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($strschemeCode)
	{
		$this->db->where($this->tableid, $strschemeCode);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
