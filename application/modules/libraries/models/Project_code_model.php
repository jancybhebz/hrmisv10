<?php 
/** 
Purpose of file:    Model for Project Code Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Project_code_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intProjectId = '')
	{		
		$strWhere = '';
		if($intProjectId != "")
			$strWhere .= " AND projectId = '".$intProjectId."'";
		
		$strSQL = " SELECT * FROM tblproject					
					WHERE 1=1 
					$strWhere
					ORDER BY projectDesc
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblproject', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strProjectCode = '', $strProjectDescription = '')
	{		
		$strSQL = " SELECT * FROM tblproject					
					WHERE  
					projectCode ='$strProjectCode' OR
					projectDesc ='$strProjectDescription'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intProjectId)
	{
		$this->db->where('projectId', $intProjectId);
		$this->db->update('tblproject', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intProjectId)
	{
		$this->db->where('projectId', $intProjectId);
		$this->db->delete('tblproject'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
