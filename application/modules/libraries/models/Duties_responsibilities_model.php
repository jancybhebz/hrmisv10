<?php 
/** 
Purpose of file:    Model for Duties and Responsibilities Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Duties_responsibilities_model extends CI_Model {

	var $table = 'tblduties';
	var $tableid = 'duties';

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}

	function getData($strDuties = '')
	{		
		if($strDuties != "")
		{
			$this->db->where($this->tableid,$strDuties);
		}
		$this->db->join('tblposition','tblposition.positionId = '.$this->table.'.duties','left');
		$this->db->order_by('tblduties.'.$this->tableid,'ASC');
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}

	function checkExist($strDuties = '')
	{		
		$this->db->where('duties',$strDuties);		
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}

	function save($arrData, $strDuties)
	{
		$this->db->where($this->tableid, $strDuties);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($strDuties)
	{
		$this->db->where($this->tableid, $strDuties);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
