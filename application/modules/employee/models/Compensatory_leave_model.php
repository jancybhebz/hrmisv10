<?php 
/** 
Purpose of file:    Model for Compensatory Leave
Author:             Rose Anne L. Grefaldeo
System Name:        Human Resource Management Information System Version 10
Copyright Notice:   Copyright(C)2018 by the DOST Central Office - Information Technology Division
**/
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Compensatory_leave_model extends CI_Model {

	function __construct()
	{
		$this->load->database();
		$this->db->initialize();	
	}
	
	// function getData($intAppointmentId = '')
	// {		
	// 	$strWhere = '';
	// 	if($intAppointmentId != "")
	// 		$strWhere .= " AND appointmentId = '".$intAppointmentId."'";
		
	// 	$strSQL = " SELECT * FROM tblAppointment					
	// 				WHERE 1=1 
	// 				$strWhere
	// 				ORDER BY appointmentDesc
	// 				";
	// 	//]echo $strSQL;exit(1);				
	// 	$objQuery = $this->db->query($strSQL);
	// 	//print_r($objQuery->result_array());
	// 	return $objQuery->result_array();	
	// }

	function add($arrData)
	{
		$this->db->insert('tblAppointment', $arrData);
		return $this->db->insert_id();		
	}
	
	// function checkExist($strAppointmentCode = '', $strAppointmentDesc = '')
	// {		
	// 	$strSQL = " SELECT * FROM tblAppointment					
	// 				WHERE  
	// 				appointmentCode ='$strAppointmentCode' OR
	// 				appointmentDesc ='$strAppointmentDesc'					
	// 				";
	// 	//echo $strSQL;exit(1);
	// 	$objQuery = $this->db->query($strSQL);
	// 	return $objQuery->result_array();	
	// }

				
		
	function save($arrData, $intAppointmentId)
	{
		$this->db->where('appointmentId', $intAppointmentId);
		$this->db->update('tblAppointment', $arrData);
		//echo $this->db->affected_rows();
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
	function delete($intAppointmentId)
	{
		$this->db->where('appointmentId', $intAppointmentId);
		$this->db->delete('tblAppointment'); 	
		return $this->db->affected_rows()>0?TRUE:FALSE;
	}
		
}
