<?php 
/** 
Purpose of file:    Model for User Account Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_account_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intEmpNumber = '')
	{		
		$strWhere = '';
		if($intEmpNumber != "")
			$strWhere .= " AND empNumber = '".$intEmpNumber."'";
		
		$strSQL = " SELECT * FROM tblempaccount					
					WHERE 1=1 
					$strWhere
					ORDER BY empNumber
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function getEmpDetails($empId = '')
	{		
		  $query = $this->db->query('SELECT empNumber,surname,firstname,middlename,middleInitial,nameExtension FROM tblemppersonal 
            	LEFT JOIN tblemppersonal ON tblempaccount.EmpNumber = tblemppersonal.empID
            	WHERE empID='.$empId);
            	return $query->result_array();
	}

	function add($arrData)
	{
		$this->db->insert('tblempaccount', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strUsername = '', $strPassword = '')
	{		
		$strSQL = " SELECT * FROM tblempaccount					
					WHERE  
					userName ='$strUsername' OR
					userPassword ='$strPassword'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

				
		
	function save($arrData, $intEmpNumber)
	{
		$this->db->where('empNumber', $intEmpNumber);
		$this->db->update('tblempaccount', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intEmpNumber)
	{
		$this->db->where('empNumber', $intEmpNumber);
		$this->db->delete('tblempaccount'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
