<?php 
/** 
Purpose of file:    Model for Salary Schedule Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Salary_sched_model extends CI_Model {

	var $table = 'tblsalaryschedversion';
	var $tableid = 'version';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	function getData($intVersion = '')
	{		
		if($intVersion != "")
		{
			$this->db->where($this->tableid,$intVersion);
		}
		$this->db->join('tblsalarysched','tblsalarysched.version = '.$this->table.'.version','left');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}		

	function checkExist($strNewSalarySched = '')
	{		
		
		$this->db->where('title',$strNewSalarySched);
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}
		
	function add($arrData)
	{
		$this->db->insert('tblsalaryschedversion', $arrData);
		return $this->db->insert_id();		
	}

	function add_new($arrData)
	{
		$this->db->insert('tblsalaryschedversion', $arrData);
		return $this->db->insert_id();		
	}
	
	
	function save($arrData, $intVersion)
	{
		$this->db->where('version', $intVersion);
		$this->db->update('tblsalaryschedversion', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intVersion)
	{
		$this->db->where('version', $intVersion);
		$this->db->delete('tblsalaryschedversion'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
