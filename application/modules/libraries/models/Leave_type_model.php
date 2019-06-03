<?php 
/** 
Purpose of file:    Model for Leave_type Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leave_type_model extends CI_Model {

	var $table = 'tblLeave';
	var $tableid = 'leaveCode';

	var $table2 = 'tblSpecificLeave';
	var $tableid2 = 'specifyLeave';


	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	// function getData($strLeaveCode = '')
	// {		
	// 	if($strLeaveCode != "")
	// 	{
	// 		$this->db->where($this->tableid,$strLeaveCode);
	// 	}
		
	// 	$objQuery = $this->db->get($this->table);
	// 	return $objQuery->result_array();	
	// }

	function getData($strCode = '')
	{		
		if($strCode != "")
		{
			$this->db->where($this->tableid,$strCode);
		}
		// $this->db->order_by('leaveCode');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function getSpecialLeave($strSpecifyLeave = '')
	{		
		if($strSpecifyLeave != "")
		{
			$this->db->where($this->tableid2,$strSpecifyLeave);
		}
		 $this->db->group_by('leaveCode'); 
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	function add_special($arrData)
	{
		$this->db->insert($this->table2, $arrData);
		return $this->db->insert_id();		
	}

	function checkExist($strLeaveCode = '', $strLeaveType = '')
	{		
		$this->db->where('leaveCode',$strLeaveCode);
		$this->db->or_where('leaveType', $strLeaveType);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function check($strSpecial = '')
	{		
		$this->db->where('specifyLeave',$strSpecial);			
		
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function save($arrData, $strCode)
	{
		$this->db->where($this->tableid, $strCode);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_special($arrData, $strSpecifyLeave)
	{
		$this->db->where($this->tableid2, $strSpecifyLeave);
		$this->db->update($this->table2, $arrData);
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
