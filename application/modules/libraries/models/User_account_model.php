<?php 
/** 
Purpose of file:    Model for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_account_model extends CI_Model {

	var $table = 'tblEmpAccount';
	var $tableid = 'empNumber';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intEmpNumber = '')
	{		
		if($intEmpNumber != "")
		{
			$this->db->where($this->tableid,$intEmpNumber);
		}
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();		
	}

	function getEmpDetails($intEmpNumber = '')
	{		
	    if($intEmpNumber != "")
		{
			$this->db->where($this->tableid,$intEmpNumber);
		}
		$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table.'.empNumber','left');
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	

	}

	
	function add($arrData)
	{			
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();	
	}
	
	function checkExist($strUsername = '', $strPassword = '')
	{		

		$this->db->where('userName',$strUsername);
		$this->db->or_where('userPassword', $strPassword);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function save($arrData, $intEmpNumber)
	{
		$this->db->where($this->tableid, $intEmpNumber);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intEmpNumber)
	{
		$this->db->where($this->tableid, $intEmpNumber);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
