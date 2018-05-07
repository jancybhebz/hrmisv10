<?php 
/** 
Purpose of file:    Model for Service Code Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Service_code_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intServiceId = '')
	{		
		$strWhere = '';
		if($intServiceId != "")
			$strWhere .= " AND serviceId = '".$intServiceId."'";
		
		$strSQL = " SELECT * FROM tblservicecode					
					WHERE 1=1 
					$strWhere
					ORDER BY serviceDesc
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblservicecode', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strServiceCode = '', $strServiceDescription = '')
	{		
		$strSQL = " SELECT * FROM tblservicecode					
					WHERE  
					serviceCode ='$strServiceCode' OR
					serviceDesc ='$strServiceDescription'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intServiceId)
	{
		$this->db->where('serviceId', $intServiceId);
		$this->db->update('tblservicecode', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intServiceId)
	{
		$this->db->where('serviceId', $intServiceId);
		$this->db->delete('tblservicecode'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
