<?php 
/** 
Purpose of file:    Model for Position Library
Author:             Edgardo P. Catorce Jr.
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Position_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intPositionId = '')
	{		
		$strWhere = '';
		if($intPositionId != "")
			$strWhere .= " AND positionId = '".$intPositionId."'";
		
		$strSQL = " SELECT * FROM tblposition					
					WHERE 1=1 
					$strWhere
					ORDER BY positionDesc
					";
		//]echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblposition', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strPositionCode = '', $strPositionDescription = '')
	{		
		$strSQL = " SELECT * FROM tblposition					
					WHERE  
					positionCode ='$strPositionCode' OR
					positionDesc ='$strPositionDescription'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intPositionId)
	{
		$this->db->where('positionId', $intPositionId);
		$this->db->update('tblposition', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intPositionId)
	{
		$this->db->where('positionId', $intPositionId);
		$this->db->delete('tblposition'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
