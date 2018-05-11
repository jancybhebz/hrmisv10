<?php 
/** 
Purpose of file:    Model for Holiday Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Holiday_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($strCode = '')
	{		
		$strWhere = '';
		if($strCode != "")
			$strWhere .= " AND holidayCode = '".$strCode."'";
		
		$strSQL = " SELECT * FROM tblholiday					
					WHERE 1=1 
					$strWhere
					ORDER BY holidayName
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblholiday', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strHolidayCode = '', $strHolidayName = '')
	{		
		$strSQL = " SELECT * FROM tblholiday					
					WHERE  
					holidayCode ='$strHolidayCode' OR
					holidayName ='$strHolidayName'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->update('tblholiday', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($strCode)
	{
		$this->db->where('holidayCode', $strCode);
		$this->db->delete('tblholiday'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
