<?php 
/** 
Purpose of file:    Model for Separation Mode Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Separation_mode_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($strSeparationMode = '')
	{		
		$strWhere = '';
		if($strSeparationMode != "")
			$strWhere .= " AND serviceId = '".$strSeparationMode."'";
		
		$strSQL = " SELECT * FROM tblseparationcause					
					WHERE 1=1 
					$strWhere
					ORDER BY separationCause
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblseparationcause', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strSeparationMode = '')
	{		
		$strSQL = " SELECT * FROM tblseparationcause					
					WHERE  
					separationCause ='$strSeparationMode' 				
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $strSeparationMode)
	{
		$this->db->where('separationCause', $strSeparationMode);
		$this->db->update('tblseparationcause', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($strSeparationMode)
	{
		$this->db->where('separationCause', $strSeparationMode);
		$this->db->delete('tblseparationcause'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
