<?php 
/** 
Purpose of file:    Model for PhilHealth Range Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class PhilHealth_range_model extends CI_Model {

	var $table = 'tblphilhealthrange';
	var $tableid = 'philhealthId';


	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	function getPhilhealth($strPH = '')
	{		
		if($strPH != "")
		{
			$this->db->where($this->tableid2,$strPH);
		}
		 $this->db->group_by('leaveCode'); 
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function checkExist($strLeaveCode = '', $strLeaveType = '')
	{		
		$this->db->where('leaveCode',$strLeaveCode);
		$this->db->or_where('leaveType', $strLeaveType);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	function save($arrData, $strCode)
	{
		$this->db->where($this->tableid, $strCode);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	
	function delete_special($strSpecifyLeave)
	{
		$this->db->where($this->tableid2, $strSpecifyLeave);
		$this->db->delete($this->table2); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
