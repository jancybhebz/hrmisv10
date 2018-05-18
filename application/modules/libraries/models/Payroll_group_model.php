<?php 
/** 
Purpose of file:    Model for Payroll Group Library
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Payroll_group_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		//$this->db->initialize();	
	}
	
	function getData($intPayrollGroupId = '')
	{		
		$strWhere = '';
		if($intPayrollGroupId != "")
			$strWhere .= " AND payrollGroupId = '".$intPayrollGroupId."'";
		
		$strSQL = " SELECT * FROM tblpayrollgroup					
					WHERE 1=1 
					$strWhere
					ORDER BY payrollGroupOrder
					";
		//echo $strSQL;exit(1);				
		$objQuery = $this->db->query($strSQL);
		//print_r($objQuery->result_array());
		return $objQuery->result_array();	
	}

	function add($arrData)
	{
		$this->db->insert('tblpayrollgroup', $arrData);
		return $this->db->insert_id();		
	}
	
	function checkExist($strProject = '', $strPayrollGroupCode = '')
	{		
		$strSQL = " SELECT * FROM tblpayrollgroup					
					WHERE  
					payrollGroupCode ='$strPayrollGroupCode' OR
					payrollGroupName ='$strPayrollGroupdesc'					
					";
		//echo $strSQL;exit(1);
		$objQuery = $this->db->query($strSQL);
		return $objQuery->result_array();	
	}

	function getProjectDetails() 
	{ 

		$sql = "SELECT * FROM tblpayrollgroup 
							LEFT JOIN tblproject ON tblpayrollgroup.payrollGroupId = tblproject.projectId
							ORDER BY tblpayrollgroup.payrollGroupId ASC";	
		// echo $sql;
		$query = $this->db->query($sql);
		return $query->result_array();
	}	

				
		
	function save($arrData, $intPayrollGroupId)
	{
		$this->db->where('payrollGroupId', $intPayrollGroupId);
		$this->db->update('tblpayrollgroup', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intPayrollGroupId)
	{
		$this->db->where('payrollGroupId', $intPayrollGroupId);
		$this->db->delete('tblpayrollgroup'); 	
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
