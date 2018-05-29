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
	var $table2 = 'tblgroup2';
	var $tableid2 = 'group2Code';
	var $table3 = 'tblgroup3';
	var $tableid3 = 'group3Code';
	var $table4 = 'tblgroup4';
	var $tableid4 = 'group4Code';
	

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

	function getExecData($strExecutive = '')
	{		
		if($strExecutive != "")
		{
			$this->db->where($this->tableid2,$strExecutive);
		}
		$this->db->join('tblgroup1','tblgroup1.group1Code = '.$this->table2.'.group1Code','left');
		
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function getServiceData($strServiceCode = '')
	{		
		if($strServiceCode != "")
		{
			$this->db->where($this->tableid2,$strServiceCode);
		}
		$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table2.'.empNumber','left');
		
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function getDivisionData($strDivCode = '')
	{		
		if($strDivCode != "")
		{
			$this->db->where($this->tableid3,$strDivCode);
		}
		$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table3.'.empNumber','left');
		
		$objQuery = $this->db->get($this->table3);
		return $objQuery->result_array();	
	}

	function getSectionData($strSecCode = '')
	{		
		if($strSecCode != "")
		{
			$this->db->where($this->tableid4,$strSecCode);
		}
		$this->db->join('tblemppersonal','tblemppersonal.empNumber = '.$this->table4.'.empNumber','left');
		
		$objQuery = $this->db->get($this->table4);
		return $objQuery->result_array();	
	}

	function add_exec($arrData)
	{
		$this->db->insert($this->table, $arrData);
		return $this->db->insert_id();		
	}
	function add_service($arrData)
	{
		$this->db->insert($this->table2, $arrData);
		return $this->db->insert_id();		
	}
	function add_division($arrData)
	{
		$this->db->insert($this->table3, $arrData);
		return $this->db->insert_id();		
	}
	function add_section($arrData)
	{
		$this->db->insert($this->table4, $arrData);
		return $this->db->insert_id();		
	}

	function checkExist($strExecOffice = '', $strExecName = '')
	{		
		$this->db->where('group1Code',$strExecOffice);
		$this->db->or_where('group1Name', $strExecName);			
		
		$objQuery = $this->db->get($this->table);
		return $objQuery->result_array();	
	}
	function checkService($strExecutive = '', $strServiceCode = '')
	{		
		$this->db->where('group2Code',$strExecutive);
		$this->db->or_where('group2Name', $strServiceCode);			
		
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}

	function checkDivision($strDivCode = '', $strDivName = '')
	{		
		$this->db->where('group3Code',$strDivCode);
		$this->db->or_where('group3Name', $strDivName);			
		
		$objQuery = $this->db->get($this->table3);
		return $objQuery->result_array();	
	}

	function checkSection($strSecCode = '', $strSecName = '')
	{		
		$this->db->where('group4Code',$strSecCode);
		$this->db->or_where('group4Name', $strSecName);			
		
		$objQuery = $this->db->get($this->table4);
		return $objQuery->result_array();	
	}
	function checkCust1($strEmployee = '')
	{		
		$this->db->where('group1Custodian',$strEmployee);
		$objQuery = $this->db->get($this->table1);
		return $objQuery->result_array();	
	}
	function checkCust2($strEmployee = '')
	{		
		$this->db->where('group2Custodian',$strEmployee);
		$objQuery = $this->db->get($this->table2);
		return $objQuery->result_array();	
	}
	function checkCust3($strEmployee = '')
	{		
		$this->db->where('group3Custodian',$strEmployee);
		$objQuery = $this->db->get($this->table3);
		return $objQuery->result_array();	
	}
	function checkCust4($strEmployee = '')
	{		
		$this->db->where('group4Custodian',$strEmployee);
		$objQuery = $this->db->get($this->table4);
		return $objQuery->result_array();	
	}

	function save_exec($arrData, $strExecOffice)
	{
		$this->db->where($this->tableid, $strExecOffice);
		$this->db->update($this->table, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_service($arrData, $strExecutive)
	{
		$this->db->where($this->tableid2, $strExecutive);
		$this->db->update($this->table2, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_division($arrData, $strDivCode)
	{
		$this->db->where($this->tableid3, $strDivCode);
		$this->db->update($this->table3, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function save_section($arrData, $strSecCode)
	{
		$this->db->where($this->tableid4, $strSecCode);
		$this->db->update($this->table4, $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete_exec($strExecOffice)
	{
		$this->db->where($this->tableid, $strExecOffice);
		$this->db->delete($this->table); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function delete_service($strServiceCode)
	{
		$this->db->where($this->tableid2, $strServiceCode);
		$this->db->delete($this->table2); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function delete_division($strDivCode)
	{
		$this->db->where($this->tableid3, $strDivCode);
		$this->db->delete($this->table3); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
	function delete_section($strSecCode)
	{
		$this->db->where($this->tableid4, $strSecCode);
		$this->db->delete($this->table4); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
