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
	
	function getData($intProjectOder = '')
	{		
		$strWhere = '';
		if($intProjectOder != "")
			$strWhere .= " AND projectOrder = '".$intProjectOder."'";
		
		$strSQL = " SELECT * FROM tblProject					
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
		$this->db->insert('tblProject', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strProjectCode = '', $strProjectDescription = '')
	{		
		$strSQL = " SELECT * FROM tblProject					
					WHERE  
					projectCode ='$strProjectCode' OR
					projectDesc ='$strProjectDescription'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intProjectOder)
	{
		$this->db->where('projectOrder', $intProjectOder);
		$this->db->update('tblProject', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intProjectOder)
	{
		$this->db->where('projectOrder', $intProjectOder);
		$this->db->delete('tblProject'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
