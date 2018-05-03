<?php 
/** 
Purpose of file:    Model for Educational level Library
Author:             Edgardo P. Catorce Jr.
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Educ_level_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intEducLevelId = '')
	{		
		$strWhere = '';
		if($intEducLevelId != "")
			$strWhere .= " AND levelId = '".$intEducLevelId."'";
		
		$strSQL = " SELECT * FROM tblEducationalLevel					
					WHERE 1=1 
					$strWhere
					ORDER BY level DESC
					";
		//]echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblEducationalLevel', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strEducLevelCode = '', $strEducLevelDesc = '')
	{		
		$strSQL = " SELECT * FROM tblEducationalLevel					
					WHERE  
					levelCode ='$strEducLevelCode' OR
					levelDesc ='$strEducLevelDesc'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intEducLevelId)
	{
		$this->db->where('levelId', $intEducLevelId);
		$this->db->update('tblEducationalLevel', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intEducLevelId)
	{
		$this->db->where('levelId', $intEducLevelId);
		$this->db->delete('tblEducationalLevel'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
