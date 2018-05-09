<?php 
/** 
Purpose of file:    Model for Scholarship Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Scholarship_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intScholarshipId = '')
	{		
		$strWhere = '';
		if($intScholarshipId != "")
			$strWhere .= " AND id = '".$intScholarshipId."'";
		
		$strSQL = " SELECT * FROM tblscholarship					
					WHERE 1=1 
					$strWhere
					ORDER BY description
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblscholarship', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strScholarship = '')
	{		
		$strSQL = " SELECT * FROM tblscholarship					
					WHERE  
					description ='$strScholarship' 				
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intScholarshipId)
	{
		$this->db->where('id', $intScholarshipId);
		$this->db->update('tblscholarship', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intScholarshipId)
	{
		$this->db->where('id', $intScholarshipId);
		$this->db->delete('tblscholarship'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
