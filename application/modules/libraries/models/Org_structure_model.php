<?php 
/** 
Purpose of file:    Model for Org Structure Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Org_structure_model extends CI_Model {

	var $table = 'tblgroup1';
	var $tableid = 'group1Code';
	

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	function getData($strExecOffice = '')
	{		
		if($strExecOffice != "")
		{
			$this->db->where($this->tableid,$strExecOffice);
		}
		$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');
		// // $this->db->order_by('tblleave.'.$this->tableid,'ASC');
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	// function getSpecialLeave($strSpecialCode = '')
	// {		
	// 	if($strSpecialCode != "")
	// 	{
	// 		$this->db->where('leaveCode',$strSpecialCode);
	// 	}
		
	// 	$objQuery = $this->db->get($this->table2);
	// 	return $objQuery->result_array();	
	// }

	function add_exec($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	// function add_special($arrData)
	// {
	// 	$this->db->insert($this->table2, $arrData);
	// 	return $this->db->insert_id();		
	// }

	function checkExist($strExecOffice = '', $strExecName = '')
	{		
		$this->db->where('group1Code',$strExecOffice);
		$this->db->or_where('group1Name', $strExecName);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	// function check($strSpecial = '')
	// {		
	// 	$this->db->where('specifyLeave',$strSpecial);			
		
	// 	$objQuery = $this->db->get($this->table2);
	// 	return $objQuery->result_array();	
	// }

	function save_exec($arrData, $strExecOffice)
	{
		$this->db->where($this->tableid, $strExecOffice);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	// function save_special($arrData, $strSpecialLeaveCode)
	// {
	// 	$this->db->where('leaveCode', $strSpecialLeaveCode);
	// 	$this->db->update($this->table2, $arrData);
	// 	//echo $this->db->affected_rows();
	// 	return $this->db->affected_rows()>0?TRUE:FALSE;
	// }
		
	function delete_exec($strExecOffice)
	{
		$this->db->where($this->tableid, $strExecOffice);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
